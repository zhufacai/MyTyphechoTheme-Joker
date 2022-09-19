<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/page-head.php');
$this->need('includes/header.php');
?>
          <div class="Q2dzF9--QEdYFIr9GfyY_ ant-layout-content" id="pjax-container">
            <div class="_2Wo7Rrd3ZpZAoYEkyhebt1 ">
              <div class="ant-breadcrumb" style="margin: 12px 0px; padding: 0px 1em;">
                <span>
                  <span class="ant-breadcrumb-link"><a href="/">Home</a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
                <span>
                  <span class="ant-breadcrumb-link"><a href="/blog">blog</a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
                <span>
                  <span class="ant-breadcrumb-link"><a href=""><?php $this->archiveTitle(array(
                    'category'  =>  'Category: %s',
                    'search'    =>  'keyword: %s',
                    'tag'       =>  'tag: %s',
                    'author'    =>  'author: %s'
                    ), '', ''); ?></a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
              </div>
              <div class="_25umwYrOsnNNYqg00ShpP5">
                <div>
                   <div class="ant-spin-nested-loading">
                      <div class="ant-spin-container"><div>
                          <ul class="blog-archive-list" style="list-style: disc;">
                      <?php while($this->next()): ?>
                        <li><a href="<?php $this->permalink(); ?>"><?php $this->title(35); $this->options->postTitleSubFix(); ?></a></li>
                      <?php endwhile; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $this->need('includes/footer.php'); ?>





