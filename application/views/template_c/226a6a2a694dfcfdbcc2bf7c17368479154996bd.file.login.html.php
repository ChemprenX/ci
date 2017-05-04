<?php /* Smarty version Smarty-3.1.18, created on 2017-04-14 14:47:45
         compiled from "application\views\api\user\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1975858f070917d6933-79100582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '226a6a2a694dfcfdbcc2bf7c17368479154996bd' => 
    array (
      0 => 'application\\views\\api\\user\\login.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1975858f070917d6933-79100582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f070919ab9f8_70258359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f070919ab9f8_70258359')) {function content_58f070919ab9f8_70258359($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body class="login">
    <?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <!--login 2016 0710-->
    <div class="loginHr">

    </div>
    <div class="loginPage">
        <div class="loginWrap">
            <form name="formLogin" method="post" action="/index.php/api/user/loginact">
                <input type="hidden" name="type" id="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"/>
                <img src="/static/api/new/images/logostar_03.png">
                <div class="input-wrap">
                    <input class="login-index-text" placeholder="请输入邮箱" value=""  id="username"  name="username">
                    <p id="loginErrMsg"></p>
                    <input class="login-index-text" placeholder="请输入密码" type="password"  id="password"  value=""   name="password">
                    <p id="passwordMsg"></p>
                </div>
                <div class="forget">
                    <input type="checkbox" class="mr5" name="save" id="save"/>记住我的登录信息
                    <a href="/index.php/api/user/findpwd" class="ml66">忘记密码?</a>
                </div>
                <input type="submit" value="登录" class="submitBtn">
                <!-- <input class="submitBtn" type="submit" value="登&nbsp;陆">-->
                <p class="no-member">
                    还没有账号？<a href="/index.php/api/user/register">申请注册</a>
                </p>

            </form>
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("../common/footer_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script type="text/javascript">
    $(function(){
           $("[name=formLogin]").submit(function(){
                if($("[name=username]").val()== ""){
                     $("#loginErrMsg").text("请输入用户名/邮箱");
                     $("[name=username]").focus();
                    return false;
                }
                if(document.formLogin.password.value==""){
                    $("#passwordMsg").text("请输入密码");
                    $("[name=password]").focus();
                    return false;
                }
                if($("[name=verify]").val()== ""){
                     $("#imgmsg").text("请输入验证码");
                     $("[name=verify]").focus();
                    return false;
                }
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
            $("[name=verify]").blur(function(){
                if($("[name=verify]").val()!= ""){
                $("#imgmsg").text("");
                }
            });
            $("#save").click(function(){
            	setCookie();
            });
            getCookie();
    });
    function setCookie(){ //设置cookie  
        var loginCode = $("#username").val(); //获取用户名信息  
        var pwd = $("#password").val(); //获取登陆密码信息  
        var checked = $("[name='save']:checked");//获取“是否记住密码”复选框  
        if(checked && checked.length > 0){ //判断是否选中了“记住密码”复选框  
           $.cookie("login_code",loginCode);//调用jquery.cookie.js中的方法设置cookie中的用户名  
           $.cookie("pwd",$.base64.encode(pwd));//调用jquery.cookie.js中的方法设置cookie中的登陆密码，并使用base64（jquery.base64.js）进行加密  
        }else{   
           $.cookie("pwd", null);   
        }    
   }   
   function getCookie(){ //获取cookie  
        var loginCode = $.cookie("login_code"); //获取cookie中的用户名  
        var pwd =  $.cookie("pwd"); //获取cookie中的登陆密码  
        if(pwd){//密码存在的话把“记住用户名和密码”复选框勾选住  
           $("[name='save']").attr("checked","true");  
        }  
        if(loginCode){//用户名存在的话把用户名填充到用户名文本框  
           $("#username").val(loginCode);  
        }  
        if(pwd){//密码存在的话把密码填充到密码文本框  
           $("#password").val($.base64.decode(pwd));  
        }  
   }  
</script>

</body>
</html>
<?php }} ?>
