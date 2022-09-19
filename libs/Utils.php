<?php
/**
 * Utils.php
 * 
 * 提供某些 Typecho 方法的封装，以及一些常用方法实现
 * 
 * @author      熊猫小A
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Utils
{
    /**
     * 输出相对首页路由，本方法会自适应伪静态，用于动态文件
     */
    public static function index($path = '')
    {
        Helper::options()->index($path);
    }

    /**
     * 输出相对首页路径，本方法用于静态文件
     */
    public static function indexHome($path = '')
    {
        Helper::options()->siteUrl($path);
    }

    /**
     * 输出相对主题目录路径，用于静态文件
     */
    public static function indexTheme($path = '')
    {
        Helper::options()->themeUrl($path);
    }

    /**
     * 根据邮箱返回 Gravatar 头像链接
     */
    public static function gravatar($mail, $size = 64, $d = '')
    {
        return Typecho_Common::gravatarUrl($mail, $size, '', urlencode($d), true);
    }
}
