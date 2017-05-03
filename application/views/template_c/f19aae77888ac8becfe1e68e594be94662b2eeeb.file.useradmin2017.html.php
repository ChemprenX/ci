<?php /* Smarty version Smarty-3.1.18, created on 2017-04-06 09:57:43
         compiled from "application/views/manager/user/useradmin2017.html" */ ?>
<?php /*%%SmartyHeaderCode:34481586658d8b6badde917-48652429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f19aae77888ac8becfe1e68e594be94662b2eeeb' => 
    array (
      0 => 'application/views/manager/user/useradmin2017.html',
      1 => 1490758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34481586658d8b6badde917-48652429',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8b6baec8346_50004549',
  'variables' => 
  array (
    'sumpage' => 0,
    'page' => 0,
    'search' => 0,
    'allUser' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8b6baec8346_50004549')) {function content_58d8b6baec8346_50004549($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><script type="text/javascript">
    $(function(){
        $("#checkAll").click(function () {
            $('input[name="subBox"]').prop("checked", this.checked);
        });
        var $subBox = $("input[name='subBox']");
        $subBox.click(function () {
            $("#checkAll").prop("checked", $subBox.length == $("input[name='subBox']:checked").length ? true : false);
        });
        /*首页*/
        $('#indexpage_user').on('click', function (e){
            $("#page_user").val(1);
            $("#userSearch").submit();
        });
        /*上一頁*/
        $('#uppage_user').on('click', function (e){
            var page = $("#page_user").val();
            var newpage = parseInt(page)-1;
            if(newpage<1){
                alert("前面没有了！");
            }else{
                $("#page_user").val(newpage);
                $("#userSearch").submit();
            }
        });
        /*下一页*/
        $('#downpage_user').on('click', function (e){
            var page = $("#page_user").val();
            if(page >= <?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
){
                alert("后面没有了！");
            }else{
                var newpage = parseInt(page)+1;
                $("#page_user").val(newpage);
                $("#userSearch").submit();
            }
        });
        /*尾页*/
        $('#lastpage_user').on('click', function (e){
            $("#page_user").val(<?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
);
            $("#userSearch").submit();
        });
        //第一页
        $('#first_user').on('click', function (e){
            $("#page_user").val(1);
            $("#userSearch").submit();
        });
        //第二页
        $('#second_user').on('click', function (e){
            $("#page_user").val(2);
            $("#userSearch").submit();
        });
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container" id="caseListPage">
    <div class="search">
        <form name="userSearch" id="userSearch" method="get" action="/index.php/manager/user/userAdmin">
            <input type="hidden" name="page" id="page_user" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
            <div class="up form-group">
                <strong class="">选择年份：</strong>
                <select class="selectpicker" data-width="100" id="chooseY" name="chooseY">
                    <option value="2017" <?php if ($_smarty_tpl->tpl_vars['search']->value['chooseY']==2017) {?> selected="selected"<?php }?>>第九届</option>
                    <option value="2016" <?php if ($_smarty_tpl->tpl_vars['search']->value['chooseY']==2016) {?> selected="selected"<?php }?>>第八届</option>
                    <option value="2015" <?php if ($_smarty_tpl->tpl_vars['search']->value['chooseY']==2015) {?> selected="selected"<?php }?>>第七届</option>
                </select>
                <strong class="">排序方式：</strong>
                <select class="selectpicker" data-width="100" id="sort" name="sort">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==0) {?> selected="selected"<?php }?>>待选择</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==1) {?> selected="selected"<?php }?>>案例数由高到低</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==2) {?> selected="selected"<?php }?>>案例数由低到高</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==3) {?> selected="selected"<?php }?>>注册时间由早到晚</option>
                    <option value="4" <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==4) {?> selected="selected"<?php }?>>注册时间由晚到早</option>
                </select>
                <strong class="">付款状态：</strong>
                <select class="selectpicker" data-width="100" id="payStatus" name="payStatus">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['search']->value['payStatus']==0) {?> selected="selected"<?php }?>>全部状态</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['payStatus']==1) {?> selected="selected"<?php }?>>未支付</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['payStatus']==2) {?> selected="selected"<?php }?>>已全额支付</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['payStatus']==3) {?> selected="selected"<?php }?>>未支付全额</option>
                </select>
            </div>
            <hr>
            <div class="bottom-input">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">搜索</span>
                        <input type="text" class="form-control" placeholder="上报公司 报名人员 案例名称"
                               aria-describedby="searchLabel"
                               id="userInput" name="userInput">
                        <span class="input-group-btn">
                        <input type="submit" class="btn btn-warning w70" value="确定" type="button">
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content col-md-12">
        <table class="table table-bordered caseTable" data-toggle="table" id="caseListTable">
            <thead class="thead-inverse">
            <tr>
                <th><input id="checkAll" type="checkbox"/> 全选</th>
                <th>用户名</th>
                <th>注册时间</th>
                <th>联系人座机</th>
                <th>联系人手机</th>
                <th>提交案例数</th>
                <th>付款状态</th>
                <th>付款记录</th>
            </tr>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allUser']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <tr>
                <td><input type="checkbox" name="subBox" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
"></td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['create_time'],"%Y-%m-%d");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['mobile'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['user']->value['count'];?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['pay_info']=='1') {?><td>未支付</td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['pay_info']=='2') {?><td>已全部支付</td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['pay_info']=='3') {?><td>未全部支付</td><?php }?>
                <td><a href="/index.php/manager/user/openUserInfo?uid=<?php echo $_smarty_tpl->tpl_vars['user']->value['uid'];?>
&type=2">操作</a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="page clearfix">
        <div class="fr">
            <div class="fr">
                <?php if ($_smarty_tpl->tpl_vars['sumpage']->value=='2') {?>
                <div class="fl go  page_bg" id="first_user">1</div>
                <div class="fl go  page_bg" id="second_user"><?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
</div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sumpage']->value>='3') {?>
                <div class="fl go " id="indexpage_user">首页</div>
                <div class="fl go " id="uppage_user">上一页</div>
                <div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                <div class="fl go  page_bg">...</div>
                <div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
</div>
                <div class="fl go " id="downpage_user">下一页</div>
                <div class="fl go " id="lastpage_user">尾页</div>
                <?php }?>
            </div>
        </div>
    </div>
</div><?php }} ?>
