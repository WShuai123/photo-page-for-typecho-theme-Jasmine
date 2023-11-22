# photo-page-for-typecho-theme-Jasmine
适配Typecho主题Jasmine的相册页面模板。

由于Jasmine默认没有图片灯箱效果，所以也加入了灯箱效果。如果自己配置了灯箱效果，注释掉219行的代码。

每页默认显示20张图片，点击加载更多按钮显示更多。

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
章若楠,2023-11-11,https://example1.com
章若楠2,2023/11/12,https://example1.com
章若楠3, ,https://example1.com
```

时间有多种格式，也可以精确到时分秒。

演示站：<https://blog.nice2cu.cc/albums.html>

示例图：

![]("https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/3.jpg")

效果图：

![]("https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/14.jpg")

灯箱效果图：

![]("https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/15.jpg")

参考和修改自：

+ <https://zhsher.cn/posts/23204/>
+ <https://blog.zhsher.cn/photos.html>