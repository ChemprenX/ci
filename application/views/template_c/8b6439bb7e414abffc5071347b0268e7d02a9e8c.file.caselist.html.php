<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 09:47:05
         compiled from "application/views/manager/case/caselist.html" */ ?>
<?php /*%%SmartyHeaderCode:105226853458db12199e5d47-69306556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b6439bb7e414abffc5071347b0268e7d02a9e8c' => 
    array (
      0 => 'application/views/manager/case/caselist.html',
      1 => 1490343518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105226853458db12199e5d47-69306556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'status' => 0,
    'key' => 0,
    'search' => 0,
    'statu' => 0,
    'cases' => 0,
    'case' => 0,
    'awards' => 0,
    'award' => 0,
    'sumpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db1219b1f879_92538503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db1219b1f879_92538503')) {function content_58db1219b1f879_92538503($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?>
<script type="text/javascript">
$(function() {
    $("#checkAll").click(function() {
        $('input[name="subBox"]').attr("checked",this.checked); 
    });
    var $subBox = $("input[name='subBox']");
    $subBox.click(function(){
        $("#checkAll").attr("checked",$subBox.length == $("input[name='subBox']:checked").length ? true : false);
    }); 
});

</script>
<style>
.case_man .main_td .bianj {
    background: none repeat scroll 0 0 #7f90b7;
    border-radius: 3px;
    display: block;
    margin: 5px;
    padding: 4px 20px;
    white-space: nowrap;
}

</style>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main clearfix  fYaHei">
    <div class="case_man">
        <div class="main_tl main_jiaoy mb20">
            <form name="formSearch" id="formSearch" method="get" action="/index.php/manager/cases/caselist"> 
            <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
            <div class="clearfix">
                <span class="fl mr10 fenl">
                    <select id="status" name="status">
                        <option value='0'>状态</option>
                        <?php  $_smarty_tpl->tpl_vars['statu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statu']->key => $_smarty_tpl->tpl_vars['statu']->value) {
$_smarty_tpl->tpl_vars['statu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['statu']->key;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==$_smarty_tpl->tpl_vars['key']->value) {?> selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['statu']->value;?>
</option>
                        <?php } ?>
                    </select>
                </span>
                <span class="fl mr10 fenl">
                    <select name="sort">
                        <option value='0' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==0) {?> selected="selected"<?php }?>>报名时间↓</option>
                        <option value='1' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==1) {?> selected="selected"<?php }?>>报名时间↑</option>
                        <option value='2' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==2) {?> selected="selected"<?php }?>>得分↓</option>
                        <option value='3' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==3) {?> selected="selected"<?php }?>>得分↑</option>
                    </select>
                </span>
                <div class="clearfix fl">
                    <div class="fl f14 mr10 graydeep"><input placeholder="想要找..." value="<?php echo $_smarty_tpl->tpl_vars['search']->value['title'];?>
" id="title" name="title" class="ml5 cz pl10 w200"></div>
                    <div class="fl"><input type="submit" value="查询" class="aka fl mr5 cx white"></div>
                </div>
                <div class="aka fr cx white"><a href="javascript:examine()">审核</a></div>
                <div class="aka fr mr10 cx white"><a href="javascript:noexamine()">拒审</a></div>
            </div>
            </form>
        </div>
        <div class="main_td mt15 fYaHei mb20">
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr align="center" class="lbg">
                    <td width="50" height="50"><input id="checkAll"  type="checkbox" /></td>
                    <td>案例名称</td>
                    <td>提报奖项</td>
                    <td>上传公司</td>
                    <td>报名时间</td>
                    <td>得分</td>
                    <td>案例状态</td>
                    <td>送报公司</td>
                    <td>审核人员</td>
                    <td>操作</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['case'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['case']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['case']->key => $_smarty_tpl->tpl_vars['case']->value) {
$_smarty_tpl->tpl_vars['case']->_loop = true;
?>
                <tr align="center" height="50">
                    <td><input name="subBox" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
"/></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['case']->value['title'];?>
</td>
                    <td>
                    <?php  $_smarty_tpl->tpl_vars['award'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['award']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['awards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['award']->key => $_smarty_tpl->tpl_vars['award']->value) {
$_smarty_tpl->tpl_vars['award']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['award']->key;
?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['key']->value,explode(',',$_smarty_tpl->tpl_vars['case']->value['aid']))) {?>
                            <?php echo $_smarty_tpl->tpl_vars['award']->value;?>
,
                        <?php }?>
                    <?php } ?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['case']->value['company'];?>
</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['case']->value['create_time'],"%Y-%m-%d");?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['case']->value['score'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['status']->value[$_smarty_tpl->tpl_vars['case']->value['status']];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['case']->value['contact'];?>
</td>
                    <td>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['title'])) {?>
                        <a href="/index.php/manager/cases/caseopen?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
">查看详情</a>
                        <hr>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['url'])) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['url'];?>
">下载PPT</a>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['video_url'])) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['video_url'];?>
">下载视频</a>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['no_case_url'])) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_url'];?>
">下载word</a>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['no_case_advertiser_logo'])) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser_logo'];?>
">主广告logo</a>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['no_case_visual_url'])) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_visual_url'];?>
">人物照片</a>
                        <?php }?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="page clearfix">
            <div class="fr">
                <div class="fr">
                    <div class="fl go " onclick="indexpage()">首页</div>
                    <div class="fl go " onclick="uppage()">上一页</div>
                    <div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                    <!--<div class="fl go  page_bg">...</div>-->
                    <!--<div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
</div>-->
                    <div class="fl go " onclick="downpage()">下一页</div>
                    <div class="fl go " onclick="lastpage()" style=" border-right:1px solid #eeeeee;">尾页</div>
                </div>
            </div>
        <!--弹出修改 删除 none 可显示隐藏div-->      
    </div>
</div>
<script type="text/javascript">
function examine(){
	var status = 2;
	var chk_value =[];
    $('input[name="subBox"]:checked').each(function(){   
        chk_value.push($(this).val());   
    });
    $.ajax({
        url:"/index.php/manager/cases/changestatus",
        type:"get",
        data:{cids:chk_value,status:status},
        dataType : "json",
        success:function(data){
            if(data){
                //$("#checkAll").attr("checked",false);
                alert('成功');
                location.reload();
            }else{
                alert('失败');
            }
        }
    });
}
function noexamine(){
	var status = 3;
    var chk_value =[];
    $('input[name="subBox"]:checked').each(function(){   
        chk_value.push($(this).val());   
    });
    $.ajax({
        url:"/index.php/manager/cases/changestatus",
        type:"get",
        data:{cids:chk_value,status:status},
        dataType : "json",
        success:function(data){
            if(data){
                //$("#checkAll").attr("checked",false);
                alert('成功');
                location.reload();
            }else{
                alert('失败');
            }
        }
    });
}

function uppage(){
	var page = $("#page").val();
    var newpage = parseInt(page)-1;
    if(newpage<1){
    	alert("前面没有了！");
    }else{
    	$("#page").val(newpage);
        $("#formSearch").submit();
    }
	
}

function downpage(){
	var page = $("#page").val();
	if(page >= <?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
){
		alert("后面没有了！");
	}else{
		var newpage = parseInt(page)+1;
	    $("#page").val(newpage);
	    $("#formSearch").submit();
	}
}

function indexpage(){
	$("#page").val(1);
    $("#formSearch").submit();
}

function lastpage(){
	$("#page").val(<?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
);
    $("#formSearch").submit();
}
</script><?php }} ?>
