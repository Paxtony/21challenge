# Day19 - PHP 实现2048小游戏-优化

### 优化内容
1. 目前发放的方块是2和4随机出现，在后续方块数字变大后，需要调整发放初始的值。
2. 客户端事件加入节流操作，一段时间只允许操作一次，避免服务端压力过大。
3. 完善UI和动画，增加数字合并动画和移动动画优化
4. 优化PHP和HTML，通过面向对象思维，封装类实现逻辑和UI部分

### 代码改动

**需求1：php增加数字发放逻辑**
```php
// 增加发放数字随数字增大逻辑
if (count($emptyCells) > 0) {
    $cell = $emptyCells[array_rand($emptyCells)];
    $maxNum = max(array_map('max', $this->grid));
    $probability4 = min(9, (int)($maxNum / 128));
    $this->grid[$cell[0]][$cell[1]] = rand(0, 9) < $probability4 ? 4 : 2;
}
```

**需求2:html增加节流逻辑**
```js
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
```
**需求3：优化动画**
```css
@keyframes move {
    from { transform: scale(1.1); }
    to { transform: scale(1); }
}

td {
    /* 增加一小段弹跳效果 */
    transition: transform 0.3s ease, background-color 0.3s ease;
}
/* 逻辑判断是否是合并的数字 */
.combined {
    animation: move 0.3s;
}
```
```js
// 增加给元素增加动画class的逻辑，判断是新发放的数字还是合并的数字，
// 新增一个指针，存储原数组，通过原数组和接口返回数据对比
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
```
**需求4：php定义类Game2048，HTML定义类GameUI**
```php
class Game2048
```
```js
class GameUI {}
```
