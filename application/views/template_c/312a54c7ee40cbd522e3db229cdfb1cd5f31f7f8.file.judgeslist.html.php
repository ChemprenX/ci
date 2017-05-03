<?php /* Smarty version Smarty-3.1.18, created on 2017-04-20 17:07:06
         compiled from "application\views\manager\judges\judgeslist.html" */ ?>
<?php /*%%SmartyHeaderCode:1696758f87a3a7b10b2-34063014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312a54c7ee40cbd522e3db229cdfb1cd5f31f7f8' => 
    array (
      0 => 'application\\views\\manager\\judges\\judgeslist.html',
      1 => 1490342038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1696758f87a3a7b10b2-34063014',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'judgess' => 0,
    'judges' => 0,
    'group' => 0,
    'user' => 0,
    'sumpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f87a3a8b0562_94255796',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f87a3a8b0562_94255796')) {function content_58f87a3a8b0562_94255796($_smarty_tpl) {?><script src="/static/manager/js/base.js" type="text/javascript"></script>
<script type="text/javascript">
function mdel(uid){
    $("#deluid").val(uid);
    $(".black").show();
    $('.delpv').show();
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="main clearfix  fYaHei">
    <div class="case_man">
        <div class="main_tl main_jiaoy mb20">
            <form name="formSearch" id="formSearch" method="get" action="/index.php/manager/judges/judgeslist">
                <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                <div class="clearfix">
                <span class="fl mr10 fenl">
                </span>
                    <div class="clearfix fl">
                        <div class="fl f14 mr10 graydeep"><input placeholder="想要找..." value="" id="title" name="title" class="ml5 cz pl10 w200"></div>
                        <div class="fl"><input type="submit" value="查询" class="aka fl mr5 cx white"></div>
                    </div>
                    <div class="fr">
                        <a href="/index.php/manager/judges/addjudges"><input type="button" value="新增" class="aka fl mr5 cx white"></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="main_td mt15 fYaHei mb20">
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tbody>
                <tr align="center" class="lbg">
                    <td width="50" height="50">序号</td>
                    <td>评委姓名</td>
                    <td>登录名</td>
                    <td>所属公司</td>
                    <td>评审类别</td>
                    <td width="100">已评案例数</td>
                    <td width="120">历史评案例数</td>
                    <td>操作</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['judges'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['judges']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['judgess']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['judges']->key => $_smarty_tpl->tpl_vars['judges']->value) {
$_smarty_tpl->tpl_vars['judges']->_loop = true;
?>
                <tr align="center" height="50">
                    <td><?php echo $_smarty_tpl->tpl_vars['judges']->value['user_id'];?>
</td>
                    <td>
                    <?php if ($_smarty_tpl->tpl_vars['judges']->value['jianshen']==1) {?>
                    <span class="tag">监</span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['judges']->value['pingshenzhuxi']==1) {?>
                    <span class="tag">主</span>
                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['judges']->value['realname'];?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['judges']->value['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['judges']->value['company'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['group']->value[$_smarty_tpl->tpl_vars['judges']->value['group']];?>
</td>
                    <td>
                    <?php if ($_smarty_tpl->tpl_vars['judges']->value['count2017']>0) {?>
                    <a href="/index.php/manager/judges/scoredlist?uid=<?php echo $_smarty_tpl->tpl_vars['judges']->value['user_id'];?>
&type=1"><?php echo $_smarty_tpl->tpl_vars['judges']->value['count2017'];?>
</a>
                    <?php } else { ?>
                    0
                    <?php }?>
                    </td>
                    <td>
                    <?php if ($_smarty_tpl->tpl_vars['judges']->value['count']>0) {?>
                    <a href="/index.php/manager/judges/scoredlist?uid=<?php echo $_smarty_tpl->tpl_vars['judges']->value['user_id'];?>
&type=2"><?php echo $_smarty_tpl->tpl_vars['judges']->value['count'];?>
</a>
                    <?php } else { ?>
                    0
                    <?php }?>
                    </td>
                    <td>
                    <span><a href="/index.php/manager/judges/setjudges?uid=<?php echo $_smarty_tpl->tpl_vars['judges']->value['user_id'];?>
&type=2">设置</a></span>&nbsp;|&nbsp;<span><a class="" onclick="mdel(<?php echo $_smarty_tpl->tpl_vars['judges']->value['user_id'];?>
)">删除</a></span>
                    </td>
                    <!-- <td class="graydeep"><a href="/index.php/manager/cases/caselist?uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['count'];?>
</a></td> -->
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="page clearfix">
            <div class="fr">
                <div class="fr">
                    <div class="fl go " onclick="indexpage()">首页</div>
                    <div class="fl go " onclick="uppage()">上一页</div>
                    <div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                    <div class="fl go " onclick="downpage()">下一页</div>
                    <div class="fl go " onclick="lastpage()" style=" border-right:1px solid #eeeeee;">尾页</div>
                </div>
            </div>
            <!--弹出修改 删除 none 可显示隐藏div-->
        </div>
    </div>
    <div class="black">
        <div class="black-inner">
            <p class="success"><span class="zf delpv">是否删除该评委</span></p><span class="x">X</span>
            <input type="button" class="click" id="quddel" value="确定"></p>
        </div>
    </div>
    <form name="delf" id="delf" method="post" action="/index.php/manager/judges/deletejudges">
          <input type="hidden" name="deluid" id="deluid" value="">
    </form>
    <script type="text/javascript">
        function uppage() {
            var page = $("#page").val();
            var newpage = parseInt(page) - 1;
            if (newpage < 1) {
                alert("前面没有了！");
            } else {
                $("#page").val(newpage);
                $("#formSearch").submit();
            }
        }
        function downpage() {
            var page = $("#page").val();
            if (page >= <?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
) {
                alert("后面没有了！");
            } else {
                var newpage = parseInt(page) + 1;
                $("#page").val(newpage);
                $("#formSearch").submit();
            }
        }
        
        function indexpage() {
            $("#page").val(1);
            $("#formSearch").submit();
        }
        function lastpage() {
            $("#page").val(<?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
);
            $("#formSearch").submit();
        }
        
    </script>
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
            
            $("#quddel").click(function() {
                $("#delf").submit();
             });
             
         });
    </script>
</div>
<?php }} ?>
