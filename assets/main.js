/**
 * 页面操作
 */

/* 语言栏下拉 */
var langDropdown = function(){
    //点击动画
    $('#language-dropdown-btn').addClass('ant-btn-clicked');
    setTimeout(function(){ $('#language-dropdown-btn').removeClass('ant-btn-clicked'); }, 100);
    //淡入/淡出动画
    if($('#language-dropdown').hasClass('ant-dropdown-hidden')){
        $('#language-dropdown').addClass('slide-up-enter').addClass('slide-up-enter-active');
    }else{
        $('#language-dropdown').addClass('slide-up-leave').addClass('slide-up-leave-active');
    }
    setTimeout(function(){ $('#language-dropdown').removeClass('slide-up-leave').removeClass('slide-up-enter').removeClass('slide-up-enter-active').removeClass('slide-up-leave-active'); }, 100);
    $('#language-dropdown').toggleClass('ant-dropdown-hidden');
}

var langDropdownTrigger = function(){
    $('#language-dropdown-btn').click(langDropdown);
}
langDropdownTrigger();

/* 移动端 导航栏下拉 */
var navDropdown = function(){
    //淡入/淡出动画
    if($('#mobile-nav').hasClass('ant-dropdown-hidden')){
        $('#mobile-nav').addClass('slide-up-enter').addClass('slide-up-enter-active');
    }else{
        $('#mobile-nav').addClass('slide-up-leave').addClass('slide-up-leave-active');
    }
    setTimeout(function(){ $('#mobile-nav').removeClass('slide-up-leave').removeClass('slide-up-enter').removeClass('slide-up-enter-active').removeClass('slide-up-leave-active'); }, 100);
    $('#mobile-nav').toggleClass('ant-dropdown-hidden');
}
var navDropdownTrigger = function(){
    $('#mobile-nav-btn').click(navDropdown);
}
navDropdownTrigger();

/* 操作 cookie */
function addCookie(name, value, expireHours) {
    var cookieString = name + "=" + escape(value);
    if (expireHours > 0) {
        var date = new Date();
        date.setTime(date.getTime + expireHours * 3600 * 1000);
        cookieString = cookieString + "; expire=" + date.toGMTString();
    }
    document.cookie = cookieString;
}

/* 切换语言 */
var langSwitchTrigger = function(){
    $('#lang-switch-zh-cn').on("click",function(){
        addCookie('theme_lang','zh-cn',180);
        location.reload();
    });
    $('#lang-switch-en').click(function(){
        addCookie('theme_lang','en-us',180);
        location.reload();
    });
}
langSwitchTrigger();

/* 返回顶部 */
function GoTop() {
    $("body,html").animate({scrollTop:0},1000);
}

/**
 * Pjax
 */
$(document).pjax('a[href^="' + siteurl + '"]:not(a[target="_blank"], a[no-pjax], .comment-reply a, .cancel-comment-reply a)', {
    container: '#pjax-container',
    fragment: '#pjax-container',
    timeout: 8000
}).on('pjax:send', function() {
    GoTop();
    if(!$('#mobile-nav').hasClass('ant-dropdown-hidden')) navDropdown();
}).on('pjax:complete', function() {
    $("._2Wo7Rrd3ZpZAoYEkyhebt1").animate({opacity:1},500);
});

(function(){
    $("._2Wo7Rrd3ZpZAoYEkyhebt1").animate({opacity:1},500);
})();