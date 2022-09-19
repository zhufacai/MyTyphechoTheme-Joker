<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/page-head.php');
$this->need('includes/header.php');
?>
          <div class="Q2dzF9--QEdYFIr9GfyY_ ant-layout-content" id="pjax-container">
            <div class="_2Wo7Rrd3ZpZAoYEkyhebt1 ">
              <div class="ant-breadcrumb" style="margin: 12px 0px; padding: 0px 1em;">
                <span>
                  <span class="ant-breadcrumb-link"><a href="<?php $this->options->siteUrl(); ?>">Home</a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
                <span>
                  <span class="ant-breadcrumb-link"><a href="<?php $this->options->pageArchiveUrl(); ?>">blog</a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
                <span>
                  <span class="ant-breadcrumb-link"><a href="<?php $this->permalink(); ?>"><?php $this->title(10); $this->options->postTitleSubFix(); ?></a></span>
                </span>
              </div>
              <div class="_25umwYrOsnNNYqg00ShpP5">
                <div>
                  <div class="ant-spin-nested-loading">
                    <div class="ant-spin-container">
                      <h1 class="_3WJKNlJQ1XojNJ3uHM5j5c"><?php $this->title(); ?></h1>
                      <p style="margin-bottom: .7em"><?php $this->date('Y-m-d H:i:s'); if($this->is('post')){ ?> / <?php $this->category();} ?> / <?php $this->commentsNum('%d Comments'); ?></p>
                      <duv class="divider"></div>
                      <div class="_1qBORWKGmTDRB4wXpogx8d">
                        <div class="markdown-body"><?php $this->content(); ?></div>
                      </div>
                    <div>
                  </div>
                </div>
                <?php $this->need('includes/comments.php'); ?>
              </div>
            </div>
          </div>
        </div>

<?php $this->need('includes/footer.php'); ?>