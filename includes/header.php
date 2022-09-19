<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="root">
  <div id="wrap">
    <div class="_2GPhW9W0XHsEV923mAUGBa ant-layout">
      <div class="MswDWkUV1nTSeGCKZ7ecS ant-layout-header">
        <div class="_2Wo7Rrd3ZpZAoYEkyhebt1 ">
          <div class="ant-row-flex ant-row-flex-space-between ant-row-flex-center" style="position:relative">
            <div style="position: absolute; top: 0px; right: 0px;">
              <!-- 语言选择 -->
              <div id="language-dropdown" class="ant-dropdown ant-dropdown-hidden ant-dropdown-placement-bottomCenter" style="left: auto; right: 0; top: 51.6667px; width: 108px;">
                <ul class="ant-dropdown-menu ant-dropdown-menu-vertical ant-dropdown-menu-light ant-dropdown-menu-root" role="menu" aria-activedescendant="" tabindex="0" style="text-align: center;">
                  <li id="lang-switch-zh-cn" class="ant-dropdown-menu-item" role="menuitem" aria-selected="false">
                    <div><svg class="icon" aria-hidden="true"><use xlink:href="#icon-china"></use></svg>
                    <span style="margin-left: 0.5em;">CHINESE</span></div>
                  </li>
                  <li id="lang-switch-en" class="ant-dropdown-menu-item" role="menuitem" aria-selected="false">
                    <div><svg class="icon" aria-hidden="true"><use xlink:href="#icon-english"></use></svg>
                    <span style="margin-left: 0.5em;">ENGLISH</span></div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="small-screen" style="position: absolute; top: 0px; left: 0px;">
              <!-- 小屏幕下页面导航 -->
              <div id="mobile-nav" class="ant-dropdown ant-dropdown-hidden ant-dropdown-placement-bottomLeft" style="right: auto; left: 60px; top:51.6667px">
                <ul class="ant-dropdown-menu ant-dropdown-menu-vertical _17Ws5SfUDFWCG4Z-KwVx0 ant-dropdown-menu-light ant-dropdown-menu-root" role="menu" aria-activedescendant="" tabindex="0">
                  <li class="ant-dropdown-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>"><?php echo $GLOBALS['TEXT']['home']; ?></a></li>
                  <li class="ant-dropdown-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>blog"><?php echo $GLOBALS['TEXT']['blog']; ?></a></li>
                  <li class="ant-dropdown-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>photo"><?php echo $GLOBALS['TEXT']['photo']; ?></a></li>
                  <li class="ant-dropdown-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>category/note"><?php echo $GLOBALS['TEXT']['note']; ?></a></li>
                </ul>
              </div>
            </div>
            <!-- logo -->
            <div class="ant-col-12">
              <div class="_2BA3gHgslWs14itVTuSQtO">
                <img src="<?php $this->options->logoUrl(); ?>" style="border-radius:100%">
              </div>
              <!-- 大屏幕导航 -->
              <ul class="large-screen ant-menu ant-menu-horizontal _1AwJ_4MpmD66PZ0Rvb_eCe ant-menu-light ant-menu-root" role="menu" aria-activedescendant="" tabindex="0">
                <li class="ant-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>"><?php echo $GLOBALS['TEXT']['home']; ?></a></li>
                <li class="ant-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>blog"><?php echo $GLOBALS['TEXT']['blog']; ?></a></li>
                <li class="ant-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>photo"><?php echo $GLOBALS['TEXT']['photo']; ?></a></li>
                <li class="ant-menu-item" role="menuitem" aria-selected="false"><a href="<?php $this->options->siteUrl(); ?>category/note"><?php echo $GLOBALS['TEXT']['note']; ?></a></li>
              </ul>
              <!-- 小屏幕导肮 -->
              <a id="mobile-nav-btn" class="small-screen ant-dropdown-link ant-dropdown-trigger"><?php echo $GLOBALS['TEXT']['home']; ?><i class="anticon anticon-down"></i></a>
            </div>
            <div class="ant-col-12">
              <div class="ant-row-flex ant-row-flex-end ant-row-flex-center">
                <div>
                  <button type="button" id="language-dropdown-btn" class="ant-btn ant-dropdown-trigger" style="border: none;">
                    <div>
                      <?php if($_COOKIE['theme_lang'] && $_COOKIE['theme_lang']=='en-us'){ ?><svg class="icon" aria-hidden="true"><use xlink:href="#icon-english"></use></svg>
                      <span style="margin-left: 0.5em;">ENGLISH</span>
                      <?php }else{ ?><svg class="icon" aria-hidden="true"><use xlink:href="#icon-china"></use></svg>
                      <span style="margin-left: 0.5em;">CHINESE</span><?php } ?>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>