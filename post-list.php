<?php
/**
 * 文章列表
 * 
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
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
                  <span class="ant-breadcrumb-link"><a href="/blog">blog</a></span>
                  <span class="ant-breadcrumb-separator">/</span>
                </span>
              </div>
              <div class="_25umwYrOsnNNYqg00ShpP5">
                <div>
                   <div class="ant-spin-nested-loading">
                      <div class="ant-spin-container"><div>
                      <ul class="blog-archive-list" style="list-style: disc;">
                      <?php
                        $archives = Contents::archives($this);
                        $archives = array_chunk($archives, 35);
                        $archive_num = count($archives);
                        $page= isset($_GET['page']) ? $_GET['page'] : 0;
                        if($page>$archive_num) $page=$archive_num-1;
                        foreach($archives[$page] as $posts) {
                          echo '<li class="blog-post-item" style="color: #108ee9;"><span>['.$posts['created'].'] </span><a href="'.$posts['permalink'].'">'.$posts['title'].$this->options->postTitleSubFix.'</a></li>';
                        }
                        ?>
                      </ul>
                      <ul class="blog-postnav" style="margin-top:.8em">
                      <?php
                      if($archive_num>1){
                        for($i=0; $i<$archive_num; $i++) {
                            echo '<li class="blog-postnav-item"><a href="'.$this->permalink.'?page='.$i.'">'. strval($i+1) .'</a></li>';
                        }
                      }
                      ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php $this->need('includes/footer.php'); 





