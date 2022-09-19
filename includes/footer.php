<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>

          <div class="_2D_wsQMRNEw3ig97yvSMJF ant-layout-footer">
            <div class="_2Wo7Rrd3ZpZAoYEkyhebt1 "><?php if($this->options->gh_username && $this->options->gh_username!=''){ ?>
              <div><iframe title="star" frameborder="0" scrolling="0" width="170px" height="20px" src="https://ghbtns.com/github-btn.html?user=<?php $this->options->gh_username(); ?>&amp;type=follow"></iframe></div><?php } ?>
              <div style="margin-top: 0.6em;">
                <p class="_3KhV0_BsFZ1aYH1JoTHH85">&copy; 2015-<?php echo date('Y').' '; ?> <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank">CC BY-SA 4.0</a> / <a href="https://www.joker.cc/sitemap.xml" target="_blank">Sitemap</a><br>
                Maintained by <a href="/" target="_self"><?php $this->author(); ?></a>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- js -->
    <script>var siteurl='<?php $this->options->siteUrl(); ?>';</script>
    <script src="<?php Utils::indexTheme('assets/jquery.min.js'); ?>"></script>
    <script src="<?php Utils::indexTheme('assets/jquery.pjax.js'); ?>"></script>
    <script src="<?php Utils::indexTheme('assets/main.js'); ?>"></script>
  </body>
</html>
