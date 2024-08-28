# Day  9- Wordpress｜Action、Filter


## 什么是Action、Filter
WordPress为开发者提供了Action 和 Filter 是两种重要的钩子（Hooks），用于让开发者在代码执行过程中插入自定义功能，极大的提高了WordPress的灵活性和可拓展性。
## Action
Action允许在特定的时间点运行自定义代码。这些时间点通常是 WordPress 执行期间的某些事件，比如页面加载完成、文章发布或保存时等等
```php
add_action('hook_name', 'your_function_name');

function your_function_name() {
   // 执行动作时要执行的代码
}
```

常见的 Action 示例
- init：在 WordPress 初始化时运行。
- wp_head：在生成页面的 <head> 部分内容之前运行。

## Filter
Filter 允许您在 WordPress 执行时，修改或附加数据。Filter 钩子在 WordPress 开始将内容显示给用户之前运行，允许您修改某些默认数据。

**使用场景**
- 修改输出内容：例如，过滤文章内容以增加自动版权声明。
- 修改默认行为：通过修改 WordPress 核心行为进行优化。
```php
add_filter('hook_name', 'your_filter_function', 10, 1);

function your_filter_function($content) {
   // 修改内容
   return $content;
}
// hook_name: 指定要过滤的内容的名称。
// your_filter_function: 自定义过滤函数名。
// 优先级: 通过第三个参数控制执行顺序，默认是 10。
// 参数数目: 第四个参数指明能够接受多少参数，默认是 1。
```