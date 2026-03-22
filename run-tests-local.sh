#!/bin/bash

# GoldenX Casino 本地测试运行脚本
# 使用本地 PHP 环境运行测试

set -e

echo "========================================"
echo "GoldenX Casino - 本地测试运行器"
echo "========================================"
echo ""

# 检查 PHP 是否可用
if ! command -v php &> /dev/null; then
    echo "✗ PHP 未安装"
    echo ""
    echo "请安装 PHP 7.4 或更高版本："
    echo "  macOS: brew install php"
    echo "  Ubuntu: sudo apt install php"
    echo "  Windows: https://www.php.net/downloads.php"
    echo ""
    echo "或者使用 Docker 运行测试："
    echo "  ./run-tests-docker.sh"
    exit 1
fi

echo "✓ PHP 已安装: $(php -v | head -n 1)"

# 检查 Composer 是否可用
if ! command -v composer &> /dev/null; then
    echo "✗ Composer 未安装"
    echo ""
    echo "请安装 Composer："
    echo "  macOS: brew install composer"
    echo "  Ubuntu: sudo apt install composer"
    echo "  Windows: https://getcomposer.org/download/"
    echo ""
    echo "或者使用 Docker 运行测试："
    echo "  ./run-tests-docker.sh"
    exit 1
fi

echo "✓ Composer 已安装: $(composer --version | head -n 1)"
echo ""

# 检查 .env 文件
if [ ! -f .env ]; then
    echo "⚠ .env 文件不存在，使用默认配置"
    if [ -f .env.example ]; then
        echo "提示：可以复制 .env.example 创建 .env 文件"
    fi
fi

# 检查 vendor 目录
if [ ! -d vendor ]; then
    echo "⚠ vendor 目录不存在，正在安装依赖..."
    composer install
fi

echo ""
echo "正在运行测试..."
echo ""

# 运行测试
php artisan test

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
