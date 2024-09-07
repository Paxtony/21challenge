<?php
session_start();

function initializeGame()
{
    $grid = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    addRandomNumber($grid);
    addRandomNumber($grid);
    $_SESSION['grid'] = $grid;
    return $grid;
}

function addRandomNumber(&$grid)
{
    $emptyCells = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($grid[$i][$j] == 0) {
                $emptyCells[] = [$i, $j];
            }
        }
    }
    if (count($emptyCells) > 0) {
        $cell = $emptyCells[array_rand($emptyCells)];
        $grid[$cell[0]][$cell[1]] = rand(0, 1) ? 2 : 4;
    }
}

function moveLeft(&$grid)
{
    for ($i = 0; $i < 4; $i++) {
        $merged = [];
        for ($j = 0; $j < 4; $j++) {
            if ($grid[$i][$j] !== 0) {
                $k = $j;
                while ($k > 0 && $grid[$i][$k - 1] === 0) {
                    $grid[$i][$k - 1] = $grid[$i][$k];
                    $grid[$i][$k] = 0;
                    $k--;
                }
                if ($k > 0 && $grid[$i][$k - 1] === $grid[$i][$k] && !in_array($k - 1, $merged)) {
                    $grid[$i][$k - 1] *= 2;
                    $grid[$i][$k] = 0;
                    $merged[] = $k - 1;
                }
            }
        }
    }
}

function transpose(&$grid)
{
    $transposed = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            $transposed[$j][$i] = $grid[$i][$j];
        }
    }
    $grid = $transposed;
}

function moveGame($direction)
{
    $grid = $_SESSION['grid'];

    switch ($direction) {
        case 'left':
            moveLeft($grid);
            break;
        case 'right':
            foreach ($grid as &$row) $row = array_reverse($row);
            moveLeft($grid);
            foreach ($grid as &$row) $row = array_reverse($row);
            break;
        case 'up':
            transpose($grid);
            moveLeft($grid);
            transpose($grid);
            break;
        case 'down':
            transpose($grid);
            foreach ($grid as &$column) $column = array_reverse($column);
            moveLeft($grid);
            foreach ($grid as &$column) $column = array_reverse($column);
            transpose($grid);
            break;
    }

    addRandomNumber($grid);
    $_SESSION['grid'] = $grid;
    return $grid;
}

function isGameOver($grid)
{
    foreach ($grid as $row) {
        if (in_array(0, $row, true)) {
            return false;
        }
    }

    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($j < 3 && $grid[$i][$j] == $grid[$i][$j + 1]) {
                return false;
            }
            if ($i < 3 && $grid[$i][$j] == $grid[$i + 1][$j]) {
                return false;
            }
        }
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $direction = $_POST['direction'];
    $grid = moveGame($direction);

    header('Content-Type: application/json');
    echo json_encode([
        'grid' => $grid,
        'gameOver' => isGameOver($grid)
    ]);
    exit;
} else {
    $grid = initializeGame();
    header('Content-Type: application/json');
    echo json_encode([
        'grid' => $grid,
        'gameOver' => isGameOver($grid)
    ]);
    exit;
}
