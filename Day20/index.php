<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>2048 Game</title>
    <style>
        table {
            margin: 20px auto;
            background-color: #bbada0;
            border-radius: 6px;
            padding: 5px;
            border-collapse: separate;
            border-spacing: 5px;
        }

        td {
            width: 80px;
            height: 80px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            border-radius: 4px;
            position: relative;
            transition: transform 0.3s ease, background-color 0.3s ease;
            background-color: #cdc1b4;
        }

        .new {
            animation: pop 0.3s;
            background-color: #ffeb3b;
        }

        .combined {
            animation: scaleUp 0.3s;
        }

        @keyframes pop {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        @keyframes scaleUp {
            from {
                transform: scale(1.1);
            }

            to {
                transform: scale(1);
            }
        }

        .num-2 {
            background-color: #eee4da;
        }

        .num-4 {
            background-color: #ede0c8;
        }

        .num-8 {
            background-color: #f2b179;
        }

        .num-16 {
            background-color: #f59563;
        }

        .num-32 {
            background-color: #f67c5f;
        }

        .num-64 {
            background-color: #f65e3b;
        }

        .num-128 {
            background-color: #edcf72;
        }

        .num-256 {
            background-color: #edcc61;
        }

        .num-512 {
            background-color: #edc850;
        }

        .num-1024 {
            background-color: #edc53f;
        }

        .num-2048 {
            background-color: #edc22e;
        }
    </style>
</head>

<body>
    <table id="game-board"></table>
    <script>
        class GameUI {
            constructor() {
                this.previousGrid = [];
                document.addEventListener('keydown', this.throttle(this.eventCallback.bind(this), 400));
                this.initGame();
            }

            async initGame() {
                const response = await fetch('api.php');
                const data = await response.json();
                this.showGrid(data.grid);
                this.previousGrid = data.grid;
            }

            async eventCallback(event) {
                let direction;
                switch (event.key) {
                    case 'ArrowUp':
                        direction = 'up';
                        break;
                    case 'ArrowDown':
                        direction = 'down';
                        break;
                    case 'ArrowLeft':
                        direction = 'left';
                        break;
                    case 'ArrowRight':
                        direction = 'right';
                        break;
                    default:
                        return;
                }

                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `direction=${direction}`
                });
                const data = await response.json();
                this.showGrid(data.grid);
                this.previousGrid = data.grid;

                if (data.gameOver) {
                    alert('无法移动！游戏结束！');
                    this.initGame();
                }
            }

            throttle(func, limit) {
                let lastFunc;
                let lastRan;
                return function(...args) {
                    if (!lastRan) {
                        func.apply(this, args);
                        lastRan = Date.now();
                    } else {
                        clearTimeout(lastFunc);
                        lastFunc = setTimeout(() => {
                            if ((Date.now() - lastRan) >= limit) {
                                func.apply(this, args);
                                lastRan = Date.now();
                            }
                        }, limit - (Date.now() - lastRan));
                    }
                };
            }

            showGrid(grid) {
                const board = document.getElementById('game-board');
                board.innerHTML = '';
                for (let i = 0; i < grid.length; i++) {
                    const tr = document.createElement('tr');
                    for (let j = 0; j < grid[i].length; j++) {
                        const td = document.createElement('td');
                        td.textContent = grid[i][j] === 0 ? '' : grid[i][j];

                        if (grid[i][j] !== 0) {
                            td.classList.add('num-' + grid[i][j]);

                            if (this.previousGrid.length > 0) {
                                if (this.previousGrid[i][j] === 0) {
                                    td.classList.add('new');
                                } else if (grid[i][j] !== this.previousGrid[i][j]) {
                                    td.classList.add('combined');
                                }
                            }
                        }

                        tr.appendChild(td);
                    }
                    board.appendChild(tr);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => new GameUI());
    </script>
</body>

</html>