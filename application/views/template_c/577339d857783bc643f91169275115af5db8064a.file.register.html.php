<?php /* Smarty version Smarty-3.1.18, created on 2017-04-18 14:09:34
         compiled from "application\views\api\user\register.html" */ ?>
<?php /*%%SmartyHeaderCode:886458f5ad9eb9baa5-91651332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '577339d857783bc643f91169275115af5db8064a' => 
    array (
      0 => 'application\\views\\api\\user\\register.html',
      1 => 1488250928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '886458f5ad9eb9baa5-91651332',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f5ad9ee4bab3_81001357',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f5ad9ee4bab3_81001357')) {function content_58f5ad9ee4bab3_81001357($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body class="login">
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


    <div class="loginHr">

    </div>
    <div class="loginPage">
        <div class="loginWrap">
            <form name="formReg" method="post" action="/index.php/api/user/registeract" onsubmit="return check();">
                <img src="/static/api/new/images/regstar_03.png">
                <div class="input-wrap">
                    <input class="login-index-text" placeholder="请输入邮箱" value=""  name="email" id="email" >
                    <p id="emailPrompt"></p>
                    <input class="login-index-text" placeholder="请输入密码" type="password"  name="password" id="password">
                    <p id="passwrodPrompt"></p>
                    <input class="login-index-text" placeholder="再次请输入密码" type="password"  name="password" id="passwordsure">
                    <p id="surepasswrod"></p>
                </div>
                <div class="forget">
                    <input type="checkbox" class="mr5" name="save" id="save"/>记住我的登录信息
                    <a href="/index.php/api/user/findpwd" class="ml66">忘记密码?</a>
                </div>
                <input type="submit" value="注册" class="submitBtn">

                <p class="no-member">
                    已经有账号？<a href="/index.php/api/user/login">请登录</a>
                </p>

            </form>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("../common/footer_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <script type="text/javascript">
        function check(){ 
        var flag = false;
          //验证邮箱   
        var emailName = document.getElementById("email"); 
        var emailPrompt = document.getElementById("emailPrompt"); 
        
        var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;   
        if(emailName.value==0){ 
          // alert("请输入您的邮箱！"); 
           emailPrompt.innerHTML="请输入您的邮箱！"
           emailName.focus(); 
           return false; 
        } 
        if (!pattern.test(emailName.value)) {   
           //alert("邮箱格式不正确，请重新输入!"); 
           emailPrompt.innerHTML="邮箱格式不正确，请重新输入!"
           emailName.value=""; 
           emailName.focus(); 
           return false;   
          }
        var email = $("#email").val();
        $.ajax({
            url:"/index.php/api/user/checkemail",
            dataType: 'json',
            async:false,
            data:{email:email},
            success:function(data){
              if(data){
                  emailPrompt.innerHTML="该邮箱已注册！"
                  emailName.focus(); 
                  return false;
                  //flag = false;
              }else{
                  flag = true;
              }
          }
        });  
        //验证密码，确认密码 
           var pass = document.getElementById("password"); 
           var passwordsure = document.getElementById("passwordsure"); 
           var passwrodPrompt = document.getElementById("passwrodPrompt"); 
           var surepasswrod = document.getElementById("surepasswrod"); 
           if(pass.value.length==0){ 
              //alert("密码不能为空！"); 
              passwrodPrompt.innerHTML="密码不能为空！"
              pass.focus(); 
              return false; 
            } 
            if(pass.value.length<6||pass.value.length>15){ 
                // alert("密码的长度为6-15位！"); 
                 passwrodPrompt.innerHTML="密码的长度为6-15位！"
                 pass.value = ""; 
                 pass.focus(); 
                 return false; 
            }else if(pass.value!=passwordsure.value){ 
             //alert("两次密码输入不一致！"); 
             surepasswrod.innerHTML="两次密码输入不一致！"
             passwordsure.value = ""; 
             passwordsure.focus(); 
              return false; 
            } 
            //return false;
            
            //验证
            /* var code = document.getElementById("code");
            var codePrompt = document.getElementById("codePrompt");
            if(code.value.length==0){
                codePrompt.innerHTML="验证不能为空！"
                code.value = "";
                code.focus();
                return false; 
            } */
            return true;
            //return flag;
        }
        
    </script>
</body>
</html><?php }} ?>
