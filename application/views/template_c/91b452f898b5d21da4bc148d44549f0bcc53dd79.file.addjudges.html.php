<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 10:13:39
         compiled from "application/views/manager/judges/addjudges.html" */ ?>
<?php /*%%SmartyHeaderCode:153641452358db1853a2b6a9-93840222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91b452f898b5d21da4bc148d44549f0bcc53dd79' => 
    array (
      0 => 'application/views/manager/judges/addjudges.html',
      1 => 1490428340,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153641452358db1853a2b6a9-93840222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'judgesinfo' => 0,
    'grouplist' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db1853a81724_54927640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db1853a81724_54927640')) {function content_58db1853a81724_54927640($_smarty_tpl) {?>
<html>
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>金网奖-新增评委</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="/static/manager/css/base.css" rel="stylesheet">
    <link href="/static/manager/css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/manager/css/jquery.bigautocomplete.css" type="text/css" />
    <script src="/static/manager/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/static/manager/js/base.js" type="text/javascript"></script>
</head>
<body class="setjudges">
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main clearfix  fYaHei">
    <div class="case_man">
        <form name="formSearch" id="formSearch" method="post" action="/index.php/manager/judges/addjudgesact">
            <div class="tab-content col-md-12">
                <strong>评委信息：</strong>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>评委姓名：</span>
                                <input type="text" class="form-control" name="realname">
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>所属公司：</span>
                                <input type="text" class="form-control" name="company">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>联系手机：</span>
                                <input type="text" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>公司介绍：</span>
                                <input type="text" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-content col-md-12">
                <strong>账号信息：</strong>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>登录账号：</span>
                                <input type="text" class="form-control" name="username">
                            </div>
                        </td>
                        <!--<td>-->
                            <!--<div class="input-group">-->
                                <!--<span class="input-group-addon"><em class="holderBlock"></em>登录密码：</span>-->
                                <!--<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['password'];?>
" disabled="true" class="form-control">-->
                            <!--</div>-->
                        <!--</td>-->
                        <td class="click_pwd"><input class="aka" type="button" value="生成" id="addpwd"></td>
                        <td class="show_pwd"><span name="show_pwd" id="show_pwd"></span>
                        <input type="hidden" value="" id="password" name="password">
                    </tr>
                </table>
            </div>
            <!--<div class="setjudges_table main_td mt15 fYaHei mb20">-->
                <!--<strong>评委信息：</strong>-->
                <!--<table width="400px"  cellspacing="0" cellpadding="0">-->
                    <!--<tbody>-->
                    <!--<tr>-->
                        <!--<td class="intname"><span class="red">*</span>评委名称：</td>-->
                        <!--<td class="intinput"><input type="text" name="realname"></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                        <!--<td class="intname"><span class="red">*</span>所属公司：</td>-->
                        <!--<td class="intinput"><input type="text" name="company" id="tt" autocomplete="off"></td>-->
                    <!--</tr>-->
                    <!--</tbody>-->
                <!--</table>-->
                <!--<strong>账号信息：</strong>-->
                <!--<table width="400px" cellspacing="0" cellpadding="0">-->
                    <!--<tbody>-->
                    <!--<tr>-->
                        <!--<td class="intname"><span class="red">*</span>登录名：</td>-->
                        <!--<td class="intinput" colspan="2"><input type="text" name="username"></td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                        <!--<td class="intname"><span class="red">*</span>生成密码：</td>-->
                        <!--<td class="click_pwd"><input class="aka" type="button" value="生成" id="addpwd"></td>-->
                        <!--<td class="show_pwd"><span name="show_pwd" id="show_pwd"></span>-->
                        <!--<input type="hidden" value="" id="password" name="password">-->
                        <!--</td>-->
                    <!--</tr>-->
                    <!--</tbody>-->
                <!--</table>-->
                <strong>评分权限：</strong>
                <ul class="clearfix pfCompetence" style="width:900px">
                <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grouplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
                <li class="fl" style="width:180px"><input id="fz<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
" type="radio" name="group" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
"/><label for="fz<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value['group_title'];?>
</label></li>
                <?php } ?>
                </ul>
            </div>
            <div class="btn clearfix">
                <div class="fl"><input class="submit aka dela "  name="" value="保存" readonly="readonly"></div>
                <div class="fl"><input class="button aka " name="" value="取消" readonly="readonly"></div>

            </div>
        </form>
    </div>

</div>
<div class="black">
    <div class="black-inner">
        <p class="success"><span class="zf baocun">是否新增评委</span></p><span class="x">X</span>
        <input type="button" class="click" id="qud" value="确定"></p>
    </div>
</div>
<script src="/static/manager/js/jquery.bigautocomplete.js" type="text/javascript"></script>
<script src="/static/manager/js/addpwd.js" type="text/javascript"></script>
<script src="/static/manager/js/judges.js" type="text/javascript"></script>
<script type="text/javascript">
    /*-----显示子菜单-----*/
    function display(li) {
        var subNav = li.getElementsByTagName("ul")[0];
        subNav.style.display = "block";
    }
    /*-----隐藏子菜单-----*/
    function hide(li) {
        var subNav = li.getElementsByTagName("ul")[0];
        subNav.style.display = "none";
    }
    $(function() {
        
        $("#qud").click(function() {
        	$("#formSearch").submit();
         });
         
     });
</script>
</body>

</html><?php }} ?>
