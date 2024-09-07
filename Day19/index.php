<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>2048</title>
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
            transition: transform 0.2s, background-color 0.2s;
            background-color: #cdc1b4;
        }

        .new {
            animation: pop 0.3s;
            background-color: #ffeb3b;
        }

        .combined {
            animation: scaleUp 0.2s;
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
        document.addEventListener('DOMContentLoaded', initGame);

        let previousGrid = [];

        const eventCallback = (event) => {
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
            fetch('http://localhost:8080/api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `direction=${direction}`
                })
                .then(response => response.json())
                .then(data => {
                    const {
                        grid,
                        gameOver
                    } = data;
                    showGrid(grid);
                    previousGrid = grid;

                    if (gameOver) {
                        alert('无法移动！游戏结束！');
                        initGame(); // Simple reset
                    }
                })
                .catch(error => console.error(error));
        };

        function initGame() {
            fetch('http://localhost:8080/api.php')
                .then(response => response.json())
                .then(data => {
                    const {
                        grid
                    } = data;
                    showGrid(grid);
                    previousGrid = grid;
                })
                .catch(error => console.error(error));
            document.addEventListener('keydown', eventCallback);
        }

        function showGrid(grid) {
            const board = document.getElementById('game-board');
            board.innerHTML = '';
            for (let i = 0; i < grid.length; i++) {
                const tr = document.createElement('tr');
                for (let j = 0; j < grid[i].length; j++) {
                    const td = document.createElement('td');
                    td.textContent = grid[i][j] === 0 ? '' : grid[i][j];

                    if (grid[i][j] !== 0) {
                        td.classList.add('num-' + grid[i][j]);

                        if (previousGrid.length > 0) {
                            if (previousGrid[i][j] === 0) {
                                td.classList.add('new');
                            } else if (grid[i][j] !== previousGrid[i][j]) {
                                td.classList.add('combined');
                            }
                        }
                    }

                    tr.appendChild(td);
                }
                board.appendChild(tr);
            }
        }
    </script>
</body>

</html>