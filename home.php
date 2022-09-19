          <div class="Q2dzF9--QEdYFIr9GfyY_ ant-layout-content" id="pjax-container">
            <div class="_2Wo7Rrd3ZpZAoYEkyhebt1 ">
              <div class="_25umwYrOsnNNYqg00ShpP5"><div>
              <div class="ant-row">
                <div class="ant-col-xs-24 ant-col-sm-16" style="padding-left: 8px; padding-right: 8px;">
                  <img src="<?php $this->options->avatarUrl(); ?>" alt="" style="max-width: 100%; width: 300px;">
                  <div class="_1MEU3fSxnuPH85kqBSvsao" style="line-height:1.7;">
                    <h2><?php $this->author(); ?></h2>
                    <p><?php $this->options->selfDes(); ?></p>
                    <div style="margin-top: 2em;"><div>
                    <!-- 社交按钮 -->
                    <ul style="margin-left:-3em">
                      <?php $btn_data=json_decode('['.$this->options->socialBtns.']', true);
                      foreach($btn_data as $item){
                        if($item['icon-type'] && $item['icon'] && $item['icon-type']=='custom'){
                          $icon=$item['icon'];
                        }elseif($item['icon']){
                          $icon='<svg class="icon" aria-hidden="true"><use xlink:href="#icon-'.$item['icon'].'"></use></svg>';
                        }else{
                          $icon='';
                        }
                        //输出 li
                        echo '<li style="display: inline-block; padding: 0px 1em; text-align: center;">
                          <a href="'.$item['link'].'" target="_blank" style="color: rgb(136, 136, 136);">
                            <div>'.$icon.'</div>
                            '.$item['title'].'
                          </a>
                        </li>';
                      } ?>
                    </ul>
                    <!-- /社交按钮 -->
                    </div></div>
                  </div>
                </div>
                <div class="ant-col-xs-24 ant-col-sm-8" style="padding-left: 8px; padding-right: 8px;">
                  <h2 style="margin: 2em 0px;"><?php echo $GLOBALS['TEXT']['posts-title']; ?></h2>
                    <ul class="ant-timeline ant-timeline-pending">
                     
                   <?php $times=0;
                      while($this->next()): $times++; ?>
                      <li class="ant-timeline-item">
                        <div class="ant-timeline-item-tail"></div>
                        <div class="ant-timeline-item-head ant-timeline-item-head-<?php
                        $color_id=$times%5;
                        $color_list=array('yellow','blue','green','red','purple');
                        if($color_id){
                          $color=$color_list[$color_id];
                        }else{
                          $color=$color_list[0];
                        }
                        echo $color;
                        ?>"></div>
                        <div class="ant-timeline-item-content">
                          <div class="ant-card">
                            <div class="ant-card-head">
                              <h3 class="ant-card-head-title"><?php $this->date('Y/m/d H:i:s'); ?></h3>
                            </div>
                            <div class="ant-card-extra">
                              <span class="ant-avatar ant-avatar-sm ant-avatar-circle ant-avatar-image">
                                <?php $this->author->gravatar(); ?>
                              </span>
                            </div>
                            <div class="ant-card-body" style="padding: 12px 24px;">
                              <h4 style="padding: 0.5em 0px;">
                                <div data-show="true" class="ant-tag ant-tag-<?php echo $color; ?>">
                                  <span class="ant-tag-text"><?php $this->category(); ?></span>
                                </div>
                        <a style="color:#000" href="<?php $this->permalink(); ?>"><?php $this->title(30); ?></a> / <?php echo $GLOBALS['TEXT']['post-comment-prefix']; $this->commentsNum(); ?>
                              </h4>
                              <div style="line-height: 1.7;"><?php $this->excerpt(70); ?></div>
                              <ul style="list-style: disc; padding-left: 20px;"></ul>
                            </div>
                          </div>
                        </div>
                      </li>
                    <?php endwhile; ?>
                      <li class="ant-timeline-item ant-timeline-item-pending">
                        <div class="ant-timeline-item-tail"></div>
                        <div class="ant-timeline-item-head ant-timeline-item-head-blue"></div>
                        <div class="ant-timeline-item-content">
                          <a href="<?php $this->options->pageArchiveUrl(); ?>" rel="noopener noreferrer"><?php echo $GLOBALS['TEXT']['see-more']; ?></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
          </div>
        </div>