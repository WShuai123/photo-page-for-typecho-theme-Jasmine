<?php
/**
 * 相册页面
 *
 * @package custom
 */
if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}
?>
<!DOCTYPE html>
<html lang="zh">
<?php $this->need("header.php"); ?>

<body class="jasmine-body" data-prismjs-copy="点击复制" data-prismjs-copy-error="按Ctrl+C复制" data-prismjs-copy-success="内容已复制！">
  <div class="jasmine-container grid grid-cols-12">
    <!--左侧边栏-->
    <?php $this->need("component/sidebar-left.php"); ?>
    <div class="flex col-span-12 lg:col-span-8 flex-col lg:border-x-2 border-stone-100 dark:border-neutral-600 lg:pt-0 lg:px-6 pb-10 px-3">
      <?php $this->need("component/menu.php"); ?>
      <div class="flex flex-col gap-y-12">
        <div></div>
        <?php $this->need("component/post-title.php"); ?>
        
        <!-- 正文 -->
        <div class="markdown-body dark:!bg-[#161829] dark:!bg-[#0d1117] !text-neutral-900 dark:!text-gray-400" itemprop="articleBody">
          <div class="gallery-photos page"></div>
          <!-- 瀑布流排版 https://github.com/raphamorim/waterfall.js  -->
          <script src="//cdnjs.cloudflare.com/ajax/libs/waterfall.js/1.0.2/waterfall.min.js"></script>
          <!-- imgStatus https://github.com/raphamorim/imgStatus       -->
          <script src="https://npm.elemecdn.com/imgstatus/imgStatus.min.js"></script>
          <!-- 图片时间 https://github.com/Tokinx/lately       -->
          <script src="https://jsd.onmicrosoft.cn/gh/Tokinx/lately/lately.min.js"></script>
          <!-- 图片灯箱 https://github.com/Tokinx/ViewImage       -->
          <script src="https://jsd.onmicrosoft.cn/gh/Tokinx/ViewImage/view-image.min.js"></script>

          <style>
            .gallery-photos a img {
              margin: 0!important;
              border-radius: 0;
              bottom: 0px;
            }

            .gallery-photos {
              width: 100%;
              margin-top: 10px;
            }

            .gallery-photo {
              min-height: 5rem;
              width: 24.97%;
              padding: 4px;
              position: relative;
            }

            .gallery-photo a {
              border-radius: 8px;
              display: block;
              overflow: hidden;
            }

            .gallery-photo img {
              display: block;
              width: 100%;
              animation: fadeIn 1s;
              cursor: pointer;
              transition: all .4s ease-in-out !important;
            }

            .gallery-photo span.photo-title,
            .gallery-photo span.photo-time {
              max-width: calc(100% - 7px);
              line-height: 1.8;
              position: absolute;
              left: 4px;
              font-size: 14px;
              background: rgba(0, 0, 0, 0.3);
              padding: 0px 8px;
              color: #fff;
              animation: fadeIn 1s;
            }

            .gallery-photo span.photo-title {
              bottom: 4px;
              border-radius: 0 8px 0 8px;
            }

            .gallery-photo span.photo-time {
              top: 4px;
              border-radius: 8px 0 8px 0;
            }

            .gallery-photo:hover img {
              transform: scale(1.1);
            }

            @media screen and (max-width: 1100px) {
              .gallery-photo {
                width: 33.3%;
              }
            }

            @media screen and (max-width: 768px) {
              .gallery-photo {
                width: 49.9%;
                padding: 3px;
              }

              .gallery-photo span.photo-time {
                display: none;
              }

              .gallery-photo span.photo-title {
                font-size: 12px;
                left: 3px;
                bottom: 3px;
              }
            }

            @keyframes fadeIn {
              0% {
                opacity: 0;
              }

              100% {
                opacity: 1;
              }
            }

            .uploadmore {
              width: 40%;
              max-width: 810px;
              height: 30px;
              margin: auto;
              border-radius: 12px;
              font-weight: 700;
              text-align: center;
              display: flex;
              align-items: center;
              justify-content: center;
              cursor: pointer;
              border: 1px solid #000;
              box-shadow: 0 8px 16px -4px #2c2d300c;
              background: #f4f4f4;
            }

            /* butterfly和ty的夜间加载按钮 */
            [data-theme=dark] .uploadmore,
            .dark .uploadmore {
              background: #1D1E3C;
            }
          </style>

          <!-- 挂载元素 -->
          <div class="gallery-photos page"></div>
          <script type="text/javascript">
            window.onresize = () => {
              if (location.pathname == '/albums/') waterfall('.gallery-photos');
            };
            // 插入加载更多按钮
            var element = document.createElement('div');
            element.classList.add('uploadmore');
            element.innerHTML = `加载中...`
            document.querySelector('.gallery-photos.page').insertAdjacentElement('afterend', element);

		var result =
			`<?php
				$html = $this->row['text'];
				echo $html;
			?>`;
					result = result.split("\n");
					for (var i = 0; i < result.length; i++) {
						result[i] = result[i].split(",");
		}
	
            let page = []; // 存放分页
            let current_page = 0; // 当前页码

            // 将照片分页，每页20张
            for (var i = 0; i < result.length / 20; i++) {
              page.push(result.slice(i * 20, (i + 1) * 20))
            }

            // 先加载一页
            getPhoto(page[0]);
            updateButton(current_page, page.length - 1);
            current_page++;

            // 点击加载更多
            document.querySelector('.uploadmore').onclick = function () {
              getPhoto(page[current_page]);
              updateButton(current_page, page.length - 1)
              current_page++;
            }

            function getPhoto(photo_list) {
              // 拼接dom元素,插入到.gallery-photos.page
              let html = '';
              photo_list.forEach(item => {
                html +=
                  `<div class="gallery-photo"><a href="${item[2]}" data-fancybox="gallery" class="fancybox" data-thumb="${item[2]}"><img class="photo-img " loading='lazy' decoding="async" src="${item[2]}"></a>`;
                item[0] ? html += `<span class="photo-title">${item[0]}</span>` : '';
                item[1] ? html += `<span class="photo-time">${item[1]}</span>` : '';
                html += `</div>`;
              });
              document.querySelector('.gallery-photos.page').innerHTML += html;

              // 瀑布流排版
              imgStatus.watch('.photo-img', () => {
                waterfall('.gallery-photos');
              });

              // 处理时间为x天前
              window.Lately && Lately.init({
                target: '.photo-time'
              });

              // 图片灯箱,如果博客之前就有图片灯箱效果，注释下面一行,防止效果重叠
              window.ViewImage && ViewImage.init('.gallery-photo img');
            }

            // 更新按钮文字
            function updateButton(current_page, page) {
              // 第一次先加载一次按钮 只有一页时page=0所以额外判断一次
              if (current_page == 0 && page != 0) {
                document.querySelector('.uploadmore').innerHTML = `加载更多`
              } //全部加载完
              else if (current_page == page) {
                document.querySelector('.uploadmore').innerHTML = `已加载全部`
              }
            }
          </script>
          <!-- 正文结束 -->
        </div>
        <!--    评论区    -->
          <div>
             <?php $this->need("comments.php"); ?>
          </div>
      </div>
    </div>
    <div class="hidden lg:col-span-3 lg:block" id="sidebar-right">
      <?php $this->need("component/sidebar.php"); ?>
    </div>
  </div>
  <?php $this->need("footer.php"); ?>
</body>

</html>
