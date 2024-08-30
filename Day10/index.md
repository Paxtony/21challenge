# Day 10 - Wordpress｜记录
今天在调试的过程中发现了个很有趣的点，**现象是通过卷(volume)的形式挂载到Wordpress镜像中的二开的代码不生效。**

研究了下Wordpress的基础镜像以及建站的一些配置，发现在使用镜像构建Wordpress时，将自己二开的代码以卷(volume)的形式挂到/var/www/html下时，基础镜像会检查这个目录下的两个配置文件，wp-config.php是否存在和wp-setting.php是否存在版本号，不满足任何一个则会将/usr/lib/wordpress源码copy进/var/www/html中，进而导致自己二开的代码无效。所以需要保证上述的配置文件都是正确且存在的。