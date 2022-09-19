<?php
/**
 * 基于Bootstrap的Typecho简约主题
 * 
 * @package Tstrap 简约博客主题
 * @author Breeze
 * @version 1.1.0
 * @link https://www.gzk.ink
 */


 if (!defined('__TYPECHO_ROOT_DIR__')) exit;


 ?>
<!--/.头部-->
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- Bootstrap core CSS -->
    <link href="/usr/themes/Joker/category/css/bootstrap.min.css" rel="stylesheet">
	<link href="/usr/themes/Joker/category/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <script type="text/javascript">
(function () {
    window.TypechoComment = {
        dom : function (id) {
            return document.getElementById(id);
        },
    
        create : function (tag, attr) {
            var el = document.createElement(tag);
        
            for (var key in attr) {
                el.setAttribute(key, attr[key]);
            }
        
            return el;
        },

        reply : function (cid, coid) {
            var comment = this.dom(cid), parent = comment.parentNode,
                response = this.dom('respond-post-33'), input = this.dom('comment-parent'),
                form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                textarea = response.getElementsByTagName('textarea')[0];

            if (null == input) {
                input = this.create('input', {
                    'type' : 'hidden',
                    'name' : 'parent',
                    'id'   : 'comment-parent'
                });

                form.appendChild(input);
            }

            input.setAttribute('value', coid);

            if (null == this.dom('comment-form-place-holder')) {
                var holder = this.create('div', {
                    'id' : 'comment-form-place-holder'
                });

                response.parentNode.insertBefore(holder, response);
            }

            comment.appendChild(response);
            this.dom('cancel-comment-reply-link').style.display = '';

            if (null != textarea && 'text' == textarea.name) {
                textarea.focus();
            }

            return false;
        },

        cancelReply : function () {
            var response = this.dom('respond-post-33'),
            holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');

            if (null != input) {
                input.parentNode.removeChild(input);
            }

            if (null == holder) {
                return true;
            }

            this.dom('cancel-comment-reply-link').style.display = 'none';
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };
})();
</script>
</head>

  <body>
  </br>
<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="https://www.joker.cc/category/minfa">民法</a></li>
        <li><a href="https://www.joker.cc/category/xingfa">刑法</a></li>
        <li><a href="https://www.joker.cc/category/xingzhengfa">行政法</a></li>
        <li><a href="https://www.joker.cc/category/minsufa">民诉法</a></li>
        <li><a href="https://www.joker.cc/category/xingsufa">刑诉法</a></li>
        <li><a href="https://www.joker.cc/category/xingzhengsusongfa">行讼法</a></li>
        <li><a href="https://www.joker.cc/category/shangjingfa">商经法</a></li>
        <li><a href="https://www.joker.cc/category/sanguofa">三国法</a></li>
        <li><a href="https://www.joker.cc/category/lilunfa">理论法</a></li>
       
      </ul>

     <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/write-post.php">添加笔记</a></li>
          </ul>
        </li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
<?php $this->header(); ?>
<!--/.头部-->

<!--/.文章页面-->
   <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
      	
      
        <div class="col-xs-12">

          <div class="row">
          	
        
        
  <div class="col-xs-12">
  	<h3>笔记列表</h3>
     <div class="list-group">
	
	<?php $this->widget('Widget_Archive@index', 'pageSize=999&type=category', 'mid=46')->parse('<b><a class="list-group-item">《{category}》{year}年{month}月{day}日：{title}</b></a>'); ?>

     	<?php while($this->next()): ?>
		<a  class="list-group-item"><b style="color:red">《<?php $this->category(',', false); ?>》</b><b><?php $this->date('Y年m月d日'); ?>：<?php $this->title(1000) ?></b>
		</a>
		<?php endwhile; ?>

		
	</div>

   </div>
       
    

<center>
<nav  aria-label="Page navigation ">
 <?php $this->pageNav('«', '»', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li',  'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
</nav>
</center>




          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
<!--/.文章页面-->





<!--/.底部-->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div><!--/row-->
      <hr>

      <footer>
      	<p id="hitokoto"><a href="#" id="hitokoto_text">:D 获取中...</a></p>
      	<script src="https://v1.hitokoto.cn/?c=k&encode=js&select=%23hitokoto" defer></script>

        <p>&copy; 2022 <?php $this->options->title() ?>.</p>
      </footer>
      <?php $this->footer(); ?>
      
      </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="<?php $this->options->siteUrl(); ?>admin/js/jquery.js?v=17.10.30"></script>
<script>
$(document).ready(function() {

    // 聚焦
    $('#title').select();

    // 缩略名自适应宽度
    var slug = $('#slug');

    if (slug.length > 0) {
        var wrap = $('<div />').css({
            'position'  :   'relative',
            'display'   :   'inline-block'
        }),
        justifySlug = $('<pre />').css({
            'display'   :   'block',
            'visibility':   'hidden',
            'height'    :   slug.height(),
            'padding'   :   '0 2px',
            'margin'    :   0
        }).insertAfter(slug.wrap(wrap).css({
            'left'      :   0,
            'top'       :   0,
            'minWidth'  :   '5px',
            'position'  :   'absolute',
            'width'     :   '100%'
        })), originalWidth = slug.width();

        function justifySlugWidth() {
            var val = slug.val();
            justifySlug.text(val.length > 0 ? val : '     ');
        }

        slug.bind('input propertychange', justifySlugWidth);
        justifySlugWidth();
    }

});
function grin(tag) {
	var myField;
	tag = ' ' + tag + ' ';
	if (document.getElementById('new-review-textbox') && document.getElementById('new-review-textbox').type == 'textarea') {
		myField = document.getElementById('new-review-textbox');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}  else {
		myField.value += tag;
		myField.focus();
	}
}
</script>
</body>
</html>
<!--/.底部-->




