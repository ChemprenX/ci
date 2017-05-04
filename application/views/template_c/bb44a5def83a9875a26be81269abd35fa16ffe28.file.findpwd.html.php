<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 10:19:47
         compiled from "application/views/api/user/findpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:180643240258db19c336ff77-81782104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb44a5def83a9875a26be81269abd35fa16ffe28' => 
    array (
      0 => 'application/views/api/user/findpwd.html',
      1 => 1489473478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180643240258db19c336ff77-81782104',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db19c33a4051_20280934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db19c33a4051_20280934')) {function content_58db19c33a4051_20280934($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style type="text/css" rel="stylesheet">

</style>
<div class="m">
        <div class="regist mb50">
                <form name="formReg" method="post" action="/index.php/api/user/findpwdact" onsubmit="return check();" style="margin-top: 150px; margin-bottom: 150px;">
                    <div class=" mb20 f20" style="color:#0565a6;">找回密码</div>
                    <div class="regdiv">
                       <!-- <div class="divinput"><span class="spanreg">邮箱：</span><input type="text" name="email" id="email" class="text"><span id="emailPrompt" class="error"></span></div>-->
                        <div class="input-group col-md-6">
                            <span class="input-group-addon">邮箱：</span>
                            <input type="text" name="email" id="email" class="form-control">
                            <span id="emailPrompt" class="error"></span>
                        </div>
                   </div>
                   <div class=" mb20 f14" style="color:#909090; line-height:24px;">请输入您注册的电子邮箱。您会收到一封包含<br />创建新密码的电子邮件。</div>
                    <p class="submitp"><input type="submit" value="获取新密码"  class="register btn btn-info"></p>
                </form>  
        </div>
        <!--<div class="weixin center">
            偷偷告诉你 <a href="https://wx.qq.com/" target="_blank"><img src="images/wx_59-58.jpg" /></a> 可以直接登录
        </div>-->
</div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/footer_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script type="text/javascript">
        function check(){ 
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
        
        }
</script><?php }} ?>
