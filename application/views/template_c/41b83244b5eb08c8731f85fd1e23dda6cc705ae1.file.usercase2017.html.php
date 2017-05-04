<?php /* Smarty version Smarty-3.1.18, created on 2017-04-06 09:57:26
         compiled from "application/views/manager/case/usercase2017.html" */ ?>
<?php /*%%SmartyHeaderCode:15012722458d9cc7de78630-22338473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41b83244b5eb08c8731f85fd1e23dda6cc705ae1' => 
    array (
      0 => 'application/views/manager/case/usercase2017.html',
      1 => 1491042362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15012722458d9cc7de78630-22338473',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d9cc7e2b70b4_97289592',
  'variables' => 
  array (
    'userinfo' => 0,
    'case' => 0,
    'Uid' => 0,
    'type' => 0,
    'year' => 0,
    'search' => 0,
    'status' => 0,
    'key' => 0,
    'statu' => 0,
    'cases' => 0,
    'awards' => 0,
    'award' => 0,
    'logistics' => 0,
    'order' => 0,
    'invoices' => 0,
    'invoice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d9cc7e2b70b4_97289592')) {function content_58d9cc7e2b70b4_97289592($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<style type="text/css" rel="stylesheet">
    h2.title {
        font-size: 18px;
        color: #365973;
        padding-bottom: 20px;
    }

    .caseopen-tab {
        margin: 20px 0;
    }

    /*.caseopen-content li {
        display: none;
    }*/
    .sub-title {
        font-size: 18px;
        margin-right: 5px;
    }

    .mask {
        position: fixed;
        background: rgba(0, 0, 0, 0.6);
        z-index: 100;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
    }

    .close {
        width: 32px;
        height: 32px;
        position: absolute;
        right: 30px;
        top: 30px;
    }

    .close img {
        width: 100%;
        height: 100%;
    }
</style>
<div class="container" id="caseOpen">
    <div class="user-info">
        <h2 class="title">用户信息</h2>
        <div class="tab-content col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>姓&nbsp;&nbsp;名：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['username'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>公司名称：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>联系手机：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>公司介绍：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['profile'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>联系座机：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['telephone'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>个人职位：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['position'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>联系人QQ：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['qq'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-addon"><em class="holderBlock"></em>联系人邮箱：</span>
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
" disabled="true" class="form-control">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="hr"></div>
    <div class="check-status">
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
" id="getCid"/>
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['Uid']->value;?>
" id="getUid"/>
        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" id="type"/>
        <h2 class="title">支付状态</h2>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=='1') {?>
        <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='1') {?><p>支付状态:未支付</p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='2') {?><p>支付状态:已全额支付</p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='3') {?><p>支付状态:未全额支付</p><?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['type']->value=='2') {?>
        <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['pay_info']=='1') {?><p>支付状态:未支付</p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['pay_info']=='2') {?><p>支付状态:已全部支付</p><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['pay_info']=='3') {?><p>支付状态:未全部支付</p><?php }?>
        <?php }?>
        <div>
            <span>可选状态：</span>
            <select class="selectpicker" data-width="100" id="payStatus" name="payStatus">
                <option value="1">未支付</option>
                <option value="2">已全额支付</option>
                <option value="3">未全额支付</option>
            </select>
            <input type="button" class="btn btn-success" value="修改" id="reviseBtn">
        </div>
    </div>

    <div class="case-description">
        <ul class="caseopen-tab">
            <li class="btn btn-danger">相关案例</li>
            <li class="btn btn-primary">付款信息</li>
            <li class="btn btn-primary">发票信息</li>
        </ul>
        <ul class="caseopen-content">
            <!--相关案例-->
            <li class="caseopen-content-li" style="display: block;">
                <h2 class="title">相关案例</h2>
                <div class="search">
                    <form name="caseSearch" id="caseSearch" method="get" action="/index.php/manager/user/openUserInfo">
                        <input type="hidden" name="uid" id="userUid" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['uid'];?>
">
                        <input type="hidden" name="cid" id="userCid" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
">
                        <div class="up form-group">
                            <strong class="">提交时间：</strong>
                            <select class="selectpicker" data-width="100" id="commitY" name="commitY">
                                <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==$_smarty_tpl->tpl_vars['year']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                            </select>
                            <strong>年</strong>
                            <select class="selectpicker" data-width="100" id="commitM" name="commitM">
                                <option value="1"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==1) {?> selected="selected"<?php }?>>1</option>
                                <option value="2"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==2) {?> selected="selected"<?php }?>>2</option>
                                <option value="3"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==3) {?> selected="selected"<?php }?>>3</option>
                                <option value="4"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==4) {?> selected="selected"<?php }?>>4</option>
                                <option value="5"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==5) {?> selected="selected"<?php }?>>5</option>
                                <option value="6"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==6) {?> selected="selected"<?php }?>>6</option>
                                <option value="7"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==7) {?> selected="selected"<?php }?>>7</option>
                                <option value="8"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==8) {?> selected="selected"<?php }?>>8</option>
                                <option value="9"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==9) {?> selected="selected"<?php }?>>9</option>
                                <option value="10"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==10) {?> selected="selected"<?php }?>>10</option>
                                <option value="11"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==11) {?> selected="selected"<?php }?>>11</option>
                                <option value="12"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==12) {?> selected="selected"<?php }?>>12</option>
                            </select>
                            <strong>月</strong>
                            <strong>奖项类别：</strong>
                            <select class="selectpicker" data-width="220" id="awardType" name="awardType">
                                <option value="0"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==0) {?> selected="selected"<?php }?>>全部奖项</option>
                                <option value="2"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==2) {?> selected="selected"<?php }?>>场景营销类</option>
                                <option value="3"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==3) {?> selected="selected"<?php }?>>移动营销类</option>
                                <option value="22"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==22) {?> selected="selected"<?php }?>>大屏营销类</option>
                                <option value="4"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==4) {?> selected="selected"<?php }?>>电商O2O类</option>
                                <option value="6"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==6) {?> selected="selected"<?php }?>>大数据营销类</option>
                                <option value="23"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==23) {?> selected="selected"<?php }?>>AR/VR类</option>
                                <option value="9"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==9) {?> selected="selected"<?php }?>>情感营销类</option>
                                <option value="11"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==11) {?> selected="selected"<?php }?>>社会化营销类</option>
                                <option value="13"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==13) {?> selected="selected"<?php }?>>体育营销类</option>
                                <option value="12"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==12) {?> selected="selected"<?php }?>>公益营销类</option>
                                <option value="24"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==24) {?> selected="selected"<?php }?>>健康营销类</option>
                                <option value="25"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==25) {?> selected="selected"<?php }?>>直播营销类</option>
                                <option value="10"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==10) {?> selected="selected"<?php }?>>娱乐营销类</option>
                                <option value="26"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==26) {?> selected="selected"<?php }?>>短视频营销类</option>
                                <option value="14"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==14) {?> selected="selected"<?php }?>>年度网络营销领军人物</option>
                                <option value="15"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==15) {?> selected="selected"<?php }?>>年度网络营销新锐人物</option>
                                <option value="16"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==16) {?> selected="selected"<?php }?>>年度网络营销最佳数字代理机构</option>
                                <option value="17"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==17) {?> selected="selected"<?php }?>>年度网络营销最佳品牌主</option>
                                <option value="18"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==18) {?> selected="selected"<?php }?>>年度网络营销优秀产品及工具</option>
                            </select>
                            <strong>审核时间：</strong>
                            <select class="selectpicker" data-width="100" id="checkY" name="checkY">
                                <option value='0'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==0) {?> selected="selected"<?php }?>>待选择</option>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==$_smarty_tpl->tpl_vars['year']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</option>
                            </select>
                            <strong>年</strong>
                            <select class="selectpicker" data-width="100" id="checkM" name="checkM">
                                <option value='0'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==0) {?> selected="selected"<?php }?>>待选择</option>
                                <option value="1"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==1) {?> selected="selected"<?php }?>>1</option>
                                <option value="2"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==2) {?> selected="selected"<?php }?>>2</option>
                                <option value="3"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==3) {?> selected="selected"<?php }?>>3</option>
                                <option value="4"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==4) {?> selected="selected"<?php }?>>4</option>
                                <option value="5"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==5) {?> selected="selected"<?php }?>>5</option>
                                <option value="6"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==6) {?> selected="selected"<?php }?>>6</option>
                                <option value="7"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==7) {?> selected="selected"<?php }?>>7</option>
                                <option value="8"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==8) {?> selected="selected"<?php }?>>8</option>
                                <option value="9"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==9) {?> selected="selected"<?php }?>>9</option>
                                <option value="10"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==10) {?> selected="selected"<?php }?>>10</option>
                                <option value="11"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==11) {?> selected="selected"<?php }?>>11</option>
                                <option value="12"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==12) {?> selected="selected"<?php }?>>12</option>
                            </select>
                            <strong>月</strong>
                        </div>
                        <div class="down form-group">
                            <strong>评分排序：</strong>
                            <select class="selectpicker" data-width="100" id="sort" name="sort">
                                <option value='0'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==0) {?> selected="selected"<?php }?>>待选择</option>
                                <option value='1'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==1) {?> selected="selected"<?php }?>>评分由低到高</option>
                                <option value='2'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==2) {?> selected="selected"<?php }?>>评分由高到低</option>
                                <option value='3'
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==3) {?> selected="selected"<?php }?>>未有评分项</option>
                            </select>
                            <strong>审核状态：</strong>
                            <select class="selectpicker" data-width="100" id="status" name="status">
                                <option value="0">全部状态</option>
                                <?php  $_smarty_tpl->tpl_vars['statu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['statu']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['statu']->key => $_smarty_tpl->tpl_vars['statu']->value) {
$_smarty_tpl->tpl_vars['statu']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['statu']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"
                                <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==$_smarty_tpl->tpl_vars['key']->value) {?> selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['statu']->value;?>
</option>
                                <?php } ?>
                            </select>
                            <input type="submit" class="btn btn-success" value="确定" type="button">
                        </div>
                        <hr>
                    </form>
                </div>
                <div class="tab-content col-md-12">
                    <table class="table table-bordered caseTable">
                        <thead>
                        <tr>
                            <!--<th><input id="checkAll" type="checkbox"/> 全选</th>-->
                            <th>案例名称</th>
                            <th>提报奖项</th>
                            <th>上传公司</th>
                            <th>提交时间</th>
                            <th>审核状态</th>
                            <th>支付状态</th>
                            <th>评分</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['case'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['case']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['case']->key => $_smarty_tpl->tpl_vars['case']->value) {
$_smarty_tpl->tpl_vars['case']->_loop = true;
?>
                        <tr>
                            <!--<td><input type="checkbox" name="subBox"></td>-->
                            <td><?php echo $_smarty_tpl->tpl_vars['case']->value['title'];?>
</td>
                            <td><?php  $_smarty_tpl->tpl_vars['award'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['award']->_loop = false;
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
                            <td><?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser'];?>
</td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['case']->value['create_time'],"%Y-%m-%d");?>
</td>
                            <?php if (empty($_smarty_tpl->tpl_vars['case']->value['status'])) {?>
                            <td></td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='1') {?>
                            <td>等待审核</td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='2') {?>
                            <td>审核通过</td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='3') {?>
                            <td>审核未通过</td>
                            <?php }?>
                            <?php if (empty($_smarty_tpl->tpl_vars['case']->value['pay_info'])) {?>
                            <td></td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='1') {?>
                            <td>未支付</td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='2') {?>
                            <td>已全额支付</td>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['case']->value['pay_info']=='3') {?>
                            <td>未全额支付</td>
                            <?php }?>
                            <?php if (empty($_smarty_tpl->tpl_vars['case']->value['score'])) {?>
                            <td></td>
                            <?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['case']->value['score'];?>
</td>
                            <td>
                                <?php if (!empty($_smarty_tpl->tpl_vars['case']->value['title'])) {?>
                                <a href="/index.php/manager/cases/caseopen?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
">查看详情</a>
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
                        </tbody>
                    </table>
                </div>
            </li>
            <!--付款信息-->
            <li class="caseopen-content-li" style="display: none;">
                <h2 class="title">付款信息</h2>
                <div class="tab-content col-md-12">
                    <table class="table table-bordered caseTable" id="caseListTable">
                        <thead>
                        <tr>
                            <th>付款时间</th>
                            <th>对应案例</th>
                            <th>物流公司</th>
                            <th>快递状态</th>
                            <th>快递单号</th>
                            <th>付款凭证</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['logistics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
                        <tr>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['create_time'],"%Y-%m-%d");?>
</td>
                            <td></td>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['logistics_company']=='') {?><td></td><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['logistics_company']=='1') {?><td>百世汇通</td><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['logistics_company']=='2') {?><td>顺丰快递</td><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['status']=='1') {?><td>发票准备中</td><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['order']->value['status']=='2') {?><td>发票已寄出</td><?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['order_number'];?>
</td>
                            <td><a href="javascript:void(0);" class="show-pay-certificate" data-img="<?php echo $_smarty_tpl->tpl_vars['order']->value['pay_prove'];?>
">查看</a></td>
                            <td><a href="javascript:void(0);" class="show-express-info" data-order="<?php echo $_smarty_tpl->tpl_vars['order']->value['iid'];?>
">添加快递信息</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </li>
            <!--发票信息-->
            <li class="caseopen-content-li" style="display: none;">
                <?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
                <p>
                    <span class="sub-title">发票类型：</span>
                    <?php if ($_smarty_tpl->tpl_vars['invoice']->value['invoice_type']=='1') {?><span>国税增值税普通发票</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['invoice']->value['invoice_type']=='2') {?><span>国税增值税专用发票</span><?php }?>
                </p>
                <p><span class="sub-title">发票信息：</span></p>
                <div class="col-md-6">
                    <p>一般纳税人的认定 或 税务登记证副本的复印件</p>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['invoice']->value['hardcopy'];?>
" alt="" width="100px" height="100px">
                    <p>银行开户许可证或开户信息</p>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['invoice']->value['license'];?>
" alt="" width="100px" height="100px">
                </div>
                <div class="col-md-6">
                    <p>单位名称：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['company_name'];?>
</p>
                    <p>单位地址：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['company_address'];?>
</p>
                    <p>联系电话：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['telephone'];?>
</p>
                    <p>开户行名称：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['bank_name'];?>
</p>
                    <p>账号：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['bank_account'];?>
</p>
                    <p>收件人：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['addressee'];?>
</p>
                    <p>收件地址：<?php echo $_smarty_tpl->tpl_vars['invoice']->value['direction'];?>
</p>
                </div>
                <div class="col-md-12 clearfix" style="margin-bottom: 50px;">
                        <textarea style="width: 80%; height: 200px; margin: 20px auto; display: block;">
                        </textarea>
                    <input type="button" class="btn btn-warning pull-right show-modify-invoice" value="修改">
                </div>
                <?php } ?>
            </li>
        </ul>
    </div>
</div>
<div class="mask">
    <div class="mask-container">
        <div class="close">
            <img src="/static/manager/images/close.png" alt="close">
        </div>
        <!--添加物流信息-->
        <div class="express-info mask-item">
            <form id="iid" name="formLogistics" method="get" enctype="multipart/form-data" target="_self" class="clearfix">
            <div class="express-info-tab-wrapper" style="width: 500px; margin: 50px auto; background: #dddddd;">
                <input type="hidden" id="LogisticsId" name="LogisticsId">
                <fieldset>
                    <legend style="color: #666;">添加快递</legend>
                    <table class="table form-group">
                        <tr>
                            <td>快递状态</td>
                            <td>
                                <select name="status">
                                    <option value="1">发票准备中</option>
                                    <option value="2">发票已寄出</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>快递公司</td>
                            <td>
                                <select name="logistics_company" id="logistics_company">
                                    <option value="1">百世汇通</option>
                                    <option value="2">顺丰快递&nbsp;</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>快递单号</td>
                            <td><input type="text" name="order_number" id="order_number"></td>
                        </tr>
                        <tr>
                            <td colspan="1">
                                <input type="submit" class="btn btn-primary" value="保存">
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </div>
            </form>>
        </div>
        <!--显示付款图片-->
        <div class="pay-certificate mask-item">
            <img id="maskImg" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1490095576787&di=5714c624d907c258a9d24ef99d968429&imgtype=0&src=http%3A%2F%2Fa3.att.hudong.com%2F04%2F74%2F01300000322630122899745216480.jpg"
                 alt="" width="800" height="600" style="margin: 50px auto;">
        </div>
        <!--添加发票信息-->
        <div class="modify-invoice mask-item clearfix" style="width: 500px; margin: 10px auto;">
            <form name="formInvoice" method="post" action="/index.php/manager/cases/invoicesubmitact?type=2&uid=<?php echo $_smarty_tpl->tpl_vars['case']->value['uid'];?>
"
                  enctype="multipart/form-data" target="_self" class="clearfix">
                <div class="formTable fl" style="background: #eeeeee; padding: 20px; width: 500px;">
                    <h5>增值税发票类型</h5>
                    <label class="checkbox-inline">
                        <input type="radio" id="inlineCheckbox1" value="1" name="ticketType">国税增值税普通发票
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" id="inlineCheckbox2" value="2" name="ticketType">国税增值税专用发票
                    </label>
                    <div class="formRow clearfix">
                        <label>1.&lt;一般纳税人的认定&gt; 或 &lt;税务登记证副本&gt;的复印件</label>
                        <a href="#" target="_blank" class="fr">样式模板</a>
                        <input type="file" class="form-control" name="hardcopy">
                        <label>税务登记证上没有“增值税一般纳税人”税务章的要加盖公章（JPG文件，不大于5M）</label>
                    </div>
                    <div class="formRow clearfix">
                        <label>2.银行开户许可证或开户信息</label>
                        <a href="#" target="_blank" class="fr">样式模板</a>
                        <input type="file" class="form-control" name="license">
                        <label>JPG文件，不大于5M</label>
                    </div>
                    <div class="formRow clearfix">
                        <label>3.单位名称</label>
                        <input type="text" class="form-control" placeholder="请填写单位名称" name="company_name">
                    </div>
                    <div class="formRow clearfix">
                        <label>4.单位地址</label>
                        <input type="text" class="form-control" placeholder="请填写单位地址"
                               name="company_address">
                    </div>
                    <div class="formRow clearfix">
                        <label>5.联系电话</label>
                        <input type="text" class="form-control" placeholder="请填写联系电话" name="telephone">
                    </div>
                    <div class="formRow clearfix">
                        <label>6.开户行名称</label>
                        <input type="text" class="form-control" placeholder="请填写开户行名称" name="bank_name">
                    </div>
                    <div class="formRow clearfix">
                        <label>7.帐号
                        </label>
                        <input type="text" class="form-control" placeholder="请填写帐号" name="bank_account">
                    </div>
                    <div class="formRow clearfix">
                        <label>8.收件人</label>
                        <input type="checkbox"> 同注册人
                        <input type="text" class="form-control" placeholder="请填写收件人" name="addressee">
                    </div>
                    <div class="formRow clearfix">
                        <label>9.收件地址</label>
                        <input type="checkbox"> 同单位地址
                        <input type="text" class="form-control" placeholder="请填写收件地址" name="direction">
                    </div>
                    <input type="submit" class="btn btn-info  mt30 col-xs-2 col-xs-offset-5" value="提交">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(".caseopen-tab li").on('click', function () {
            $(".caseopen-tab li").eq($(this).index()).addClass("btn-danger").siblings().removeClass('btn-danger').addClass('btn-primary');
            $(".caseopen-content-li").hide().eq($(this).index()).show();
        });
        //修改支付状态
        $('#reviseBtn').on('click', function () {
            var mySelect = document.getElementById("payStatus");
            var index = mySelect.selectedIndex;
            var status = mySelect.options[index].value;
            var cid = $("#getCid").val();
            var uid = $('#getUid').val();
            var type = $("#type").val();
            if (type=='1'){
                $.ajax({
                    url: "/index.php/manager/user/changePayInfo",
                    type: "get",
                    data: {cid: cid, status: status},
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
            }
            if (type=='2'){
                $.ajax({
                    url: "/index.php/manager/user/revisePayInfo",
                    type: "get",
                    data: {uid: uid, status: status},
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
            }
        });
        //全选
        $("#checkAll").click(function () {
            $('input[name="subBox"]').prop("checked", this.checked);
        });
        var $subBox = $("input[name='subBox']");
        $subBox.click(function () {
            $("#checkAll").prop("checked", $subBox.length == $("input[name='subBox']:checked").length ? true : false);
        });
        $(".show-pay-certificate").on('click', function () {
            var img = $(this).attr('data-img');
            $("#maskImg").attr('src',img);
            $('.mask-item').hide();
            $('.mask').show();
            $('.mask-item.pay-certificate').show();
        });
        $(".show-express-info").on('click', function () {
            var order = $(this).attr('data-order');
            $("#iid").attr('action','/index.php/manager/cases/addLogistics');
            $("#LogisticsId").attr('value',order);
            $('.mask-item').hide();
            $('.mask').show();
            $(".express-info").show();
        });
        $(".show-modify-invoice").on('click', function () {
            $('.mask-item').hide();
            $('.mask').show();
            $(".modify-invoice").show();
        });
        $(".close").on('click', function () {
            $('.mask').hide();
        })

    });
</script>
<?php }} ?>
