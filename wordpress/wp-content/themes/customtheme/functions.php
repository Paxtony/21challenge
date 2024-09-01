<?php

function my_custom_theme_setup()
{
    // 让主题支持特色图片
    add_theme_support('post-thumbnails');

    // 注册导航菜单
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));
}

add_action('after_setup_theme', 'my_custom_theme_setup');

// 加载额外的CSS和JS文件
function my_custom_theme_scripts()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'my_custom_theme_scripts');
