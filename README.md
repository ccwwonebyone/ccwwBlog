[ccwwBlog](https://www.ccwwonebyone.com/)
---
ccwwBlog小型博客系统


![首页](https://raw.githubusercontent.com/ccwwonebyone/ccwwBlog/master/public/about/home.png)
![文章](https://raw.githubusercontent.com/ccwwonebyone/ccwwBlog/master/public/about/article.png)

前台使用```TP5+Bootstrap4```开发

后台使用 ```TP5+vue开发```

支持
- 分类
- 标签
- 富文本编辑器（tinymce）
- markdown
![markdown](https://raw.githubusercontent.com/ccwwonebyone/ccwwBlog/master/public/about/markdown.png)
- 自定义网站配置（包括版权信息，网页浏览器图标等）
![网站配置](https://raw.githubusercontent.com/ccwwonebyone/ccwwBlog/master/public/about/company.png)

安装
```
//下载
git clone https://github.com/ccwwonebyone/ccwwBlog.git
cd ccwwBlog
//安装php扩展
composer install
cd public
//安装npm包
npm install

//环境配置
cp .env.explame .env
vi .env
//然后修改数据库，调试信息就好了
DB_TYPE=mysql
DB_HOSTNAME=localhost
DB_HOSTPORT=3306
DB_DATABASE=ccwwBlog
DB_USERNAME=root
DB_PASSWORD=secret
DEBUG=false
TRACE=false
FORNT_TARGET=http://localhost
//保存

//初始化[重置]用户名密码 执行前请先导入数据库
php think init:user username password

```
如果想自己打包的话
```
cd fornt
npm install
npm run build
```
后台页面入口
```
http://yourwebsite.com/vue
```
数据库安装
```
根目录下有一份ccwwBlog.sql为网站数据库。
```
本网站完全开源！
