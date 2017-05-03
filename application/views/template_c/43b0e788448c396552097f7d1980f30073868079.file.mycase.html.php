<?php /* Smarty version Smarty-3.1.18, created on 2017-04-14 14:49:08
         compiled from "application\views\api\user\mycase.html" */ ?>
<?php /*%%SmartyHeaderCode:2028258f070e40b8b34-09090809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b0e788448c396552097f7d1980f30073868079' => 
    array (
      0 => 'application\\views\\api\\user\\mycase.html',
      1 => 1489654970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2028258f070e40b8b34-09090809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cases' => 0,
    'case' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f070e41d9fd2_77153341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f070e41d9fd2_77153341')) {function content_58f070e41d9fd2_77153341($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main_zh clearfix">

    <ul class=" nav-stacked col-md-2 userNav" id="myTab">
        <li ><a href="/index.php/api/user/userinfo">个人信息</a></li>
        <li><a  href="/index.php/api/cases/casesubmit">案例提交</a></li>
        <li class="act"><a href="/index.php/api/user/mycase">作品查询</a></li>
    </ul>
    <div class="tab-content col-md-10 mycase-list">
        <div class="clearfix">
            <H4 class="fl">案例类</H4>
            <a class="btn btn-info fr" href="/index.php/api/cases/casesubmit">添加作品</a>
            <a class="btn btn-info fr" href="javascript:;" id="merge">合并付款</a>
        </div>
        <table class="table table-bordered caseTable">
            <thead>
            <tr>
                <td><input type="checkbox" name="all"> 全选</td>
                <td>案例名称</td>
                <td>广告主</td>
                <td>代理公司</td>
                <td>案例资料</td>
                <td class="w90">参评奖项</td>
                <td class="w50">付款状态</td>
                <td class="w50">审核状态</td>
                <td class="w50">操作</td>
                <td style="display: none;">费用</td>
            </tr>
            </thead>
            <tbody style="font-size: 12px;">
            <?php  $_smarty_tpl->tpl_vars['case'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['case']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['case']->key => $_smarty_tpl->tpl_vars['case']->value) {
$_smarty_tpl->tpl_vars['case']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['case']->value['title']) {?>
            <tr>
                <td><input type="checkbox" name="case"></td>
                <td class="casename"><?php echo $_smarty_tpl->tpl_vars['case']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['advertiser'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['agency_company'];?>
</td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['url'];?>
">点击下载</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['aid'];?>
</td>
                <td>待付款</td>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='1') {?><td>等待审核</td><td><a href="/index.php/api/cases/updatecase?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['case']->value['uid'];?>
" target="_blank">修改</a></td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='2') {?><td>审核通过</td><td><a>完成</a></td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']=='3') {?><td class="pr no-pass">审核未通过 <span class="cause pa"><?php echo $_smarty_tpl->tpl_vars['case']->value['remark'];?>
</span></td><td><a href="/index.php/api/cases/updatecase?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
&uid=<?php echo $_smarty_tpl->tpl_vars['case']->value['uid'];?>
" target="_blank">修改</a></td><?php }?>
                <td style="display: none;" class="amount"><?php echo $_smarty_tpl->tpl_vars['case']->value['total_amount'];?>
</td>
            </tr>
            <?php }?>
            <?php } ?>
            </tbody>
        </table>

        <h4>
            非案例类
        </h4>
        <table class="table table-bordered noCaseTable">
            <thead>
            <tr>
                <td></td>
                <td>报送公司</td>
                <td>申报资料</td>
                <td>参评奖项</td>
                <td>付款状态</td>
                <td>审核状态</td>
                <td>操作</td>
                <td style="display: none">费用</td>
            </tr>
            </thead>

            <tbody>
            <?php  $_smarty_tpl->tpl_vars['case'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['case']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['case']->key => $_smarty_tpl->tpl_vars['case']->value) {
$_smarty_tpl->tpl_vars['case']->_loop = true;
?>
            <?php if (!$_smarty_tpl->tpl_vars['case']->value['title']) {?>
            <tr>

                <td><input type="checkbox" name="nocase"></td>
                <td class="casename"><?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_advertiser'];?>
</td>
                <td><a href="<?php echo $_smarty_tpl->tpl_vars['case']->value['no_case_url'];?>
">点击下载</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['case']->value['aid'];?>
</td>
                <td>待付款</td>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']==1) {?><td>等待审核</td><td><a href="/index.php/api/cases/updatecase?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
" target="_blank">修改</a></td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']==2) {?><td>审核通过</td><td><a>完成</a></td><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['case']->value['status']==3) {?><td class="pr no-pass">审核未通过 <span class="cause pa"><?php echo $_smarty_tpl->tpl_vars['case']->value['remark'];?>
</span></td><td><a href="/index.php/api/cases/updatecase?cid=<?php echo $_smarty_tpl->tpl_vars['case']->value['cid'];?>
" target="_blank">修改</a><?php }?>
                <td style="display: none;" class="amount"><?php echo $_smarty_tpl->tpl_vars['case']->value['total_amount'];?>
</td>
            </tr>
            <?php }?>
            <?php } ?>
            </tbody>

        </table>
    </div>

</div>
<script>

$(function (){
    var awardArr = {
        '2':'场景营销类',
        '3':'移动营销类',
        '22':'大屏营销类',
        '4':'电商O2O类',
        '6':'大数据营销类',
        '23':'VR-AR营销类',
        '9':'情感营销类',
        '11':'社会化营销类',
        '13':'体育营销类',
        '12':'公益营销类',
        '24':'健康营销类',
        '25':'直播营销类',
        '10':'娱乐营销类',
        '26':'短视频营销类',
        '14':'年度网络营销领军人物',
        '15':'年度网络营销新锐人物',
        '16':'年度网络营销最佳数字代理机构排行榜',
        '17':'年度网络营销最佳品牌主',
        '18':'年度网络营销优秀产品及工具',
        '27':'智能营销类'
    }
    $(".caseTable tbody").find("tr").each(function(){
        var tdArr = $(this).children();
        var isExist = tdArr.eq(7).html();
        var str = tdArr.eq(5).html();
        var strinput = " <input class='strinput' type='hidden' value='"+str+"'>";
        var domstr = replaceStr(awardArr,str);
        tdArr.eq(5).html(domstr + " <input class='strinput' type='hidden' value='"+domstr+"'>");

        if (isExist){
            var checkStatus = tdArr.eq(7).html().trim();
            if (checkStatus != "审核通过"){
                $(this).css("background","#eee");
                tdArr.eq(0).find("input").attr("disabled","disabled");
            }
        }
    });
    $(".noCaseTable tbody").find("tr").each(function(){
        var tdArr = $(this).children();
        var isExist = tdArr.eq(5).html();
        var str = tdArr.eq(3).html();
        var strinput = " <input class='strinput' type='hidden' value='"+str+"'>";
        var domstr = replaceStr(awardArr,str);
        tdArr.eq(3).html(domstr+ " <input class='strinput' type='hidden' value='"+domstr+"'>");
        if (isExist){
            var checkStatus = tdArr.eq(5).html().trim();
            if (checkStatus != "审核通过"){
                $(this).css("background","#eee");
                tdArr.eq(0).find("input").attr("disabled","disabled");
            }
        }
    });
    var total_amount = 0;
    var casename = "";
    var casenameArr = new Array();
    var awardnameArr = new Array();
    var amountArr = new Array();
    var awardname = "";
    var count = 0;
    var obj = {};
    var isAll = false;
    $("table").find("input[type=checkbox]").attr("checked",false);
    $("table").find("input[type=checkbox]"&&"input[name!='all']").on("click", function(){
        if (isAll){
            isAll = false;
           /* clean();*/
        }
       // $(this).closest('table').find('input[type="checkbox"]').attr('checked',false);
        if (this.checked){
            var amount = $(this).closest("tr").find(".amount").html();
            amount = parseInt(amount);
            total_amount += amount;
            var caseInnerName = $(this).closest("tr").find(".casename").html();
            //casename += caseInnerName+"|";
            casename = caseInnerName;
            casename = encodeURIComponent(casename);
            casenameArr.push(casename);
            var awardInnerName = $(this).closest("tr").find(".strinput").val();
            var amountNum = $(this).closest("tr").find(".amount").html();
            awardname = awardInnerName;
            awardname = encodeURIComponent(awardname);
            awardnameArr.push(awardname);
            amountArr.push(amount);
            count += 1;
            obj.count = count;
            obj.total_amount = total_amount;
            obj.casenameArr = casenameArr;
            obj.awardnameArr = awardnameArr;
            obj.amountArr = amountArr;
        }else {
            $('input[name="all"]').attr('checked',false);
            var amount = $(this).closest("tr").find(".amount").html();
            amount = parseInt(amount);
            total_amount -= amount;
            var caseInnerName = $(this).closest("tr").find(".casename").html();
            //casename += caseInnerName+"|";
            casename = caseInnerName;
            casename = encodeURIComponent(casename);
            casenameArr.pop(casename);
            var awardInnerName = $(this).closest("tr").find(".strinput").val();
            var amountNum = $(this).closest("tr").find(".amount").html();
            awardname = awardInnerName;
            awardname = encodeURIComponent(awardname);
            awardnameArr.pop(awardname);
            amountArr.pop(amount);
            count -= 1;
            obj.count = count;
            obj.total_amount = total_amount;
            obj.casenameArr = casenameArr;
            obj.awardnameArr = awardnameArr;
            obj.amountArr = amountArr;
        }
    });
    function clean(){
        total_amount = 0;
        casename = "";
        casenameArr = [];
        awardnameArr = [];
        amountArr = [];
        awardname = "";
        count = 0;
        obj = {};
    }

    $('table input[name="all"]').on("click", function () {
        //反选
        if (isAll){
            clean();
            $("table tbody").find("tr").each(function () {
                var tdArr = $(this).children();
                var checkInput = tdArr.eq(0).find("input");
                var status =checkInput.attr("disabled");
                if (status !== "disabled"){
                    if(checkInput[0].checked != false){
                        checkInput[0].click();
                    };
                    isAll = false;
                }
            });

        }//正选
        else {
            clean();
            $("table tbody").find("tr").each(function () {
                var tdArr = $(this).children();
                var checkInput = tdArr.eq(0).find("input");
                var status =checkInput.attr("disabled");
                if (status !== "disabled"){
                    if(checkInput[0].checked != true){
                        checkInput[0].click();
                    };
                    isAll = true;
                }
            });
        }
    });


    $("#merge").on('click',function(){
        if (total_amount == 0){
            alert("请勾选需要付款项目");
        }else {
            obj = urlEncode(obj);
            var href = "/index.php/api/cases/casepay?obj="+obj;
            window.open(href,'_self');
        }
    });
});
/*替换中文*/
function replaceStr(awardArr,str){
    if (str){
        var domStr = "";
        var strArr = str.split(",");
        for (var i =0; i<strArr.length; i++){
            var awardStr = awardArr[strArr[i]];
            domStr += awardStr;
            if ( i < strArr.length -1){
                domStr += "\n";
            }
        }
        return domStr;
    }
}
/*编码*/
var urlEncode = function (param, key, encode) {
    if(param==null) return '';
    var paramStr = '';
    var t = typeof (param);
    if (t == 'string' || t == 'number' || t == 'boolean') {
        paramStr += '&' + key + '=' + ((encode==null||encode) ? encodeURIComponent(param) : param);
    } else {
        for (var i in param) {
            var k = key == null ? i : key + (param instanceof Array ? '[' + i + ']' : '.' + i);
            paramStr += urlEncode(param[i], k, encode);
        }
    }
    paramStr = paramStr.replace("[","");
    paramStr = paramStr.replace("]","");
    return paramStr;
};
</script>
<?php }} ?>
