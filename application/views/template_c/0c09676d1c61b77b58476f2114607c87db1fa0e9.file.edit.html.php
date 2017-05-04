<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 17:39:17
         compiled from "application/views/api/user/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:65197800258d8ddc527a045-14210560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c09676d1c61b77b58476f2114607c87db1fa0e9' => 
    array (
      0 => 'application/views/api/user/edit.html',
      1 => 1489651754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65197800258d8ddc527a045-14210560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8ddc52b2b92_44165694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8ddc52b2b92_44165694')) {function content_58d8ddc52b2b92_44165694($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main_zh add_admin clearfix ">
    <ul class=" nav-stacked col-md-2 userNav" id="myTab">
        <li class="act"><a href="/index.php/api/user/userinfo">个人信息</a></li>
        <li><a href="/index.php/api/cases/casesubmit">案例提交</a></li>
        <li><a href="/index.php/api/user/mycase">作品查询</a></li>
    </ul>
    <div class="tab-content col-xs-10 ">
        <!--<form name="formUserEdit" method="post" action="/index.php/api/user/update" onsubmit="return check();">-->
        <form name="formUserEdit" method="post" action="/index.php/api/user/update" class="main_bi w400"
              style="margin: 0 auto;">
            <input type="hidden" name="uid" id="uid" value="<?php echo get_cookie('uid');?>
"/>
            <div class="regdiv">
                <div class="divinput input-group">
                    <span class="input-group-addon"><em class="holderBlock"></em>登录邮箱：</span>
                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
" disabled="true" class="form-control">
                </div>
            </div>
            <div class="changePwd">
                <input type="button" class="btn btn-info" value="修改密码" id="changePwdBtn" style="margin-top: 10px;">
                <div class="changePwdCon" id="changePwdCon">
                    <div class="regdiv">
                        <div class="input-group mt15">
                            <span class="input-group-addon"><em class="holderBlock"></em>旧&nbsp;密&nbsp;码：</span>
                            <input type="password" name="oldpassword" id="oldpassword" class="form-control">

                        </div>
                    </div>
                    <div class="regdiv">
                        <div class="input-group mt15">
                            <span class="input-group-addon"><em class="holderBlock"></em>新&nbsp;密&nbsp;码：</span>
                            <input type="password" name="password" id="password" class="form-control">

                        </div>
                    </div>
                    <div class="regdiv">
                        <div class="input-group mt15">
                            <span class="input-group-addon"><em class="holderBlock"></em>确认新密码：</span>
                            <input type="password" name="passwordsure" id="passwordsure" class="form-control">

                        </div>
                    </div>
                </div>
            </div>

            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="red"> * </em>公司名称：</span>
                    <input type="text" name="company" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
" id="pin" class="form-control">
                    <!--<span id="pinPrompt" class="error"></span>-->
                </div>
            </div>
            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="red"> * </em>联系人姓名：</span>
                    <input type="text" name="contact" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['contact'];?>
" id="pin1" class="form-control">
                    <!--<span id="pinPrompt1" class="error"></span></div>-->
                </div>
            </div>
            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="red"> * </em>联系邮箱：</span>
                    <input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
" id="email" class="form-control">
                    <span id="emailPrompt" class="error"></span>
                </div>
            </div>
            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="red"> * </em>联系人手机：</span>
                    <input type="text" name="mobile" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
" id="mobile" class="form-control">
                    <!-- <span id="mobilePrompt" class="uerror"></span>-->
                </div>
            </div>
            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="holderBlock"></em>公司介绍：</span>
                    <input type="text" name="profile" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['profile'];?>
" id="profile" class="form-control">
                    <!--<span id="profilePrompt" class="uerror"></span>-->
                </div>
            </div>

            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="holderBlock"></em>联系人座机：</span>
                    <input type="text" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['telephone'];?>
" id="pin2" class="form-control">
                    <!--<span id="pinPrompt2" class="error"></span>-->
                </div>
            </div>

            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="holderBlock"></em>联系人QQ：</span>
                    <input type="text" name="qq" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['qq'];?>
" id="qq" class="form-control">
                    <!--<span id="qqPrompt" class="uerror"></span>-->
                </div>
            </div>

            <div class="regdiv">
                <div class="input-group mt15">
                    <span class="input-group-addon"><em class="holderBlock"></em>联系人职位：</span>
                    <input type="text" name="position" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['position'];?>
" id="position"
                           class="form-control">
                    <!--<span id="positionPrompt" class="uerror"></span>-->
                </div>
            </div>
            <div class="clearfix" style="margin-left:100px;">
                <p class="submitp fl mt15"><input type="submit" value="确定" class="tc register f20"></p>
                <p class="submitp fl mt15"><input type="reset" value="重置" class="tc register1 f20"></p>
            </div>

        </form>
    </div>

    <style>
        .n-default .n-left, .n-default .n-right {
            margin-top: 10px;
            position: relative;
        }
        #changePwdCon {
            display: none;
        }
    </style>
    <script>
        $(function () {
            var reset = $("input[type='reset']");
            $('#changePwdBtn').on('click',function(){
               $('#changePwdCon').toggle();
            });
        });
    </script>
    <script src="/static/api/new/js/script.js">

    </script>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/footer_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
