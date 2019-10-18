# 集成多个存储的扩展

> 安装

```sh
composer require zd/upload
```

> 快速入门


. 阿里云oss

```php

// 初始化
$app = \Zd\upload\App::init([
    'app_key' => '阿里云的access_key_id',
    'app_secret' => '阿里云的access_key_secret',
    'endpoint' => '例如： oss-cn-shenzhen.aliyuncs.com',
    'bucket' => '存储的bucket'
]);

// 把网络图片上传到oss
$upload = $app->oss->uploadByUrl('http://domain/xxyy.jpg', 'ossdir/file_name');


```

. 腾讯云cos

```php
待续...
```