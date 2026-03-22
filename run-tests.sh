#!/bin/bash

# GoldenX Casino 测试运行脚本
# 自动检测环境并选择最佳运行方式

set -e

echo "========================================"
echo "GoldenX Casino - 测试运行器"
echo "========================================"
echo ""

# 检查 Docker 是否可用
if command -v docker &> /dev/null; then
    echo "✓ Docker 已安装"
    
    # 检查 docker-compose 是否可用
    if command -v docker-compose &> /dev/null || docker compose version &> /dev/null; then
        DOCKER_COMPOSE="docker-compose"
        if docker compose version &> /dev/null; then
            DOCKER_COMPOSE="docker compose"
        fi
        
        echo "✓ Docker Compose 已安装"
        echo ""
        echo "使用 Docker 运行测试..."
        echo ""
        
        # 构建并运行测试容器
        $DOCKER_COMPOSE build --no-cache app 2>/dev/null || true
        $DOCKER_COMPOSE run --rm app php artisan test
        
        exit $?
    else
        echo "⚠ Docker Compose 未完全安装"
    fi
else
    echo "⚠ Docker 未安装"
fi

# 检查 PHP 是否可用
if command -v php &> /dev/null; then
    echo "✓ PHP 已安装: $(php -v | head -n 1)"
    
    # 检查 Composer 是否可用
    if command -v composer &> /dev/null; then
        echo "✓ Composer 已安装: $(composer --version | head -n 1)"
        echo ""
        echo "使用本地 PHP 环境运行测试..."
        echo ""
        
        # 检查 vendor 目录
        if [ ! -d vendor ]; then
            echo "⚠ vendor 目录不存在，正在安装依赖..."
            composer install
        fi
        
        # 运行测试
        php artisan test
        
        exit $?
    else
        echo "⚠ Composer 未安装"
    fi
else
    echo "⚠ PHP 未安装"
fi

echo ""
echo "========================================"
echo "错误: 未找到合适的运行环境"
echo "========================================"
echo ""
echo "请安装以下工具之一："
echo "  1. Docker Desktop (https://www.docker.com/products/docker-desktop)"
echo "  2. PHP 7.4+ (https://www.php.net/downloads.php)"
echo ""
echo "安装完成后，运行："
echo "  cd GoldenX-CASINO-SITE"
echo "  ./run-tests.sh"
exit 1
