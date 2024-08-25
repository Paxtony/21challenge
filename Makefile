CODE_PATH = Day5/code/index.php
CODE_DIR_PATH = Day6/code

dev:
	docker run --rm -v /Users/yuanpengcheng/Desktop/21challenge/${CODE_PATH}:/usr/src/myapp/index.php -w /usr/src/myapp php:8.1-cli php index.php
	
stage:
	docker run --rm --network host -v /Users/yuanpengcheng/Desktop/21challenge/${CODE_DIR_PATH}:/var/www/html --name service_justfitapp_server trafex/php-nginx