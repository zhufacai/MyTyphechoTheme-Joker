<?php
/**
 * functions.php
 * 
 * 初始化
 * 
 * @author      熊猫小A
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<?php

require_once("libs/Utils.php");
require_once("libs/Contents.php");
require_once("libs/Comments.php");
//引入语言文件
if($_COOKIE['theme_lang']){
    $lang=$_COOKIE['theme_lang'];
}elseif(Helper::options()->themeLang){
    $lang=Helper::options()->themeLang;
}else{
    $lang='zh-cn';
}
require_once("lang/".$lang.".php");

/**
 * 注册文章解析 hook
 * 具体的解析代码需要在 Contents::parseContent() 方法中实现
 * 解析不会改变数据库中的内容，体现在文章前台输出、RSS 输出时
 */
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Contents','parseContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Contents','parseContent');

/**
 * 主题启用时执行的方法
 */
function themeInit() {
    /**
     * 重置某些设置项，采用数据库查询方式完成
     */
    $db = Typecho_Db::get();

    $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsAntiSpam');
    $db->query($query);
    $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsCheckReferer');
    $db->query($query);

    /* 设置评论最大嵌套层数 */
    $query = $db->update('table.options')->rows(array('value'=>'999'))->where('name=?', 'commentsMaxNestingLevels');
    $db->query($query);
    /* 强制新评论在前 */
    $query = $db->update('table.options')->rows(array('value'=>'DESC'))->where('name=?', 'commentsOrder');
    $db->query($query);

    /* 默认显示第一页评论 */
    $query = $db->update('table.options')->rows(array('value'=>'first'))->where('name=?', 'commentsPageDisplay');
    $db->query($query);
}

/**
 * 主题后台设置
 */
function themeConfig($form) {
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, 'https://joker.cc/usr/themes/Joker/img/logo.png', _t('头像 URL'), _t('输入一个图片 url，作为头像显示在【首页】'));
    $form->addInput($avatarUrl);
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, 'https://joker.cc/usr/themes/Joker/img/logo1.png', _t('LOGO URL'), _t('输入一个图片 url，同时作为 LOGO 和 favicon 显示在导航和页面中'));
    $form->addInput($logoUrl);
    $selfDes = new Typecho_Widget_Helper_Form_Element_Textarea('selfDes', NULL, '<ul>
<li>www@joker.cc</li>
<li>菜鸟 / 咸鱼 / 诗人→_→ </li>
<li>记录每一个平凡的日落日升...</li>
<li><span id="span"></span>
<script type="text/javascript">function runtime(){// 初始时间，日/月/年 时:分:秒
        X = new Date("08/05/2015 16:05:09");
        Y = new Date();
        T = (Y.getTime()-X.getTime());
        M = 24*60*60*1000;
        a = T/M;
        A = Math.floor(a);
        b = (a-A)*24;
        B = Math.floor(b);
        c = (b-B)*60;
        C = Math.floor((b-B)*60);
        D = Math.floor((c-C)*60);//信息写入到DIV中
        span.innerHTML = "本站已运行 "+A+"天"+B+"小时"+C+"分"+D+"秒"}setInterval(runtime, 1000);
</script></li>
</ul>', _t('自我介绍'), _t('输入一段自我介绍，显示在首页，支持 HTML'));
    $form->addInput($selfDes);
    $socialBtns = new Typecho_Widget_Helper_Form_Element_Textarea('socialBtns', NULL, '{"title":"Blog","link":"https://www.joker.cc/blog","icon-type":"custom","icon":"<i class=\"iconfont icon-blogger\"><\/i>"},
{"title":"Project","link":"https://www.joker.cc/project","icon-type":"custom","icon":"<i class=\"iconfont icon-project\"><\/i>"},
{"title":"E-mail","link":"mailto:www@joker.cc","icon-type":"custom","icon":"<i class=\"iconfont icon-email\"><\/i>"},
{"title":"Donate","link":"https://commerce.coinbase.com/checkout/f0c094c6-502b-45c5-8aed-7bb83d73ca00","icon-type":"custom","icon":"<i class=\"iconfont icon-donate\"><\/i>"}', _t('社交按钮'), _t('输出在首页的社交按钮，便于访客在其他平台找到你，用 JSON 格式书写，例:<br><code>{"title":"GitHub","link":"https://github.com/zhufacai/","icon-type":"built-in","icon":"github"},{...}</code>
    <br>P.S. <code>icon-type 有两个可选的值，一个是 built-in，表示主题内置的图标，此时 icon 属性填写图标名；若值为 custom，icon 中按自己的方式填写 html。若未定义 icon-type，则默认为 built-in 属性</code>'));
    $form->addInput($socialBtns);


    $themeLang = new Typecho_Widget_Helper_Form_Element_Text('themeLang', NULL, 'en-us', _t('默认语言'), _t('输入语言包名（如：zh-cn，en-us），作为默认前台语言'));
    $form->addInput($themeLang);

    $pageArchiveUrl = new Typecho_Widget_Helper_Form_Element_Text('pageArchiveUrl', NULL, 'blog', _t('归档页面 URL'), _t('输入归档页面链接地址，用于首页的「more...」按钮'));
    $form->addInput($pageArchiveUrl);
    $postTitleSubFix = new Typecho_Widget_Helper_Form_Element_Text('postTitleSubFix', NULL, '.md', _t('文章标题后缀'), _t('为了表现文章列表类似文件列表的设计感，可以在文章标题后加一个后缀名，如：<code>.md</code>，若不用则留空'));
    $form->addInput($postTitleSubFix);

    $gh_username = new Typecho_Widget_Helper_Form_Element_Text('gh_username', NULL, 'zhufacai', _t('GitHub 用户名'), _t('输入你的 GitHub 用户名，显示在页脚让访客直接访问您的 GitHub 主页，留空则不显示'));
    $form->addInput($gh_username);
     $tongji = new Typecho_Widget_Helper_Form_Element_Text('tongji', NULL, '<script> var _hmt = _hmt || []; (function() {   var hm = document.createElement("script");   hm.src = "https://hm.baidu.com/hm.js?5af74b8d5d1b5ae81fce341d7d66a638";   var s = document.getElementsByTagName("script")[0];    s.parentNode.insertBefore(hm, s); })(); </script>', _t('统计代码'), _t('输入百度统计等网站统计代码'));
    $form->addInput($tongji);
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {

}

