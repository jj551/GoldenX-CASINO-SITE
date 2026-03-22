#!/bin/bash

# GoldenX Casino 测试运行脚本
# 使用 Docker 运行测试

set -e

echo "========================================"
echo "GoldenX Casino - 测试运行器"
echo "========================================"
echo ""

# 检查 Docker 是否可用
if ! command -v docker &> /dev/null; then
    echo "✗ Docker 未安装"
    echo ""
    echo "请安装 Docker Desktop:"
    echo "  https://www.docker.com/products/docker-desktop"
    echo ""
    echo "安装完成后，运行："
    echo "  cd GoldenX-CASINO-SITE"
    echo "  ./run-tests.sh"
    exit 1
fi

echo "✓ Docker 已安装"

# 检查 docker-compose 是否可用
if command -v docker-compose &> /dev/null; then
    DOCKER_COMPOSE="docker-compose"
elif docker compose version &> /dev/null; then
    DOCKER_COMPOSE="docker compose"
else
    echo "✗ Docker Compose 未安装"
    echo ""
    echo "请安装 Docker Desktop 或 docker-compose"
    exit 1
fi

echo "✓ Docker Compose 已安装"
echo ""

# 检查 .env 文件
if [ ! -f .env ]; then
    echo "⚠ .env 文件不存在，使用默认配置"
fi

# 构建并运行测试容器
echo "正在构建 Docker 容器..."
$DOCKER_COMPOSE build --no-cache app

echo ""
echo "正在运行测试..."
$DOCKER_COMPOSE run --rm app php artisan test

# 保存退出码
EXIT_CODE=$?

echo ""
echo "========================================"
if [ $EXIT_CODE -eq 0 ]; then
    echo "✓ 所有测试通过！"
else
    echo "✗ 测试失败，请检查输出"
fi
echo "========================================"

exit $EXIT_CODE
