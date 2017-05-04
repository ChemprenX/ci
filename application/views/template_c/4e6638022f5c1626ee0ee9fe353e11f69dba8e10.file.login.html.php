<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 14:45:48
         compiled from "application/views/manager/user/login.html" */ ?>
<?php /*%%SmartyHeaderCode:136875513858d8b51c6f4a59-36832842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e6638022f5c1626ee0ee9fe353e11f69dba8e10' => 
    array (
      0 => 'application/views/manager/user/login.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136875513858d8b51c6f4a59-36832842',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8b51c71e811_55785410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8b51c71e811_55785410')) {function content_58d8b51c71e811_55785410($_smarty_tpl) {?>


<div class="main_login fYaHei">
    <div><img src="/static/manager/images/tit_03.jpg" width="340" height="282"></div>
    <div class="main_login_a">
         <form name="formLogin" method="post" action="/index.php/manager/user/loginact"> 
            <div class="regdiv mb20 ">
                <div class="divinput"><span class="spanreg">用户名</span><input  type="text" value="" id="username" name="username" class="text"> <span id="loginErrMsg"></span></div>
           </div>
            <div class="regdiv  mb30">
                <div class="divinput "><span class="spanreg">密&nbsp;&nbsp;&nbsp;码</span><input type="password" id="password" value="" class="text" name="password"><span id="passwordMsg"></span></div>
          </div>
            <p class="submitp mb10 "><input type="submit" value="登陆" class="register f20"></p>
        </form>  
    </div>
</div>
<script type="text/javascript">
    $(function(){
           $("[name=formLogin]").submit(function(){
                if($("[name=username]").val()== ""){
                     $("#loginErrMsg").text("请输入用户名");
                     $("[name=username]").focus();
                    return false;
                }
                if(document.formLogin.password.value==""){
                    $("#passwordMsg").text("请输入密码");
                    $("[name=password]").focus();
                    return false;
                }
                /* if($("[name=verify]").val()== ""){
                     $("#imgmsg").text("请输入验证码");
                     $("[name=verify]").focus();
                    return false;
                } */
            });
            $("[name=username]").blur(function(){
                if($("[name=username]").val()!= ""){
                $("#loginErrMsg").text("");
                }
            });
            $("[name=password]").blur(function(){
                if($("[name=password]").val()!= ""){
                $("#passwordMsg").text("");
                }
            });
            /* $("[name=verify]").blur(function(){
                if($("[name=verify]").val()!= ""){
                $("#imgmsg").text("");
                }
            }); */
    });
</script>

<?php }} ?>
