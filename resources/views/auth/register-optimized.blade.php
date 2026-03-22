<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册 - GoldenX 赌场</title>
    <meta name="description" content="GoldenX 赌场注册 - 专业的在线博彩平台">
    
    <link rel="icon" type="image/png" href="/images/favicon.png" sizes="64x64">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Gotham Pro', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #699AF8 0%, #7D7AFF 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
        }
        
        .register-header {
            background: linear-gradient(135deg, #699AF8 0%, #7D7AFF 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .register-header h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .register-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }
        
        .register-body {
            padding: 40px 30px;
        }
        
        .register-form {
            margin-top: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #699AF8;
            box-shadow: 0 0 0 3px rgba(105, 154, 248, 0.1);
        }
        
        .form-group.row {
            margin-bottom: 20px;
        }
        
        .form-group.row label {
            padding-top: 10px;
        }
        
        .form-group.row input {
            margin-top: 5px;
        }
        
        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 30px;
            cursor: pointer;
        }
        
        .terms-checkbox input {
            width: 18px;
            height: 18px;
            margin-top: 3px;
            cursor: pointer;
        }
        
        .terms-checkbox span {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }
        
        .terms-checkbox a {
            color: #699AF8;
            text-decoration: none;
        }
        
        .terms-checkbox a:hover {
            text-decoration: underline;
        }
        
        .register-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #699AF8 0%, #7D7AFF 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
        }
        
        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(105, 154, 248, 0.4);
        }
        
        .register-btn:active {
            transform: translateY(0);
        }
        
        .login-link {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.95rem;
        }
        
        .login-link a {
            color: #699AF8;
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        .welcome-bonus {
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .welcome-bonus h3 {
            color: white;
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        
        .welcome-bonus p {
            color: white;
            font-size: 1rem;
        }
        
        .bonus-amount {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0;
        }
        
        @media (max-width: 480px) {
            .register-container {
                border-radius: 15px;
            }
            
            .register-header {
                padding: 30px 20px;
            }
            
            .register-body {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>欢迎注册</h1>
            <p>加入 GoldenX 赌场，开启您的博彩之旅</p>
        </div>
        
        <div class="register-body">
            <div class="welcome-bonus">
                <h3>新用户专属福利</h3>
                <div class="bonus-amount">100% 首存奖金</div>
                <p>最高可得 5000 元奖金</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf
                
                <div class="form-group">
                    <label for="name">用户名</label>
                    <input 
                        id="name" 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autocomplete="name" 
                        autofocus 
                        placeholder="请输入您的用户名"
                    >
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">邮箱地址</label>
                    <input 
                        id="email" 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email"
                        placeholder="请输入您的邮箱地址"
                    >
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">密码</label>
                    <input 
                        id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        placeholder="请输入密码（至少8位）"
                    >
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password-confirm">确认密码</label>
                    <input 
                        id="password-confirm" 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="请再次输入密码"
                    >
                </div>
                
                <label class="terms-checkbox">
                    <input type="checkbox" name="terms" id="terms" required>
                    <span>
                        我已阅读并同意 <a href="#" onclick="load('terms')">服务条款</a> 和 <a href="#" onclick="load('policy')">隐私政策</a>
                    </span>
                </label>
                
                <button type="submit" class="register-btn">
                    立即注册
                </button>
            </form>
            
            <div class="login-link">
                已经有账号？ <a href="#" onclick="load('login')">立即登录</a>
            </div>
        </div>
    </div>
    
    <script>
        // 表单验证
        document.querySelector('form').addEventListener('submit', function(e) {
            const termsCheckbox = document.getElementById('terms');
            if (!termsCheckbox.checked) {
                e.preventDefault();
                alert('请先同意服务条款和隐私政策');
                return;
            }
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('两次输入的密码不一致');
                return;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('密码长度至少为8位');
                return;
            }
            
            const btn = this.querySelector('.register-btn');
            btn.innerHTML = '<span style="display:inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: #fff; animation: spin 1s linear infinite;"></span> 注册中...';
            
            setTimeout(() => {
                btn.innerHTML = '立即注册';
            }, 3000);
        });
        
        // 添加旋转动画
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
