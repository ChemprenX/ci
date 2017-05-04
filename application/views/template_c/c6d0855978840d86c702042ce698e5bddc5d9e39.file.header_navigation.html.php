<?php /* Smarty version Smarty-3.1.18, created on 2017-04-14 14:47:45
         compiled from "D:\xampp\htdocs\jwj2017\application\views\api\common\header_navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:2722858f07091a75fe9-93991178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6d0855978840d86c702042ce698e5bddc5d9e39' => 
    array (
      0 => 'D:\\xampp\\htdocs\\jwj2017\\application\\views\\api\\common\\header_navigation.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2722858f07091a75fe9-93991178',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f07091acf508_81211969',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f07091acf508_81211969')) {function content_58f07091acf508_81211969($_smarty_tpl) {?><div class="g-numaa clearfix">
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
