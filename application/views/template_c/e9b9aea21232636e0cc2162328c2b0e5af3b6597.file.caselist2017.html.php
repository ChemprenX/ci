<?php /* Smarty version Smarty-3.1.18, created on 2017-04-06 09:57:22
         compiled from "application/views/manager/case/caselist2017.html" */ ?>
<?php /*%%SmartyHeaderCode:51298482858d8aec2397822-00313405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b9aea21232636e0cc2162328c2b0e5af3b6597' => 
    array (
      0 => 'application/views/manager/case/caselist2017.html',
      1 => 1490758964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51298482858d8aec2397822-00313405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d8aec267e380_53246852',
  'variables' => 
  array (
    'sumpage' => 0,
    'page' => 0,
    'search' => 0,
    'status' => 0,
    'key' => 0,
    'statu' => 0,
    'cidArray' => 0,
    'cid' => 0,
    'cases' => 0,
    'case' => 0,
    'awards' => 0,
    'award' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d8aec267e380_53246852')) {function content_58d8aec267e380_53246852($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><script type="text/javascript">
    $(function () {
        $("#checkAll").click(function () {
            $('input[name="subBox"]').prop("checked", this.checked);
        });
        var $subBox = $("input[name='subBox']");
        $subBox.click(function () {
            $("#checkAll").prop("checked", $subBox.length == $("input[name='subBox']:checked").length ? true : false);
        });
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
        //批量审核
        $('#pass').on('click', function (e) {
            var status = 2;
            var chk_value = [];
            var checkName = getCookie('admin_username');
            $('input[name="subBox"]:checked').each(function () {
                chk_value.push($(this).val());
            });
            $.ajax({
                url: "/index.php/manager/cases/changestatus",
                type: "get",
                data: {cids: chk_value, status: status ,checkName: checkName},
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
        $('#decline').on('click', function (e) {
            var status = 3;
            var chk_value = [];
            var checkName = getCookie('admin_username');
            $('input[name="subBox"]:checked').each(function () {
                chk_value.push($(this).val());
            });
            $.ajax({
                url: "/index.php/manager/cases/changestatus",
                type: "get",
                data: {cids: chk_value, status: status,checkName: checkName},
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
        /*条件查询*/
        $('#searchSubmit').on('click', function(){
            var commitY = $('#commitY').val();
            var commitM = $('#commitM').val();
            var checkY = $('#checkY').val();
            var checkM = $('#checkM').val();
            var time1 = '1483200000';
            var awardType = $('#awardType').val();
            var time2 = '';
            var sort =$('#sort').val();
            var status = $('#status').val();
            var param = 'commitY='+commitY+'&commitM='+commitM+'&awardType='+awardType+'&checkY='+checkY+'&checkM='+checkM+'&sort='+sort+'&status='+status;
            var searchArray = [time1,awardType,time2,sort,status];
//            window.open("/index.php/manager/cases/caselist2017?"+param,"_self");
            $.ajax({
                url: "/index.php/manager/cases/searchAllcase",
                type: "get",
                data: {searchArray: searchArray},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        alert('成功');
                        location.reload();
                    } else {
                        console.log('失败');
                        alert('失败');
                    }
                }
            });

        });
        /*首页*/
        $('#indexpage').on('click', function (e){
            $("#page").val(1);
            $("#formSearch1").submit();
        });
        /*上一頁*/
        $('#uppage').on('click', function (e){
            var page = $("#page").val();
            var newpage = parseInt(page)-1;
            if(newpage<1){
                alert("前面没有了！");
            }else{
                $("#page").val(newpage);
                $("#formSearch1").submit();
            }
        });
        /*下一页*/
        $('#downpage').on('click', function (e){
            var page = $("#page").val();
            if(page >= <?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
){
                alert("后面没有了！");
            }else{
                var newpage = parseInt(page)+1;
                $("#page").val(newpage);
                $("#formSearch1").submit();
            }
        });
        /*尾页*/
        $('#lastpage').on('click', function (e){
            $("#page").val(<?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
);
            $("#formSearch1").submit();
        });
        //第一页
        $('#first').on('click', function (e){
            $("#page").val(1);
            $("#formSearch1").submit();
        });
        //第二页
        $('#second').on('click', function (e){
            $("#page").val(2);
            $("#formSearch1").submit();
        });
    });

</script>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container" id="caseListPage">
    <div class="search">
        <form name="formSearch" id="formSearch1" method="get" action="/index.php/manager/cases/caselist2017_old">
            <input type="hidden" name="page" id="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
        <div class="up form-group">
            <strong class="">排序方式：</strong>
            <select class="selectpicker" data-width="100" id="commitY" name="commitY">
                <option value="2017" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2017) {?> selected="selected"<?php }?>>
                    2017
                </option>
                <option value="2016" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2016) {?> selected="selected"<?php }?>>
                    2016
                </option>
                <option value="2015"<?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2015) {?> selected="selected"<?php }?>>
                    2015
                </option>
            </select>
            <strong>年</strong>
            <select class="selectpicker" data-width="100" id="commitM" name="commitM">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==1) {?> selected="selected"<?php }?>>
                    1
                </option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==2) {?> selected="selected"<?php }?>>
                    2
                </option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==3) {?> selected="selected"<?php }?>>
                    3
                </option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==4) {?> selected="selected"<?php }?>>
                    4
                </option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==5) {?> selected="selected"<?php }?>>
                    5
                </option>
                <option value="6" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==6) {?> selected="selected"<?php }?>>
                    6
                </option>
                <option value="7" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==7) {?> selected="selected"<?php }?>>
                    7
                </option>
                <option value="8" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==8) {?> selected="selected"<?php }?>>
                    8
                </option>
                <option value="9" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==9) {?> selected="selected"<?php }?>>
                    9
                </option>
                <option value="10" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==10) {?> selected="selected"<?php }?>>
                    10
                </option>
                <option value="11" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==11) {?> selected="selected"<?php }?>>
                    11
                </option>
                <option value="12" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitM']==12) {?> selected="selected"<?php }?>>
                    12
                </option>
            </select>
            <strong>月</strong>
            <strong>奖项类别：</strong>
            <select class="selectpicker" data-width="220" id="awardType" name="awardType">
                <option value="0"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==0) {?> selected="selected"<?php }?>>全部奖项</option>
                <option value="2"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==2) {?> selected="selected"<?php }?>>场景营销类</option>
                <option value="3"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==3) {?> selected="selected"<?php }?>>移动营销类</option>
                <option value="22" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==22) {?> selected="selected"<?php }?>>大屏营销类</option>
                <option value="4"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==4) {?> selected="selected"<?php }?>>电商O2O类</option>
                <option value="6"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==6) {?> selected="selected"<?php }?>>大数据营销类</option>
                <option value="23" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==23) {?> selected="selected"<?php }?>>AR/VR类</option>
                <option value="9"  <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==9) {?> selected="selected"<?php }?>>情感营销类</option>
                <option value="11" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==11) {?> selected="selected"<?php }?>>社会化营销类</option>
                <option value="13" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==13) {?> selected="selected"<?php }?>>体育营销类</option>
                <option value="12" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==12) {?> selected="selected"<?php }?>>公益营销类</option>
                <option value="24" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==24) {?> selected="selected"<?php }?>>健康营销类</option>
                <option value="25" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==25) {?> selected="selected"<?php }?>>直播营销类</option>
                <option value="10" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==10) {?> selected="selected"<?php }?>>娱乐营销类</option>
                <option value="26" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==26) {?> selected="selected"<?php }?>>短视频营销类</option>
                <option value="14" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==14) {?> selected="selected"<?php }?>>年度网络营销领军人物</option>
                <option value="15" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==15) {?> selected="selected"<?php }?>>年度网络营销新锐人物</option>
                <option value="16" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==16) {?> selected="selected"<?php }?>>年度网络营销最佳数字代理机构</option>
                <option value="17" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==17) {?> selected="selected"<?php }?>>年度网络营销最佳品牌主</option>
                <option value="18" <?php if ($_smarty_tpl->tpl_vars['search']->value['awardType']==18) {?> selected="selected"<?php }?>>年度网络营销优秀产品及工具</option>
            </select>
            <strong>审核时间：</strong>
            <select class="selectpicker" data-width="100" id="checkY" name="checkY">
                <option value='0' <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==0) {?> selected="selected"<?php }?>>待选择</option>
                <option value="2017" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==2017) {?> selected="selected"<?php }?>>
                    2017
                </option>
                <option value="2016" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==2016) {?> selected="selected"<?php }?>>
                    2016
                </option>
                <option value="2015" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkY']==2015) {?> selected="selected"<?php }?>>
                    2015
                </option>
            </select>
            <strong>年</strong>
            <select class="selectpicker" data-width="100" id="checkM" name="checkM">
                <option value='0' <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==0) {?> selected="selected"<?php }?>>待选择</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==1) {?> selected="selected"<?php }?>>
                    1
                </option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==2) {?> selected="selected"<?php }?>>
                    2
                </option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==3) {?> selected="selected"<?php }?>>
                    3
                </option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==4) {?> selected="selected"<?php }?>>
                    4
                </option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==5) {?> selected="selected"<?php }?>>
                    5
                </option>
                <option value="6" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==6) {?> selected="selected"<?php }?>>
                    6
                </option>
                <option value="7" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==7) {?> selected="selected"<?php }?>>
                    7
                </option>
                <option value="8" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==8) {?> selected="selected"<?php }?>>
                    8
                </option>
                <option value="9" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==9) {?> selected="selected"<?php }?>>
                    9
                </option>
                <option value="10" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==10) {?> selected="selected"<?php }?>>
                    10
                </option>
                <option value="11" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==11) {?> selected="selected"<?php }?>>
                    11
                </option>
                <option value="12" <?php if ($_smarty_tpl->tpl_vars['search']->value['checkM']==12) {?> selected="selected"<?php }?>>
                    12
                </option>
            </select>
            <strong>月</strong>
        </div>
        <div class="down form-group">
            <strong>评分排序：</strong>
            <select class="selectpicker" data-width="100" id="sort" name="sort">
                <option value='0' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==0) {?> selected="selected"<?php }?>>待选择</option>
                <option value='1' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==1) {?> selected="selected"<?php }?>>评分由低到高</option>
                <option value='2' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==2) {?> selected="selected"<?php }?>>评分由高到低</option>
                <option value='3' <?php if ($_smarty_tpl->tpl_vars['search']->value['sort']==3) {?> selected="selected"<?php }?>>未有评分项</option>
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
" <?php if ($_smarty_tpl->tpl_vars['search']->value['status']==$_smarty_tpl->tpl_vars['key']->value) {?> selected="selected"<?php }?> ><?php echo $_smarty_tpl->tpl_vars['statu']->value;?>
</option>
                <?php } ?>
            </select>
            <input type="submit" class="btn btn-success" value="确定" type="button" >
        </div>
        <hr>
        <div class="bottom-input">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon" id="searchLabel">搜索</span>
                    <input type="text" class="form-control" placeholder="上报公司 报名人员 案例名称" aria-describedby="searchLabel"
                           id="search-input" name="content">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-warning w70" value="确定" type="button" >
                        </span>
                </div>
            </div>
            <div class="col-md-6">
                <!--<input class="btn btn-warning w100" value="批量下载" type="button">-->
                <input class="btn btn-warning w100" value="批量审核通过" type="button" id="pass">
                <input class="btn btn-warning w150" value="批量审核不通过" type="button" id="decline">
            </div>
        </div>
        </form>
    </div>
    <?php  $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cid']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cidArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cid']->key => $_smarty_tpl->tpl_vars['cid']->value) {
$_smarty_tpl->tpl_vars['cid']->_loop = true;
?>
        <td><?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
</td>
    <?php } ?>
    <div class="tab-content col-md-12">
        <table class="table table-bordered caseTable" data-toggle="table" id="caseListTable">
            <!--data-pagination="true" data-striped="true" data-sort-name="6"
               data-sort-order="desc" data-pagination="true" data-search="true" -->
            <thead class="thead-inverse">
            <tr>
                <th><input id="checkAll" type="checkbox"/> 全选</th>
                <th>案例名称</th>
                <th>提报奖项</th>
                <th>上传公司</th>
                <th>用户姓名</th>
                <th>手机号</th>
                <th>报名时间</th>
                <th>审核状态</th>
                <th>审核时间</th>
                <th>审核人员</th>
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
                <td><input type="checkbox" name="subBox" value="<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
"></td>
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
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['company'];?>
</td>
                <td><a href="/index.php/manager/user/openUserInfo?uid=<?php echo $_smarty_tpl->tpl_vars['case']->value['uid'];?>
&cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
&type=1"><?php echo $_smarty_tpl->tpl_vars['case']->value['username'];?>
</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['mobile'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['case']->value['create_time'],"%Y-%m-%d");?>
</td>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='1') {?><td>等待审核</td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='2') {?><td>审核通过</td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='3') {?><td>审核未通过</td><?php }?>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['case']->value['check_time'],"%Y-%m-%d");?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['checkpeople'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['score'];?>
</td>
                <td>
                    <a href="/index.php/manager/cases/caseopen?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
">查看详情</a>
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
    <div class="page clearfix">
        <div class="fr">
            <div class="fr">
                <?php if ($_smarty_tpl->tpl_vars['sumpage']->value=='2') {?>
                <div class="fl go  page_bg" id="first">1</div>
                <div class="fl go  page_bg" id="second"><?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
</div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sumpage']->value>='3') {?>
                <div class="fl go " id="indexpage">首页</div>
                <div class="fl go " id="uppage">上一页</div>
                <div class="fl go  page_bg" ><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                <div class="fl go  page_bg">...</div>
                <div class="fl go  page_bg"><?php echo $_smarty_tpl->tpl_vars['sumpage']->value;?>
</div>
                <div class="fl go " id="downpage">下一页</div>
                <div class="fl go " id="lastpage">尾页</div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
