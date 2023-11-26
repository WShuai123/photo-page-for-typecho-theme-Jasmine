# photo-page-for-typecho-theme-Jasmine
适配Typecho主题[Jasmine](https://github.com/liaocp666/Jasmine)的相册页面模板。

由于Jasmine没有为图片设置灯箱效果,所以在代码中添加了这个效果。

如果你已经配置了其他的图片效果,请注释掉35行和224行灯箱效果相关的代码,否则多种图片效果会同时显示,导致显示问题。

> 建议配置全站灯箱效果。这样不仅相册页面，别的页面的图片也能有灯箱效果。配置方法参考：<https://blog.nice2cu.cc/archives/ViewImage.html>

每页默认显示20张图片，点击加载更多按钮显示更多。

## 使用方法：

1. 下载仓库中的php文件，保存到typecho**主题文件夹**的根目录下。比如`/typecho/usr/themes/jasmine`。

2. 打开Typecho后台---管理----独立页面----新增----右侧自定义模板----相册页面

3. 标题为相册页面的标题，路径必须与代码第**163行**的`location.pathname`路径相同。默认为albums

调用格式:

```markdown
标题,简介,图片链接
```

每张图片占一行,信息之间用英文逗号隔开。如果不想填写标题或简介,请用空格代替。

例如：

```markdown
章若楠,2023-11-11,https://example1.com
章若楠2,2023/11/12,https://example1.com
章若楠3, ,https://example1.com
```

时间有多种格式，也可以精确到时分秒。

演示站：<https://blog.nice2cu.cc/albums.html>

示例图：

![](https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/3.jpg)

效果图：

![](https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/14.jpg)

灯箱效果图：

![](https://raw.githubusercontent.com/WShuai123/photo-page-for-typecho-theme-Jasmine/main/pic/15.jpg)

参考和修改自：

+ <https://zhsher.cn/posts/23204/>