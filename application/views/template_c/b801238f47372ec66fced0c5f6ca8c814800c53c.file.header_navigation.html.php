<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 14:17:56
         compiled from "/home/75/jinwangjiang/application/views/manager/common/header_navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:149972721958d8ae94ddaa32-28202743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b801238f47372ec66fced0c5f6ca8c814800c53c' => 
    array (
      0 => '/home/75/jinwangjiang/application/views/manager/common/header_navigation.html',
      1 => 1489729682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149972721958d8ae94ddaa32-28202743',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8ae94de7764_04523870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8ae94de7764_04523870')) {function content_58d8ae94de7764_04523870($_smarty_tpl) {?><!-- <style>
*{margin:0;padding:0;}
a{text-decoration:none;color:#666;}




li{list-style:none;}
body{font-family:Verdana,SimSun;font-size:12px;color:#666;text-align:center;background:#EEE;}
#box{width:760px;margin:100px auto 0 auto;text-align:center;background:#A33236;}
#nav{width:720px;height:30px;margin:0 auto;line-height:30px;}
#nav a{display:block;width:90px;height:30px;text-align:center;color:#FFF;}
#nav li ul{display:none;position:absolute;margin-left:-20px;}
#nav li ul li{clear:both;}
#nav li ul a{width:130px;border-top:1px solid #FFF;text-align:center;background:#A33236;-webkit-transition:all 0.5s ease;-moz-transition:all 0.5s ease;transition:all 0.5s ease;}
#nav li ul li a:hover{background:#FFF;color:#A33236;}


#nav li{float:left;}


.logo{
background-color:#6699FF;
width:100px; 
height:37px;
float:left;
margin-top:0px;
}
.ulmin{
	background: none repeat scroll 0 0 #ddd;
    left: 200px;
    margin-left: -200px;
    overflow: auto;
    position: relative;
    width: 200px;
}
ul.ulmin li{
	margin-left: 0;
    padding: 0 15px !important;
}
</style> -->
<script>
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
</script>
<div class="header fYaHei">
    <div class="header_nav clearfix">
        <div class="fl"><img src="/static/manager/images/logo_02.png" width="114" height="165"></div>
        <div class="lib fl white">
            <ul class="clearfix">
                <li><a href="/index.php/manager/user/index">首页</a></li>
                <!-- <li class="center"><a href="/index.php/manager/cases/caselist">案例管理</a></li> -->
                <li><a href="/index.php/manager/cases/caselist2017_old">案例管理</a>
                </li>
                <!--<li onmouseover="display(this)" onmouseout="hide(this)">-->
				<!--<a href="javascript:;">案例管理</a>-->
					<!--<ul class="ulmin">-->
					<!--<li><a href="/index.php/manager/cases/caselist2017_old">今年案例</a></li>-->
                    <!--&lt;!&ndash;<li><a href="/index.php/manager/cases/caselist">今年lao案例</a></li>&ndash;&gt;-->
					<!--&lt;!&ndash;<li><a href="/index.php/manager/cases/oldcaselist">往年案例</a></li>&ndash;&gt;-->
					<!--</ul>-->
				<!--</li>-->
                <li><a href="/index.php/manager/user/userAdmin">用户(案例)</a></li>
                <li><a href="/index.php/manager/judges/judgeslist">委员管理</a></li>
                <!--<li><a href="#">日志</a></li>
                <?php if (get_cookie('type')==1) {?>
                <li><a href="/index.php/manager/user/adminlist">管理员管理</a></li>
                <?php }?>
                <li><a href="#">直播</a></li>
                <!--<li><a href="/index.php/manager/user/userlist">用户</a></li>
                <li><a href="/index.php/manager/record/recordlist">评分记录</a></li>-->
            </ul>
        </div>
        <div class="fr lic">
            <div class="fl wel">欢迎您，<?php echo get_cookie('admin_username');?>
</div>
            <div class="fl wel_tc white"><a href="/index.php/manager/user/logout">退出</a></div>
        </div>
    </div>
</div><?php }} ?>
