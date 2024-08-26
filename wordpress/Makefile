# 定义变量
ARG_PROJECT_NAME=wordpress-study# 项目名称
ARG_CONTAINER_WORKDIR=/var/www/html# docker工作目录

dev:
	docker run --rm --network host -v .:$(ARG_CONTAINER_WORKDIR) --name $(ARG_PROJECT_NAME) trafex/php-nginx
