// 游戏交互优化脚本

document.addEventListener('DOMContentLoaded', function() {
    // 初始化全局变量
    window.gameState = {
        isPlaying: false,
        currentBet: 0,
        balance: 0
    };
    
    // 添加游戏动画效果
    addGameAnimations();
    
    // 添加游戏按钮交互
    setupGameButtons();
    
    // 添加游戏提示系统
    setupGameNotifications();
    
    // 添加游戏历史记录
    setupGameHistory();
    
    // 添加游戏设置保存
    setupGameSettings();
});

// 添加游戏动画效果
function addGameAnimations() {
    // 添加平滑过渡
    document.querySelectorAll('.game-btn, .betting-option, .mines-cell').forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
            this.style.boxShadow = '0 8px 25px rgba(105, 154, 248, 0.4)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 5px 20px rgba(105, 154, 248, 0.3)';
        });
    });
    
    // 添加点击动画
    document.querySelectorAll('.game-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
}

// 设置游戏按钮交互
function setupGameButtons() {
    // 快捷投注按钮
    const quickBetButtons = document.querySelectorAll('.quick-bets a');
    
    quickBetButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const action = this.getAttribute('onclick');
            const inputId = this.getAttribute('data-target');
            
            if (inputId) {
                const input = document.getElementById(inputId);
                if (input) {
                    const currentValue = parseFloat(input.value) || 0;
                    const actionValue = this.textContent.trim();
                    
                    let newValue = currentValue;
                    
                    if (actionValue === '+10') {
                        newValue = currentValue + 10;
                    } else if (actionValue === '+100') {
                        newValue = currentValue + 100;
                    } else if (actionValue === '+1000') {
                        newValue = currentValue + 1000;
                    } else if (actionValue === 'x2') {
                        newValue = currentValue * 2;
                    } else if (actionValue === '1/2') {
                        newValue = currentValue / 2;
                    }
                    
                    input.value = newValue.toFixed(2);
                    
                    // 添加输入动画
                    input.style.borderColor = '#699AF8';
                    setTimeout(() => {
                        input.style.borderColor = '#e0e0e0';
                    }, 300);
                }
            }
        });
    });
    
    // 游戏主按钮
    const gameButtons = document.querySelectorAll('.game-btn');
    
    gameButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            if (!window.gameState.isPlaying) {
                this.innerHTML = '<span class="loading-spinner" style="width:20px;height:20px;border-width:3px;"></span> 游戏中...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = this.getAttribute('data-default-text') || '开始游戏';
                    this.disabled = false;
                }, 3000);
            }
        });
    });
}

// 设置游戏提示系统
function setupGameNotifications() {
    window.showGameNotification = function(type, message) {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.5s';
            
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 3000);
    };
    
    // 添加全局错误处理
    window.addEventListener('error', function(e) {
        if (window.showGameNotification) {
            window.showGameNotification('error', '发生错误: ' + e.message);
        }
    });
}

// 设置游戏历史记录
function setupGameHistory() {
    window.addGameHistory = function(gameType, multiplier, result) {
        const historyContainer = document.querySelector('.game-history-list');
        
        if (!historyContainer) return;
        
        const historyItem = document.createElement('div');
        historyItem.className = 'history-item';
        historyItem.innerHTML = `
            <div class="multiplier">${multiplier}</div>
            <div class="time">${new Date().toLocaleTimeString('zh-CN')}</div>
            <div class="result ${result === 'win' ? 'win' : 'lose'}">
                ${result === 'win' ? '✓ 胜利' : '✗ 失败'}
            </div>
        `;
        
        historyContainer.insertBefore(historyItem, historyContainer.firstChild);
        
        // 限制历史记录数量
        if (historyContainer.children.length > 20) {
            historyContainer.removeChild(historyContainer.lastChild);
        }
    };
}

// 设置游戏设置保存
function setupGameSettings() {
    window.saveGameSetting = function(key, value) {
        localStorage.setItem(`game_${key}`, JSON.stringify(value));
    };
    
    window.loadGameSetting = function(key, defaultValue) {
        const value = localStorage.getItem(`game_${key}`);
        return value ? JSON.parse(value) : defaultValue;
    };
    
    // 加载保存的游戏设置
    const savedSettings = loadGameSetting('settings', {});
    
    if (savedSettings && savedSettings.betAmount) {
        const betInput = document.getElementById('betAmount');
        if (betInput) {
            betInput.value = savedSettings.betAmount;
        }
    }
}

// 骰子游戏动画
function animateDiceRoll(diceElement, callback) {
    const dice = document.getElementById(diceElement);
    if (!dice) return;
    
    let rollCount = 0;
    const maxRolls = 20;
    
    const rollInterval = setInterval(() => {
        const randomNum = Math.floor(Math.random() * 9) + 1;
        dice.textContent = randomNum;
        rollCount++;
        
        if (rollCount >= maxRolls) {
            clearInterval(rollInterval);
            const finalNum = Math.floor(Math.random() * 9) + 1;
            dice.textContent = finalNum;
            
            if (callback) {
                callback(finalNum);
            }
        }
    }, 100);
}

// 地雷游戏动画
function animateMinesReveal(cell, isBomb) {
    cell.classList.add('revealed');
    
    if (isBomb) {
        cell.classList.add('bomb');
        cell.innerHTML = '<svg width="30" height="30" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>';
    } else {
        cell.classList.add('safe');
        cell.innerHTML = '<svg width="30" height="30" viewBox="0 0 24 24" fill="white"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>';
    }
}

// 赛车游戏动画
function animateCrashMultiplier(start, end, callback) {
    let current = start;
    const step = 0.1;
    const interval = setInterval(() => {
        current += step;
        
        const multiplierElement = document.getElementById('crashMultiplier');
        if (multiplierElement) {
            multiplierElement.textContent = current.toFixed(2) + 'x';
        }
        
        if (current >= end) {
            clearInterval(interval);
            if (callback) {
                callback(end);
            }
        }
    }, 50);
}

// 抛硬币游戏动画
function animateCoinFlip(callback) {
    const coin = document.querySelector('.coin-inner');
    if (!coin) return;
    
    coin.classList.add('flip-card');
    coin.classList.add('flipping');
    
    setTimeout(() => {
        const isHeads = Math.random() > 0.5;
        coin.classList.remove('flipping');
        
        if (callback) {
            callback(isHeads ? 'heads' : 'tails');
        }
    }, 1000);
}

// 游戏余额更新
function updateGameBalance(amount) {
    const balanceElement = document.getElementById('balance');
    if (balanceElement) {
        const currentBalance = parseFloat(balanceElement.textContent) || 0;
        balanceElement.textContent = (currentBalance + amount).toFixed(2);
        
        // 添加余额更新动画
        balanceElement.style.color = amount >= 0 ? '#4CAF50' : '#F44336';
        setTimeout(() => {
            balanceElement.style.color = '';
        }, 500);
    }
}

// 游戏胜利动画
function showWinAnimation(amount) {
    const winOverlay = document.createElement('div');
    winOverlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s;
    `;
    
    winOverlay.innerHTML = `
        <div style="text-align: center; animation: popIn 0.5s;">
            <h1 style="color: #FFD700; font-size: 5rem; margin: 0; text-shadow: 3px 3px 6px rgba(0,0,0,0.5);">
                +${amount.toFixed(2)}
            </h1>
            <p style="color: white; font-size: 2rem; margin-top: 20px;">恭喜获胜!</p>
        </div>
    `;
    
    document.body.appendChild(winOverlay);
    
    setTimeout(() => {
        winOverlay.style.animation = 'fadeOut 0.5s';
        setTimeout(() => {
            winOverlay.remove();
        }, 500);
    }, 2000);
}

// 游戏失败动画
function showLoseAnimation() {
    const loseOverlay = document.createElement('div');
    loseOverlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s;
    `;
    
    loseOverlay.innerHTML = `
        <div style="text-align: center; animation: popIn 0.5s;">
            <h1 style="color: #F44336; font-size: 5rem; margin: 0; text-shadow: 3px 3px 6px rgba(0,0,0,0.5);">
                失败
            </h1>
            <p style="color: white; font-size: 2rem; margin-top: 20px;">再试一次!</p>
        </div>
    `;
    
    document.body.appendChild(loseOverlay);
    
    setTimeout(() => {
        loseOverlay.style.animation = 'fadeOut 0.5s';
        setTimeout(() => {
            loseOverlay.remove();
        }, 500);
    }, 2000);
}

// 添加全局动画样式
const animationStyles = document.createElement('style');
animationStyles.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    
    @keyframes popIn {
        from { transform: scale(0); }
        to { transform: scale(1); }
    }
    
    @keyframes popOut {
        from { transform: scale(1); }
        to { transform: scale(0); }
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    .pulse-anim {
        animation: pulse 1s infinite;
    }
    
    .game-card {
        transition: all 0.3s ease;
    }
    
    .game-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(105, 154, 248, 0.3);
    }
`;
document.head.appendChild(animationStyles);

// 添加触摸设备优化
if ('ontouchstart' in window) {
    document.querySelectorAll('.game-btn, .betting-option, .mines-cell').forEach(element => {
        element.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.95)';
        });
        
        element.addEventListener('touchend', function() {
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
}

// 添加键盘快捷键支持
document.addEventListener('keydown', function(e) {
    // Enter 键提交表单
    if (e.key === 'Enter' && document.activeElement.classList.contains('game-btn')) {
        document.activeElement.click();
    }
    
    // 数字键快速输入
    if (e.key >= '0' && e.key <= '9') {
        const focusedInput = document.activeElement;
        if (focusedInput && focusedInput.type === 'number' || focusedInput.type === 'text') {
            focusedInput.value += e.key;
        }
    }
});

// 添加游戏状态管理
window.GameManager = {
    state: {
        isPlaying: false,
        currentGame: null,
        balance: 0,
        lastBet: 0
    },
    
    startGame: function(gameName) {
        this.state.isPlaying = true;
        this.state.currentGame = gameName;
        this.state.lastBet = 0;
        
        console.log(`游戏 ${gameName} 开始`);
        showGameNotification('success', `游戏 ${gameName} 已开始`);
    },
    
    endGame: function(result, amount) {
        this.state.isPlaying = false;
        this.state.lastBet = amount;
        
        if (result === 'win') {
            showGameNotification('success', `获胜! 获得 ${amount.toFixed(2)} 元`);
            updateGameBalance(amount);
        } else {
            showGameNotification('error', `失败! 亏损 ${amount.toFixed(2)} 元`);
            updateGameBalance(-amount);
        }
        
        console.log(`游戏结束: ${result}, 金额: ${amount}`);
    },
    
    updateBalance: function(amount) {
        this.state.balance = amount;
        updateGameBalance(amount);
    },
    
    getBalance: function() {
        return this.state.balance;
    }
};

// 初始化游戏管理器
window.gameManager = new GameManager();
