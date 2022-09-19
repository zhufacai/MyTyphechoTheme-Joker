<br><div class="divider"></div><br>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
<div role="comment" id="<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->_levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass; 
?>">
    <div class="comment-item">
      <div class="comment-item-flex">
        <div class="comment-avatar">
          <?php $comments->gravatar('100', ''); ?>
        </div>
        <div class="comment-main">
          <div class="comment-content bubble">
            <div class="bubble-tail"><span></span></div>
            <div class="comment-text">
              <?php Comments::getCommentHF($comments->coid); $comments->content(); ?>
            </div>
            </div>
            <div class="comment-footer">
              <div class="comment-author"><a href="<?php echo $comments->url; ?>" target="_blank"><?php echo $comments->author; ?></a></div>
              <div class="comment-date">
                <?php if ('waiting' == $comments->status) { ?>
                <em class="comment-waiting"><?php echo $GLOBALS['TEXT']['comment-waiting']; ?></em>
                <?php } else { ?>
                <?php $comments->date('Y-m-d H:i'); ?>
                <?php } ?>
              </div>
              <div class="comment-reply" style="margin-left: .5em">
                <?php $comments->reply('回复'); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="comment-children">
          <?php $comments->threadedComments($options); ?>
        </div>
      </div>
    </div>
<?php } 

$this->comments()->to($comments); 
    if($this->fields->commentShow == 0)://如果显示评论列表 
        if ($comments->have())://如果有评论 则显示 ?>
		<div class="comment-container" id="comments">
          <?php $comments->listComments(array(
            'before'        =>  '<div class="comment-list" role="list">',
            'after'         =>  '</div>',
            'avatarSize'    =>  200,
            'dateFormat'    =>  'Y-m-d H:i'
            )); ?>
          <br>
          <div class="divider"></div>
		  <div class="comment-pagenav">
            <?php $comments->pageNav('< Previous', 'Next >',1,'','wrapTag=div&wrapClass=moe-comments-page-navigator&prevClass=prev&nextClass=next'); ?>
          </div>
          <br><br>
          <div class="divider"></div>
		</div>
        <?php endif;//有无评论判断结束
	endif;//是否显示判断结束 ?>
        
        <?php if($this->allow('comment')): ?>
        <br><br>
		<div class="comment-form">
        <h2 style="font-weight:400"><?php echo $GLOBALS['TEXT']['comment-title']; ?></h2>
          <div id="<?php $this->respondId(); ?>" class="respond comment-box-id" data-commentUrl="<?php $this->commentUrl() ?>">
           <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <p>
                <textarea rows="8" name="text" id="textarea" class="comment-textarea textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <?php if($this->user->hasLogin()): ?>
            <p class="comment-logined-sign"><?php echo $GLOBALS['TEXT']['comment-form-logged']; ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php echo $GLOBALS['TEXT']['comment-form-logout']; ?></a></p>
            <?php else: ?>
            <div class="comment-input">
                <input type="text" name="author" id="author" class="text" placeholder="<?php echo $GLOBALS['TEXT']['comment-form-nameInput']; ?>" value="<?php $this->remember('author'); ?>" required />
                <input type="email" name="mail" id="mail" class="text" placeholder="<?php echo $GLOBALS['TEXT']['comment-form-emailInput']; ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                <input type="url" name="url" id="url" class="text" placeholder="<?php echo $GLOBALS['TEXT']['comment-form-urlInput']; ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
			</div>
            <?php endif; ?>
            <p class="comment-submit-box">
				<div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
                <button type="submit" onclick="return submitComment();" class="comment-submit submit"><?php echo $GLOBALS['TEXT']['comment-form-submit']; ?></button>
            </p>
          </form>
        </div>
        <?php else: ?>
        <h2 class="comment-hidden"><?php echo $GLOBALS['TEXT']['comment-banned']; ?></h2>
        <?php endif;  ?>
        <!--<nocompress>--><script type="text/javascript">(function(){window.TypechoComment={dom:function(id){return document.getElementById(id)},create:function(tag,attr){var el=document.createElement(tag);for(var key in attr){el.setAttribute(key,attr[key])}return el},reply:function(cid,coid){var comment=this.dom(cid),parent=comment.parentNode,response=this.dom('$archive->respondId'),input=this.dom('comment-parent'),form='form'==response.tagName?response:response.getElementsByTagName('form')[0],textarea=response.getElementsByTagName('textarea')[0];if(null==input){input=this.create('input',{'type':'hidden','name':'parent','id':'comment-parent'});form.appendChild(input)}input.setAttribute('value',coid);if(null==this.dom('comment-form-place-holder')){var holder=this.create('div',{'id':'comment-form-place-holder'});response.parentNode.insertBefore(holder,response)}comment.appendChild(response);this.dom('cancel-comment-reply-link').style.display='';if(null!=textarea&&'text'==textarea.name){textarea.focus()}return false},cancelReply:function(){var response=this.dom('$archive->respondId'),holder=this.dom('comment-form-place-holder'),input=this.dom('comment-parent');if(null!=input){input.parentNode.removeChild(input)}if(null==holder){return true}this.dom('cancel-comment-reply-link').style.display='none';holder.parentNode.insertBefore(response,holder);return false}}})();</script><!--</nocompress>-->
  <?php //兼容 typecho 反垃圾
  if ($this->options->commentsAntiSpam) { Comments::AntiSpam($this->respondId, Typecho_Common::shuffleScriptVar($this->security->getToken(preg_replace('/\??&?_pjax=[^&]+/i','',$this->request->getRequestUrl())))); } ?>