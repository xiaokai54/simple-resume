## 操作说明

- 初始化类wordpress（其实是我偷懒抄的wp~~~）
- 默认用户：admin
- 默认密码：admin@123
- 不喜欢默认用户请自行注册用户
- 搜索功能均可用，直达百度

### 使用教程

- 安装小皮面板并进入[小皮面板](https://www.xp.cn/) 的WWW目录下
- 在电脑已安装git的情况下，执行如下指令

```bash
git clone git@github.com:xiaokai54/simple-resume.git
```

- 直接使用`localhost/simple-resume`即可
- 若创建失败可以在网站根目录下创建`config.php`文件，将以下内容写入文件并保存
```php
<?php
/** The name of the database */
define('DB_NAME', 'phphomework');
/** MySQL database username */
define('DB_USER', 'username');
/** MySQL database password */
define('DB_PASSWORD', 'password');
/** MySQL hostname */
define('DB_HOST', 'localhost');
?>
```

### 更新日志
##### 2022-01-06
- 增加自定义初始账户设置，用户可以自定义初始用户名和密码 
- 增加系统重置功能，会删除数据库和配置文件（<font color=red>高危操作</font>）<br>
`http://localhost/simple-resume/reset-config.php` 无其他入口，防止误操作
- 目前已知BUG：数据库密码输入错误永远进不去系统（重置即可解决）
- 未知BUG：一大堆，累了~
---
### 开发者
[xiaokai54](https://github.com/xiaokai54) <br>
[zhangxuesong123](https://github.com/2639764982)

### 代码参考
[Wordpress](https://cn.wordpress.org) <br>
[php中文网模板](https://www.php.cn/xiazai/code/3021) <br>
[菜鸟教程PHP](https://www.runoob.com/php/php-tutorial.html) <br>
[菜鸟教程MySQL](https://www.runoob.com/mysql/mysql-tutorial.html)
