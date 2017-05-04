<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 14:20:08
         compiled from "/home/75/jinwangjiang/application/views/api/common/header_navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:175667360658d8af18a4c1c0-09630997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '253ecbcbf11a745d4db20ca309b695ccd9424a0a' => 
    array (
      0 => '/home/75/jinwangjiang/application/views/api/common/header_navigation.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175667360658d8af18a4c1c0-09630997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8af18a5c569_11218790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8af18a5c569_11218790')) {function content_58d8af18a5c569_11218790($_smarty_tpl) {?><div class="g-numaa clearfix">
    <div class="b1">
        <div class="wrap clearfix">
            <?php if (!get_cookie('username')) {?>
            <div class="f14 fr mt10 graydeep"><a href="/index.php/api/user/login">登录</a> | <a
                    href="/index.php/api/user/register">注册</a></div>
            <?php } else { ?>

            <select class="fr mt10 mb10 form-control" onchange="window.location=this.value">
                <option value=""><?php echo get_cookie('username');?>
</option>
                <!--<option value="/index.php/api/user/mycase">我的作品</option>
                <option value="/index.php/api/user/userinfo">账号信息</option>
                <option value="/index.php/api/user/logout">退出</option>-->
                <!--上面5个，邮箱名，个人信息，提交案例，我的作品，退出-->
                <option value="/index.php/api/user/userinfo">个人信息</option>
                <option value="/index.php/api/cases/casesubmit">提交案例</option>
                <option value="/index.php/api/user/mycase">我的作品</option>
                <option value="/index.php/api/user/logout">退出</option>
            </select>
            <div class="fr graydeep f14 mt10 mr10 pt5">欢迎</div>
            <?php }?>
        </div>
    </div>
</div>
<div class="nav">
    <div class="wrap clearfix">
        <div class="logo fl">
            <img src="/static/api/new/images/logo_02.png" alt=""/>
        </div>
        <ul class="clearfix fr navUl">

            <li class="homeli">
                <a href="/index.php/api/user/static_home">
                    首页
                </a>
            </li>
            <li class="peakli forumli">
                <a href="/index.php/api/user/static_peak">
                    专家团队
                </a>
            </li>
            <!--<li class="twentyYearsli">
                <a href="/index.php/api/user/static_twentyYears">
                    致敬中国网络营销20年
                </a>
            </li>-->
            <li class="casecollctionli">
                <a href="/index.php/api/user/static_caseCollection">
                    案例征集
                </a>
            </li>
            <li class="last partnerli">
                <a href="/index.php/api/user/static_partner">
                    合作伙伴
                </a>
            </li>
        </ul>
    </div>

</div>
<?php }} ?>
