<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录 - GoldenX 赌场</title>
    <meta name="description" content="GoldenX 赌场登录 - 专业的在线博彩平台">
    
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
        
        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
        }
        
        .login-header {
            background: linear-gradient(135deg, #699AF8 0%, #7D7AFF 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        
        .login-header h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .login-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }
        
        .login-body {
            padding: 40px 30px;
        }
        
        .login-form {
            margin-top: 30px;
        }
        
        .form-group {
            margin-bottom: 25px;
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
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        
        .remember-me input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .forgot-password {
            color: #699AF8;
            text-decoration: none;
            font-weight: 500;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .login-btn {
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
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(105, 154, 248, 0.4);
        }
        
        .login-btn:active {
            transform: translateY(0);
        }
        
        .social-login {
            margin-top: 30px;
            text-align: center;
        }
        
        .social-login h3 {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
            position: relative;
        }
        
        .social-login h3::before,
        .social-login h3::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e0e0e0;
            position: absolute;
            top: 50%;
        }
        
        .social-login h3::before {
            right: 100%;
            margin-right: 15px;
        }
        
        .social-login h3::after {
            left: 100%;
            margin-left: 15px;
        }
        
        .social-buttons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .social-btn:hover {
            border-color: #699AF8;
            background: #f8f9ff;
            transform: translateY(-2px);
        }
        
        .social-btn.vk {
            color: #0077FF;
        }
        
        .social-btn.google {
            color: #DB4437;
        }
        
        .social-btn.yandex {
            color: #FF6B6B;
        }
        
        .social-btn.telegram {
            color: #0088CC;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.95rem;
        }
        
        .signup-link a {
            color: #699AF8;
            text-decoration: none;
            font-weight: 600;
        }
        
        .signup-link a:hover {
            text-decoration: underline;
        }
        
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .badge-icon {
            width: 24px;
            height: 24px;
            color: #699AF8;
        }
        
        .badge-text {
            font-size: 0.85rem;
            color: #666;
        }
        
        @media (max-width: 480px) {
            .login-container {
                border-radius: 15px;
            }
            
            .login-header {
                padding: 30px 20px;
            }
            
            .login-body {
                padding: 30px 20px;
            }
            
            .social-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>欢迎登录</h1>
            <p>GoldenX 赌场 - 专业的在线博彩平台</p>
        </div>
        
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                
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
                        autofocus 
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
                        autocomplete="current-password"
                        placeholder="请输入您的密码"
                    >
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>记住我</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            忘记密码？
                        </a>
                    @endif
                </div>
                
                <button type="submit" class="login-btn">
                    登录
                </button>
            </form>
            
            <div class="social-login">
                <h3>或使用社交账号登录</h3>
                <div class="social-buttons">
                    <a href="/vk_auth" class="social-btn vk">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15.66 15.02L13.5 14.86C13.12 14.83 12.89 14.66 12.89 14.28V10.72C12.89 10.45 13.06 10.28 13.33 10.28H15.66C16.34 10.28 16.68 10.56 16.81 11.05C16.94 11.54 16.94 11.98 16.94 12.36V12.52C16.94 12.75 17.11 12.92 17.38 12.92H17.54C17.81 12.92 17.98 12.75 17.98 12.48V11.7C17.98 9.86 17.49 8.61 16.24 7.89C15.16 7.28 13.67 7.28 11.67 7.28H7.33C5.33 7.28 3.84 7.28 2.76 7.89C1.51 8.61 1.02 9.86 1.02 11.7V15.48C1.02 17.32 1.51 18.57 2.76 19.29C3.84 19.9 5.33 19.9 7.33 19.9H11.67C13.67 19.9 15.16 19.9 16.24 19.29C17.49 18.57 17.98 17.32 17.98 15.48V14.86C17.98 14.53 17.81 14.2 17.54 14.02L15.66 15.02ZM11.5 15.82C10.5 15.82 9.83 15.16 9.83 14.16C9.83 13.16 10.5 12.5 11.5 12.5C12.5 12.5 13.16 13.16 13.16 14.16C13.16 15.16 12.5 15.82 11.5 15.82ZM15.83 15.82C14.83 15.82 14.16 15.16 14.16 14.16C14.16 13.16 14.83 12.5 15.83 12.5C16.83 12.5 17.5 13.16 17.5 14.16C17.5 15.16 16.83 15.82 15.83 15.82Z"/>
                        </svg>
                        ВКонтакте
                    </a>
                    
                    <a href="/google_auth" class="social-btn google">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google
                    </a>
                    
                    <a href="/yandex_auth" class="social-btn yandex">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                        </svg>
                        Яндекс
                    </a>
                    
                    <a href="/tg_auth" class="social-btn telegram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                        </svg>
                        Telegram
                    </a>
                </div>
            </div>
            
            <div class="signup-link">
                还没有账号？ <a href="#" onclick="load('register')">立即注册</a>
            </div>
            
            <div class="security-badge">
                <svg class="badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <span class="badge-text">SSL加密 | 安全支付 | 18+</span>
            </div>
        </div>
    </div>
    
    <script>
        // 添加输入框焦点效果
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
        
        // 表单提交动画
        document.querySelector('form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.login-btn');
            btn.innerHTML = '<span style="display:inline-block; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: #fff; animation: spin 1s linear infinite;"></span> 登录中...';
            
            setTimeout(() => {
                btn.innerHTML = '登录';
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
