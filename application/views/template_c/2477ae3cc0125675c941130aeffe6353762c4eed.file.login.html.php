<?php /* Smarty version Smarty-3.1.18, created on 2017-04-14 14:50:25
         compiled from "application\views\manager\user\login.html" */ ?>
<?php /*%%SmartyHeaderCode:3104858f071310891b3-53255361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2477ae3cc0125675c941130aeffe6353762c4eed' => 
    array (
      0 => 'application\\views\\manager\\user\\login.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3104858f071310891b3-53255361',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f071310c4e62_21033249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f071310c4e62_21033249')) {function content_58f071310c4e62_21033249($_smarty_tpl) {?>


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
