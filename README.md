# photo-page-for-typecho-theme-Jasmine
适配Typecho主题Jasmine的相册页面模板。

参考和修改自：
+ <https://zhsher.cn/posts/23204/>
+ <https://blog.zhsher.cn/photos.html>

## 使用方法：

1. 下载仓库中的php文件，保存到typecho**主题文件夹**的根目录下。比如`/typecho/usr/themes/jasmine`。

2. 打开Typecho后台---管理----独立页面----新增----右侧自定义模板----相册页面

3. 标题为相册页面的标题，路径必须与代码第**158行**的路径相同。默认为albums

调用格式:

```markdown
标题,简介,图片链接
```

多图以回车结束，每一行代表一张图片的信息。必须为英文逗号。如果标题或者简介不想填，用空格表示。

例如：

```markdown
章若楠,2023-11-11,./pic/1.webp
章若楠2,2023/11/12,./pic/1.webp
章若楠3, ,./pic/2.webp
```