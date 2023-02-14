# 奴才驾到-CMS
#### 一键部署

环境：

- docker：20.10.23
- PHP：7.4.33
- SQLite：3.34.1

步骤：

1. docker build

   ```shell
   docker build -t wans/cms .
   ```

2. docker run

   ```shell
   docker run --name arcnet -h arcnet -itd -v /mnt/yii2proj:/data -e DBDSN=sqlite:/data/arcnet.db -e TablePrefix=arcnet_ -e AdminUsername=admin -e AdminPassword=123465 --network=host wans/cms
   ```

3. docker exec

   ```shell
   docker exec -it pid bash
   ```

4. 数据库文件存放于`/mnt/yii2proj/arcnet.db`

#### 普通安装

前置条件: 如未特别说明，本文档已默认您把`php`命令加入了环境变量，如果您未把`php`加入环境变量，请把以下命令中的`php`替换成`/path/to/php`。

> 如果配置完web服务器看到404，请确认是把/path/to/frontend/web设置为web根目录，如果不想修改也可以尝试访问http://xxx.com/frontend/web/install.php
>
> 如果安装完打开首页看到图片加载失败，请前往后台:设置->网站设置->网站域名 填写正确的前台地址，如//xxx.com或者//xxx.com/CMS/frontend/web

步骤：

1. git clone

   ```shell
    git clone git@github.com:CuteWans/Yii-CMS.git
   ```

2. 配置web服务器

3. 浏览器打开http://localhost/install.php按照提示完成安装

4. 完成

#### web服务器配置

1. php内置web服务器(仅可用于开发环境,当您的环境中没有web服务器时)

   ```shell
   cd /path/to/cms
   php ./yii serve  
   
   #至此启动成功，可以通过localhost:8080/和localhost:8080/admin来访问了，在线安装即访问localhost:8080/install.php
   ```

2. Apache

   ```shell
   DocumentRoot "path/to/frontend/web"
   <Directory "path/to/frontend/web">
     # 开启 mod_rewrite 用于美化 URL 功能的支持（译注：对应 pretty URL 选项）
     RewriteEngine on
     # 如果请求的是真实存在的文件或目录，直接访问
     RewriteCond %{REQUEST_FILENAME} !-f
     RewriteCond %{REQUEST_FILENAME} !-d
     # 如果请求的不是真实文件或目录，分发请求至 index.php
     RewriteRule . index.php
   
     # ...其它设置...
   </Directory>
   ```

3. Nginx

   ```shell
   server {
    server_name  cms.test.docker;
    root   /path/to/frontend/web;
    index  index.php index.html index.htm;
    try_files $uri $uri/ /index.php?$args;
   
    location ~ /api/(?!index.php).*$ {
       rewrite /api/(.*) /api/index.php?r=$1 last;
    }
   
    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
        try_files $uri =404;
    }
   }
   ```
