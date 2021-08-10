# [qbhy/tt-microapp](https://github.com/qbhy/tt-microapp) 的测试项目

1. ``composer.json`` 配置：

```
{
    "name": "yxz/tt-microapp_test",
    "type": "project",
    "require": {
        "96qbhy/tt-microapp": "dev-add_ecpay"
    },
    "repositories": [
        {
            "type": "path",
            "url": "/home/yxz/samba_share/other_project/tt-microapp"
        }
    ]
}
```

关键配置代码：

```
"repositories": [
    {
        "type": "path",
        "url": "/home/yxz/samba_share/other_project/tt-microapp"
    }
]
```

url 值填写电脑本地的 ``tt-microapp`` 文件夹。

2. 然后在当前项目根目录执行：

```
composer install
```

安装完成之后，修改本地目录的 ``tt-microapp`` 里的代码，然后运行：

```
php test.php
```

就可以看到最新的结果了！

> 以下为运行结果示例：

```
$ php test.php
array(3) {
  ["err_no"]=>
  int(0)
  ["err_tips"]=>
  string(0) ""
  ["data"]=>
  array(2) {
    ["order_id"]=>
    string(19) "6994725113568446759"
    ["order_token"]=>
    string(128) "CgwIARDiDRibDiABKAESTgpMDH2cZS9yUh1WVwt26Un9mppZJ0htBqN4vLL3sFP8Jj1fugNke2FpxIveYMPoKTe9Miohwm//9L4HB9xh/f70qyZWQOAGiru5gql3GhoA"
  }
}
```
