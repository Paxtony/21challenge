<?php
session_start();

class Game2048
{
    private $grid;

    public function __construct()
    {
        if (!isset($_SESSION['grid'])) {
            $this->initializeGame();
        } else {
            $this->grid = $_SESSION['grid'];
        }
    }

    public function initializeGame()
    {
        $this->grid = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
        $this->addRandomNumber();
        $this->addRandomNumber();
        $_SESSION['grid'] = $this->grid;
    }

    private function addRandomNumber()
    {
        $emptyCells = [];
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if ($this->grid[$i][$j] == 0) {
                    $emptyCells[] = [$i, $j];
                }
            }
        }
        // 增加发放数字随数字增大逻辑
        if (count($emptyCells) > 0) {
            $cell = $emptyCells[array_rand($emptyCells)];
            $maxNum = max(array_map('max', $this->grid));
            $probability4 = min(9, (int)($maxNum / 128));
            $this->grid[$cell[0]][$cell[1]] = rand(0, 9) < $probability4 ? 4 : 2;
        }
    }

    public function move($direction)
    {
        switch ($direction) {
            case 'left':
                $this->moveLeft();
                break;
            case 'right':
                $this->moveRight();
                break;
            case 'up':
                $this->moveUp();
                break;
            case 'down':
                $this->moveDown();
                break;
        }

        $this->addRandomNumber();
        $_SESSION['grid'] = $this->grid;
        return $this->grid;
    }

    private function moveLeft()
    {
        for ($i = 0; $i < 4; $i++) {
            $merged = [];
            for ($j = 0; $j < 4; $j++) {
                if ($this->grid[$i][$j] !== 0) {
                    $k = $j;
                    while ($k > 0 && $this->grid[$i][$k - 1] === 0) {
                        $this->grid[$i][$k - 1] = $this->grid[$i][$k];
                        $this->grid[$i][$k] = 0;
                        $k--;
                    }
                    if ($k > 0 && $this->grid[$i][$k - 1] === $this->grid[$i][$k] && !in_array($k - 1, $merged)) {
                        $this->grid[$i][$k - 1] *= 2;
                        $this->grid[$i][$k] = 0;
                        $merged[] = $k - 1;
                    }
                }
            }
        }
    }

    private function moveRight()
    {
        foreach ($this->grid as &$row) $row = array_reverse($row);
        $this->moveLeft();
        foreach ($this->grid as &$row) $row = array_reverse($row);
    }

    private function moveUp()
    {
        $this->transpose();
        $this->moveLeft();
        $this->transpose();
    }

    private function moveDown()
    {
        $this->transpose();
        foreach ($this->grid as &$column) $column = array_reverse($column);
        $this->moveLeft();
        foreach ($this->grid as &$column) $column = array_reverse($column);
        $this->transpose();
    }

    private function transpose()
    {
        $transposed = [];
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $transposed[$j][$i] = $this->grid[$i][$j];
            }
        }
        $this->grid = $transposed;
    }

    public function isGameOver()
    {
        foreach ($this->grid as $row) {
            if (in_array(0, $row, true)) {
                return false;
            }
        }

        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if ($j < 3 && $this->grid[$i][$j] == $this->grid[$i][$j + 1]) {
                    return false;
                }
                if ($i < 3 && $this->grid[$i][$j] == $this->grid[$i + 1][$j]) {
                    return false;
                }
            }
        }

        return true;
    }
}


$game = new Game2048();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direction = $_POST['direction'];
    $grid = $game->move($direction);

    header('Content-Type: application/json');
    echo json_encode([
        'grid' => $grid,
        'gameOver' => $game->isGameOver()
    ]);
    exit;
} else {
    $game->initializeGame();
    header('Content-Type: application/json');
    echo json_encode([
        'grid' => $game->move(null),
        'gameOver' => false
    ]);
    exit;
}
