<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 17:40:07
         compiled from "application/views/api/user/userinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:176443296458d8ddf7eda5e0-70155942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37770641e22896b362d9e0a8992886c7e019dc72' => 
    array (
      0 => 'application/views/api/user/userinfo.html',
      1 => 1488696370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176443296458d8ddf7eda5e0-70155942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8ddf7f31c68_92366329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8ddf7f31c68_92366329')) {function content_58d8ddf7f31c68_92366329($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="main_zh add_admin clearfix  f14 fYaHei">

    <ul class=" nav-stacked col-md-2 userNav" id="myTab">
        <li  class="act"><a href="/index.php/api/user/userinfo">个人信息</a></li>
        <li><a  href="/index.php/api/cases/casesubmit">案例提交</a></li>
        <li><a href="/index.php/api/user/mycase">作品查询</a></li>
    </ul>
    <div class="tab-content col-md-10">
        <ul class="main_bi w400" style="margin:0 auto;">
            <li class="clearfix">
                <div class="fl w100">登陆邮箱：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">公司名称：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">公司介绍：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['profile'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人姓名：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['contact'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人座机：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['telephone'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人邮箱：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人QQ：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['qq'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人手机：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
</div>
            </li>
            <li class="clearfix">
                <div class="fl w100">联系人职位：</div>
                <div class="fl w100"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['position'];?>
</div>
            </li>
        </ul>
        <div class="btn btn-info" style="margin: 20px auto;display: block;width: 20%;">
            <a href="/index.php/api/user/edit" style="color: #fff; text-decoration: none">编辑我的资料</a>
        </div>
    </div>

</div>

</body>
</html><?php }} ?>
