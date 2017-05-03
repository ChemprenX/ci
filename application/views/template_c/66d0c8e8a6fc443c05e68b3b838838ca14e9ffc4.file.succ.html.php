<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 14:40:35
         compiled from "application/views/api/succ.html" */ ?>
<?php /*%%SmartyHeaderCode:155921914658db56e3c80a19-26446228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66d0c8e8a6fc443c05e68b3b838838ca14e9ffc4' => 
    array (
      0 => 'application/views/api/succ.html',
      1 => 1488700842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155921914658db56e3c80a19-26446228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db56e3cb5419_72703261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db56e3cb5419_72703261')) {function content_58db56e3cb5419_72703261($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("./common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main_zh add_admin caseSuccess clearfix">
    <div class="leg" style="margin:0 auto;">
        <div class="fYaHei black tc" style="font-size:32px;" >您已成功提交案例</div>
        <div class="white fYaHei f20 tc box_a" style="margin:85px auto 25px; ">
            <a href="/index.php/api/user/mycase">查看我的作品</a>
        </div>
        <div class="white fYaHei f20 tc box_a" style="margin:25px auto 25px; ">
            <a href="/index.php/api/cases/casesubmit">继续提交作品</a>
        </div>
    </div>
</div>

<?php }} ?>
