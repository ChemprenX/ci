<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 17:39:55
         compiled from "application/views/api/result.html" */ ?>
<?php /*%%SmartyHeaderCode:40886153658d8ddeba8da91-26588030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dba821debac4e3667f09796bf4e3099c51b27341' => 
    array (
      0 => 'application/views/api/result.html',
      1 => 1489643074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40886153658d8ddeba8da91-26588030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8ddebac1cf6_22212099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8ddebac1cf6_22212099')) {function content_58d8ddebac1cf6_22212099($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--<div class="m">
        <div class="tc w" style="font-size: 18px; text-align: center; color: #FF0000; margin-top: 40px;"></div>
</div>-->
<div class="main_zh add_admin caseSuccess clearfix">
    <div class="leg" style="margin:0 auto;">
        <div class="fYaHei black tc" style="font-size:32px;" ><?php echo $_smarty_tpl->tpl_vars['result']->value;?>
</div>
        <div class="white fYaHei f20 tc box_a" style="margin:85px auto 25px; ">
            <a href="/index.php/api/user/mycase">查看我的作品</a>
        </div>
        <div class="white fYaHei f20 tc box_a" style="margin:25px auto 25px; ">
            <a href="/index.php/api/cases/casesubmit">继续提交作品</a>
        </div>
    </div>
</div>
<?php }} ?>
