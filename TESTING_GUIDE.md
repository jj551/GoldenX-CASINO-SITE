# GoldenX Casino - 测试运行指南

## 测试框架概述

GoldenX Casino 使用 Laravel 框架的 PHPUnit 测试框架进行测试。

## 测试文件结构

```
tests/
├── TestCase.php              # 基础测试类
├── CreatesApplication.php    # 应用创建 trait
├── Unit/                     # 单元测试
│   └── ExampleTest.php       # 示例单元测试
└── Feature/                  # 功能测试
    └── ExampleTest.php       # 示例功能测试
```

## 测试类型

### 1. 单元测试 (Unit Tests)
- 测试单个函数或方法
- 不依赖外部系统
- 快速执行

### 2. 功能测试 (Feature Tests)
- 测试完整的功能流程
- 可能涉及数据库和外部系统
- 模拟 HTTP 请求

## 运行测试的方法

### 方法 1: 使用 Docker (推荐)

如果您已安装 Docker：

```bash
cd GoldenX-CASINO-SITE
./run-tests-docker.sh
```

或者手动运行：

```bash
docker-compose run --rm php artisan test
```

### 方法 2: 使用本地 PHP 环境

如果您已安装 PHP 7.4+ 和 Composer：

```bash
cd GoldenX-CASINO-SITE
./run-tests-local.sh
```

或者手动运行：

```bash
# 安装依赖
composer install

# 运行所有测试
php artisan test

# 运行特定测试文件
php artisan test tests/Unit/ExampleTest.php

# 运行特定测试方法
php artisan test --filter=testBasicTest

# 生成代码覆盖率报告
php artisan test --coverage
```

### 方法 3: 使用 PHPUNIT 直接运行

```bash
# 运行所有测试
vendor/bin/phpunit

# 运行特定测试文件
vendor/bin/phpunit tests/Unit/ExampleTest.php

# 生成代码覆盖率报告
vendor/bin/phpunit --coverage-html storage/coverage
```

## 测试配置

测试配置文件位于 `phpunit.xml`，包含以下设置：

- **测试环境**: `APP_ENV=testing`
- **缓存驱动**: `CACHE_DRIVER=array`
- **会话驱动**: `SESSION_DRIVER=array`
- **队列连接**: `QUEUE_CONNECTION=sync`
- **邮件驱动**: `MAIL_MAILER=array`

## 编写测试

### 单元测试示例

```php
<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    
    public function testExampleFunction()
    {
        $result = someFunction();
        $this->assertEquals('expected', $result);
    }
}
```

### 功能测试示例

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    public function testLogin()
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        
        $response->assertRedirect('/home');
    }
}
```

## 测试命令参考

```bash
# 运行所有测试
php artisan test

# 运行特定测试文件
php artisan test tests/Unit/ExampleTest.php

# 运行特定测试方法
php artisan test --filter=testBasicTest

# 详细输出
php artisan test --verbose

# 生成代码覆盖率报告
php artisan test --coverage

# 仅显示失败的测试
php artisan test --fail-on-failure

# 生成测试报告
php artisan test --log-junit storage/logs/junit.xml
```

## 测试最佳实践

1. **保持测试独立**: 每个测试应该独立运行，不依赖其他测试
2. **使用断言**: 使用适当的断言方法验证结果
3. **测试命名**: 使用描述性的测试方法名称
4. **保持测试快速**: 单元测试应该快速执行
5. **覆盖关键功能**: 重点测试核心业务逻辑
6. **定期运行测试**: 在开发过程中定期运行测试

## 常见问题

### 问题 1: PHP 未安装

**解决方案**: 安装 PHP 7.4 或更高版本

- macOS: `brew install php`
- Ubuntu: `sudo apt install php`
- Windows: 从 https://www.php.net/downloads.php 下载

### 问题 2: Composer 未安装

**解决方案**: 安装 Composer

- macOS: `brew install composer`
- Ubuntu: `sudo apt install composer`
- Windows: 从 https://getcomposer.org/download/ 下载

### 问题 3: 依赖未安装

**解决方案**: 运行 `composer install`

### 问题 4: 数据库连接失败

**解决方案**: 确保 `.env` 文件中的数据库配置正确

## 测试覆盖率

运行测试时，可以生成代码覆盖率报告：

```bash
php artisan test --coverage
```

覆盖率报告将显示代码的测试覆盖百分比，帮助识别需要更多测试的代码区域。

## 持续集成

GoldenX Casino 的测试可以集成到 CI/CD 流程中：

```yaml
# .github/workflows/tests.yml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '7.4'
      - name: Install Dependencies
        run: composer install -q --no-ansi --no-interaction
      - name: Run Tests
        run: php artisan test
```

## 联系支持

如有问题，请参考 Laravel 官方文档：
https://laravel.com/docs/testing
