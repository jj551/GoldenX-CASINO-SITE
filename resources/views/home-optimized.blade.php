<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenX 赌场 - 专业的在线博彩平台</title>
    <meta name="description" content="GoldenX 赌场提供最优质的在线博彩体验，包括老虎机、骰子、地雷、赛车等热门游戏。安全可靠，快速提现，24小时客服支持。">
    <meta name="keywords" content="在线赌场,老虎机,骰子游戏,赛车游戏,在线博彩,黄金X赌场">
    <meta name="author" content="GoldenX Casino">
    <meta name="robots" content="index, follow">
    
    <meta property="og:title" content="GoldenX 赌场 - 专业的在线博彩平台">
    <meta property="og:description" content="体验最刺激的在线博彩游戏，拥有超过100款热门游戏，安全可靠，快速提现">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://goldenx-casino.com/">
    <meta property="og:image" content="/images/logo.png">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="GoldenX 赌场 - 专业的在线博彩平台">
    <meta name="twitter:description" content="体验最刺激的在线博彩游戏，拥有超过100款热门游戏，安全可靠，快速提现">
    
    <link rel="icon" type="image/png" href="/images/favicon.png" sizes="64x64">
    <link rel="apple-touch-icon" sizes="64x64" href="/images/favicon.png">
    <link rel="canonical" href="https://goldenx-casino.com/">
    
    <link rel="stylesheet" href="/css/main.css?v={{time()}}">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    
    @if($snow == 1)
    <link rel="stylesheet" href="/css/snow.css?v={{time()}}">
    <script src="/js/snowfall.jquery.js" type="text/javascript"></script>
    @endif
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-scrollbar@latest/simple-scrollbar.css">
    <script src="https://cdn.jsdelivr.net/npm/simple-scrollbar@latest/simple-scrollbar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/js/modal.js" type="text/javascript"></script>
    <script src="/js/ripple.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/ripple.css">
    
    <script src="/js/countup.js?v={{time()}}" type="text/javascript"></script>
    
    <script async src="https://hcaptcha.com/1/api.js?render=explicit" async defer></script>
    
    <style>
        :root {
            --primary-color: #699AF8;
            --secondary-color: #7D7AFF;
            --accent-color: #5E5BE5;
            --dark-bg: #1A2547;
            --light-bg: #f1f1f1;
            --text-color: #333;
            --success-color: #4CAF50;
            --warning-color: #FF9800;
            --danger-color: #F44336;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Gotham Pro', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-bg);
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: white;
            color: var(--accent-color);
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }
        
        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }
        
        .game-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        .game-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .game-card-content {
            padding: 20px;
        }
        
        .game-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--dark-bg);
        }
        
        .game-card p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .game-card .player-count {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        
        .features-section {
            background: white;
            padding: 80px 20px;
        }
        
        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .features-section h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: var(--dark-bg);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }
        
        .feature-item {
            text-align: center;
            padding: 30px;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
        }
        
        .feature-item h3 {
            margin-bottom: 15px;
            color: var(--dark-bg);
        }
        
        .feature-item p {
            color: #666;
        }
        
        .stats-section {
            background: var(--dark-bg);
            color: white;
            padding: 60px 20px;
        }
        
        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            text-align: center;
        }
        
        .stat-item h3 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.8;
        }
        
        .footer {
            background: var(--dark-bg);
            color: white;
            padding: 60px 20px 30px;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-section h4 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: var(--primary-color);
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section li {
            margin-bottom: 10px;
        }
        
        .footer-section a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section a:hover {
            color: var(--primary-color);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #888;
            font-size: 0.9rem;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .games-grid {
                grid-template-columns: 1fr;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="container">
            <h1>欢迎来到 GoldenX 赌场</h1>
            <p>体验最刺激的在线博彩游戏，拥有超过100款热门游戏，安全可靠，快速提现</p>
            <a href="#" class="cta-button" onclick="load('')">开始游戏</a>
        </div>
    </div>
    
    <div class="games-grid">
        <div class="game-card" onclick="load('slots')">
            <img src="/images/games/slots/slots.png" alt="SLOTS">
            <div class="game-card-content">
                <h3>SLOTS</h3>
                <p>经典老虎机游戏，多种主题任您选择</p>
                <span class="player-count">1000+ 玩家在线</span>
            </div>
        </div>
        
        <div class="game-card" onclick="load('dice')">
            <img src="/images/games/dice/dice.png" alt="Dice">
            <div class="game-card-content">
                <h3>Dice</h3>
                <p>经典骰子游戏，简单易玩，赢取大奖</p>
                <span class="player-count">800+ 玩家在线</span>
            </div>
        </div>
        
        <div class="game-card" onclick="load('mines')">
            <img src="/images/games/mines/mines.png" alt="Mines">
            <div class="game-card-content">
                <h3>Mines</h3>
                <p>刺激的地雷游戏，挑战你的运气</p>
                <span class="player-count">600+ 玩家在线</span>
            </div>
        </div>
        
        <div class="game-card" onclick="load('crash')">
            <img src="/images/games/crash/crash.png" alt="Crash">
            <div class="game-card-content">
                <h3>Crash</h3>
                <p>心跳加速的赛车游戏，及时止盈是关键</p>
                <span class="player-count">500+ 玩家在线</span>
            </div>
        </div>
        
        <div class="game-card" onclick="load('x100')">
            <img src="/images/games/x100/x100.png" alt="X100">
            <div class="game-card-content">
                <h3>X100</h3>
                <p>高倍率游戏，赢取巨额奖金</p>
                <span class="player-count">400+ 玩家在线</span>
            </div>
        </div>
        
        <div class="game-card" onclick="load('coinflip')">
            <img src="/images/games/coinflip/coinflip.png" alt="Coin Flip">
            <div class="game-card-content">
                <h3>Coin Flip</h3>
                <p>简单的抛硬币游戏，双倍或失去</p>
                <span class="player-count">300+ 玩家在线</span>
            </div>
        </div>
    </div>
    
    <div class="features-section">
        <div class="features-container">
            <h2>为什么选择 GoldenX</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🔒</div>
                    <h3>安全可靠</h3>
                    <p>采用最先进的加密技术，保护您的资金和个人信息安全</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⚡</div>
                    <h3>快速提现</h3>
                    <p>秒级提现，24/7客服支持，随时解决您的问题</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎮</div>
                    <h3>丰富游戏</h3>
                    <p>超过100款热门游戏，满足不同玩家的需求</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">💰</div>
                    <h3>丰厚奖励</h3>
                    <p>新用户注册即送丰厚奖金，还有每日签到奖励</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <h3>移动端支持</h3>
                    <p>完美适配手机和平板，随时随地享受游戏</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⭐</div>
                    <h3>专业客服</h3>
                    <p>24/7专业客服团队，随时为您服务</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="stats-section">
        <div class="stats-container">
            <div class="stat-item">
                <h3>100+</h3>
                <p>热门游戏</p>
            </div>
            <div class="stat-item">
                <h3>50K+</h3>
                <p>活跃用户</p>
            </div>
            <div class="stat-item">
                <h3>99.9%</h3>
                <p>用户满意度</p>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <p>客户服务</p>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>GoldenX 赌场</h4>
                <p>提供最优质的在线博彩体验，拥有超过100款热门游戏，安全可靠，快速提现。</p>
                <div class="social-links">
                    <a href="https://vk.com/public{{\App\Setting::first()->group_id}}" class="social-link" target="_blank">VK</a>
                    <a href="https://t.me/{{\App\Setting::first()->tg_id}}" class="social-link" target="_blank">TG</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>游戏分类</h4>
                <ul>
                    <li><a href="slots">老虎机</a></li>
                    <li><a href="dice">骰子游戏</a></li>
                    <li><a href="mines">地雷游戏</a></li>
                    <li><a href="crash">赛车游戏</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>用户中心</h4>
                <ul>
                    <li><a href="#" onclick="load('bonus')">欢迎奖金</a></li>
                    <li><a href="#" onclick="load('refs')">合作伙伴</a></li>
                    <li><a href="#" onclick="load('faq')">常见问题</a></li>
                    <li><a href="https://t.me/mortalsoft" target="_blank">在线客服</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>法律信息</h4>
                <ul>
                    <li><a href="#" onclick="load('terms')">服务条款</a></li>
                    <li><a href="#" onclick="load('policy')">隐私政策</a></li>
                    <li><a href="#">公平游戏</a></li>
                    <li><a href="#">负责任博彩</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>SO-YOU-START.RU — ALL RIGHTS RESERVED. © {{date('Y')}}</p>
            <p style="margin-top: 10px; font-size: 0.8rem; opacity: 0.6;">请注意：赌博有风险，敬请理性参与。您必须年满18周岁才能访问本网站。</p>
        </div>
    </footer>
    
    <script>
        // 添加页面加载动画
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
        
        // 平滑滚动
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
