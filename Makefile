CODE_PATH = Day5/code/index.php
dev:
	docker run --rm -v /Users/yuanpengcheng/Desktop/21challenge/${CODE_PATH}:/usr/src/myapp/index.php -w /usr/src/myapp php:8.1-cli php index.php