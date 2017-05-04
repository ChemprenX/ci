<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 16:35:14
         compiled from "application/views/manager/case/caseopen.html" */ ?>
<?php /*%%SmartyHeaderCode:53424816158d8aeefd7f416-48208851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6705b5f921b620c114a70b54d4aaf0b9fa68a474' => 
    array (
      0 => 'application/views/manager/case/caseopen.html',
      1 => 1490603700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53424816158d8aeefd7f416-48208851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8aeeff10004_64135857',
  'variables' => 
  array (
    'type' => 0,
    'userinfo' => 0,
    'case' => 0,
    'awards' => 0,
    'key' => 0,
    'award' => 0,
    'scores' => 0,
    'score' => 0,
    'nextCid' => 0,
    'lastCid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8aeeff10004_64135857')) {function content_58d8aeeff10004_64135857($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><script type="text/javascript">
    $(function () {

        function getCookie(c_name){
            if (document.cookie.length>0){
                c_start=document.cookie.indexOf(c_name + "=")
                if (c_start!=-1){
                    c_start=c_start + c_name.length+1
                    c_end=document.cookie.indexOf(";",c_start)
                    if (c_end==-1) c_end=document.cookie.length
                    return unescape(document.cookie.substring(c_start,c_end))
                }
            }
            return ""
        }
        //通过
        $('#passCheck').on('click', function (e) {
            var status = 2;
            var caseId = $("#caseId").val();
            var remark = $("#caseRemark").val();
            var checkName = getCookie('admin_username');
            $.ajax({
                url: "/index.php/manager/cases/changeStatusRemark",
                type: "get",
                data: {CaseID: caseId, Status: status, Remark: remark,checkName: checkName},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        alert('成功');
                        location.reload();
                    } else {
                        alert('失败');
                    }
                }
            });
        });
        //拒审
        $('#disPassCheck').on('click', function () {
            var status = 3;
            var caseId = $("#caseId").val();
            var remark = $("#caseRemark").val();
            var checkName = getCookie('admin_username');
            if(remark.length == 0){
                alert('审核不通过请备注原因');
            } else {
                $.ajax({
                    url: "/index.php/manager/cases/changeStatusRemark",
                    type: "get",
                    data: {CaseID: caseId, Status: status, Remark: remark,checkName: checkName},
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('操作成功');
                            location.reload();
                        } else {
                            alert('操作失败');
                        }
                    }
                });
            }
        });
        //备注用户信息
        $('#userRemark').on('click', function () {
            var remark = $("#remark_user").val();
            var userId = $("#userId").val();
            $.ajax({
                url: "/index.php/manager/cases/changeRemark",
                type: "get",
                data: {Uid: userId, remark: remark},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        alert('修改备注成功');
                        location.reload();
                    } else {
                        alert('修改备注失败');
                    }
                }
            });
        });
        /*非案例类*/
        //通过
        $('#passCheck1').on('click', function (e) {
            var status = 2;
            var caseId = $("#caseId").val();
            var remark = $("#caseRemark1").val();
            var checkName = getCookie('admin_username');
            $.ajax({
                url: "/index.php/manager/cases/changeStatusRemark",
                type: "get",
                data: {CaseID: caseId, Status: status, Remark: remark,checkName: checkName},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        alert('成功');
                        location.reload();
                    } else {
                        alert('失败');
                    }
                }
            });
        });
        //拒审
        $('#disPassCheck1').on('click', function () {
            var status = 3;
            var caseId = $("#caseId").val();
            var remark = $("#caseRemark1").val();
            var checkName = getCookie('admin_username');
            if(remark.length == 0){
                alert('审核不通过请备注原因');
            } else {
                $.ajax({
                    url: "/index.php/manager/cases/changeStatusRemark",
                    type: "get",
                    data: {CaseID: caseId, Status: status, Remark: remark,checkName: checkName},
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('操作成功');
                            location.reload();
                        } else {
                            alert('操作失败');
                        }
                    }
                });
            }
        });
        //备注用户信息
        $('#userRemark1').on('click', function () {
            var remark = $("#remark_user1").val();
            var userId = $("#userId").val();
            $.ajax({
                url: "/index.php/manager/cases/changeRemark",
                type: "get",
                data: {Uid: userId, remark: remark},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        alert('修改备注成功');
                        location.reload();
                    } else {
                        alert('修改备注失败');
                    }
                }
            });
        });
    });
</script>
<style>
    .input-group-addon {
        min-width:100px;
    }
</style>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['type']->value=='1') {?>
<!--案例类-->
<!--<div class="container" style="display: none;">-->
<input type="hidden" id="userId" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['uid'];?>
"/>
<input type="hidden" id="caseId" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
"/>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="case-title">
                <h2 class="title">案例详情：</h2>
                <span>参评奖项:
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
                </span>
            </div>
            <div class="case-case-info clearfix">
                <div class="input-group">
                    <span class="input-group-addon">广告主名称</span>
                    <input type="text" class="form-control" placeholder="Username" disabled="true"
                           aria-describedby="searchLabel" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['advertiser'];?>
">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">广告主logo</span>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['case']->value['advertiser_logo'];?>
" alt="" width="100" height="100">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">代理公司名称</span>
                    <input type="text" class="form-control" placeholder="Username" disabled="true"
                           aria-describedby="searchLabel" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['agency_company'];?>
">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">代理公司logo</span>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['case']->value['agency_company_logo'];?>
" alt="" width="100" height="100">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">案例名称</span>
                    <input type="text" class="form-control" placeholder="Username" disabled="true"
                           aria-describedby="searchLabel" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['title'];?>
">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">作品主视觉</span>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['case']->value['visual_url'];?>
" alt="" width="100" height="100">
                </div>
                <!--<input type="button" class="btn btn-warning pull-right" value="修改">-->
            </div>
            <div class="hr"></div>
            <div class="case-user-info clearfix">
                <div class="case-title">
                    <h2 class="title">用户信息（提报人信息）</h2>
                </div>
                <!--<input type="hidden" id="userId" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['uid'];?>
"/>-->
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>姓名：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['contact'];?>
</td>
                        <td>公司名称：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
</td>
                    </tr>
                    <tr>
                        <td>联系手机：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
</td>
                        <td>公司介绍：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['profile'];?>
</td>
                    </tr>
                    <tr>
                        <td>联系座机：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['telephone'];?>
</td>
                        <td>个人职位：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['position'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="2">联系人qq：</td>
                        <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['qq'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="2">注册邮箱</td>
                        <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <span>备注</span>
                            <textarea class="form-control" id="remark_user" rows="3"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['remark'];?>
</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="button" class="btn btn-warning pull-right" value="修改" id="userRemark">
            </div>
            <div class="hr">

            </div>
            <div class="score-info">
                <div class="case-title">
                    <h2 class="title">
                        评分信息
                    </h2>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>评委姓名</th>
                        <th>评分时间</th>
                        <th>评分（总分）</th>
                        <th>整合度</th>
                        <th>传播影响</th>
                        <th>转化率</th>
                        <th>互动性</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value) {
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['realname'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['score']->value['create_time'],"%Y-%m-%d");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score3'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score4'];?>
</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--right-->
        <div class="col-md-6">
            <div class="case-title">
                <h2 class="title">案例资料</h2>
                <h3 class="sub-title">ppt</h3>
            </div>
            <iframe width="640" height="390" scrolling="yes" style="overflow: scroll"
                    src="http://view.officeapps.live.com/op/view.aspx?src=http://pingfen.imcc.org.cn<?php echo $_smarty_tpl->tpl_vars['case']->value['url'];?>
">
            </iframe>
            <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['video_url'])) {?>
            <div class="case-title">
                <h3 class="sub-title">视频</h3>
            </div>

            <video controls="" height="290" width="490">
                <source src="http://pingfen.imcc.org.cn<?php echo $_smarty_tpl->tpl_vars['case']->value['video_url'];?>
" type="video/mp4">
                您的浏览器版本过低，请升级后观看视频！
            </video>
            <?php }?>
            <div class="check-status">
                <!--<input type="hidden" id="caseId" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
"/>-->
                <p>参评奖项：<span><?php  $_smarty_tpl->tpl_vars['award'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['award']->_loop = false;
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
                    <?php } ?></span></p>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='1') {?><p>当前状态：等待审核</span></p><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='2') {?><p>当前状态：审核通过</span><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='3') {?><p>当前状态：审核未通过</span><?php }?>
                <input type="button" value="通过审核" class="btn btn-success" id="passCheck">
                <input type="button" value="审核不通过" class="btn btn-danger" id="disPassCheck">
                <textarea class="form-control" rows="3" placeholder="注明原因：尽可能短小精悍" id="caseRemark"></textarea>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['type']->value=='2') {?>
<!--非案例类-->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="case-title">
                <h2 class="title">案例详情：</h2>
                <span>参评奖项:
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
                </span>
            </div>
            <div class="case-case-info form-group clearfix">
                <div class="input-group">
                    <span class="input-group-addon">报送公司</span>
                    <input type="text" class="form-control" placeholder="Username" disabled="true"
                           aria-describedby="searchLabel" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser'];?>
">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">广告主logo</span>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser_logo'];?>
" alt="" width="100" height="100">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">人物照片</span>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_visual_url'];?>
" alt="" width="100" height="100">
                </div>
            </div>
            <div class="hr"></div>
            <div class="case-user-info clearfix">
                <div class="case-title">
                    <h2 class="title">用户信息（提报人信息）</h2>
                </div>
                <!--<input type="hidden" id="userId" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['uid'];?>
"/>-->
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td>姓名：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['contact'];?>
</td>
                        <td>公司名称：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
</td>
                    </tr>
                    <tr>
                        <td>联系手机：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
</td>
                        <td>公司介绍：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['profile'];?>
</td>
                    </tr>
                    <tr>
                        <td>联系座机：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['telephone'];?>
</td>
                        <td>个人职位：</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['position'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="2">联系人qq：</td>
                        <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['qq'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="2">注册邮箱</td>
                        <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <span>备注</span>
                            <textarea class="form-control" id="remark_user1" rows="3"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['remark'];?>
</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="button" class="btn btn-warning pull-right" value="修改" id="userRemark1">
            </div>
            <div class="hr">

            </div>
            <div class="score-info">
                <div class="case-title">
                    <h2 class="title">
                        评分信息
                    </h2>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>评委姓名</th>
                        <th>评分时间</th>
                        <th>评分（总分）</th>
                        <th>整合度</th>
                        <th>传播影响</th>
                        <th>转化率</th>
                        <th>互动性</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['score'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['score']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['score']->key => $_smarty_tpl->tpl_vars['score']->value) {
$_smarty_tpl->tpl_vars['score']->_loop = true;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['realname'];?>
</td>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['score']->value['create_time'],"%Y-%m-%d");?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score1'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score2'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score3'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['score']->value['score4'];?>
</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--right-->
        <div class="col-md-6">
            <div class="case-title">
                <h2 class="title">案例资料</h2>
                <h3 class="sub-title">word</h3>
            </div>
            <iframe width="640" height="390" scrolling="yes" style="overflow: scroll"
                    src="http://view.officeapps.live.com/op/view.aspx?src=http://pingfen.imcc.org.cn<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_url'];?>
">
            </iframe>>
            <div class="check-status">
                <!--<input type="hidden" id="caseId" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
"/>-->
                <p>参评奖项：<span><?php  $_smarty_tpl->tpl_vars['award'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['award']->_loop = false;
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
                    <?php } ?></span></p>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='1') {?><p>当前状态：等待审核</span></p><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='2') {?><p>当前状态：审核通过</span><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='3') {?><p>当前状态：审核未通过</span><?php }?>
                <input type="button" value="通过审核" class="btn btn-success" id="passCheck1">
                <input type="button" value="审核不通过" class="btn btn-danger" id="disPassCheck1">
                <textarea class="form-control" rows="3" placeholder="注明原因：尽可能短小精悍" id="caseRemark1"></textarea>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="row submit-wrap">
    <?php if ($_smarty_tpl->tpl_vars['nextCid']->value!=$_smarty_tpl->tpl_vars['lastCid']->value) {?>
    <a href="/index.php/manager/cases/caseopen?cid=<?php echo $_smarty_tpl->tpl_vars['nextCid']->value;?>
">保存并查看下一条</a>
    <?php }?>
    <input type="botton" value="返回" class="btn btn-primary" onclick="history.back();"/>
</div>






<?php }} ?>
