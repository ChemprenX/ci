<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 17:53:06
         compiled from "application/views/api/case/casepay.html" */ ?>
<?php /*%%SmartyHeaderCode:34576826658db8402d16438-86915443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5281031a701f029ce83a08ba6be065ea64b50165' => 
    array (
      0 => 'application/views/api/case/casepay.html',
      1 => 1490175112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34576826658db8402d16438-86915443',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db8402d503c7_36305492',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db8402d503c7_36305492')) {function content_58db8402d503c7_36305492($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="payment col-md-10">
    <ul class=" nav-stacked col-md-2 userNav" id="myTab">
        <li><a href="/index.php/api/user/userinfo">个人信息</a></li>
        <li><a href="/index.php/api/cases/casesubmit">案例提交</a></li>
        <li class="act"><a href="/index.php/api/user/mycase">作品查询</a></li>
    </ul>
    <div class="col-md-10">
        <h3>
            付款奖项总额：（￥<span id="paymentNum" class="paymentNum">1100</span>）
        </h3>
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>案例</th>
                <th>参评奖项</th>
            </tr>
            </thead>
            <tbody id="caseList">
            </tbody>
        </table>
        <div class="paymentChose">
            <ul class="twtag clearfix">
                <li class="on">线上支付</li>
                <li>线下支付</li>
            </ul>
            <ul class="payTypeUl">
                <li class="on">
                    <div class="clearfix">
                        <div class="qcode fl">
                            <img src="/static/api/images/2017/qc.jpg" id="qcodeImg">
                            <div id="nocase-info" style="display: none;">
                                <h4>付款信息</h4>
                                <table class="table">
                                    <tr>
                                        <td>收款单位：</td>
                                        <td>重庆天极网络有限公司</td>
                                    </tr>
                                    <tr>
                                        <td>开 户 行：</td>
                                        <td>重庆三峡银行股份有限公司北部新区支行</td>
                                    </tr>
                                    <tr>
                                        <td>开户行地址：</td>
                                        <td>重庆市北部新区青枫南路81号</td>
                                    </tr>
                                    <tr>
                                        <td>帐 号：</td>
                                        <td>0109 0142 1000 2082</td>
                                    </tr>
                                    <tr>
                                        <td>纳税人识别码 <br>（税号）：</td>
                                        <td>5009 0520 3938 090</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <form name="formInvoice" method="post" action="/index.php/api/cases/invoicesubmitact?type=1"
                              enctype="multipart/form-data" target="_self">
                            <div class="formTable fl">
                                <h3><span id="online">线上付款需加收0.2%提现手续费，</span>你需要支付￥ <span class="paymentNum" id="tax">XXXX</span>元。
                                </h3>
                                <h4>付款成功后请截图付款成功页面，需要增值税的用户请提供相关信息以方便我们为您准备发票。</h4>
                                <h5> 付款凭证</h5>
                                <input type="file" class="form-control" id="" name="pay_prove">
                                <h5>增值税发票信息</h5>
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
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $(function () {
        var tagsLi = $(".twtag li");
        var qcodeImg = $("#qcodeImg");
        var nocase_info = $("#nocase-info");
        tagsLi.on("click", function () {
            var amount = $("#paymentNum").html();
            var num = $(".twtag li").index(this);
            tagsLi.removeClass("on");
            $(this).addClass("on");
            if (num == 0) {
                $("#online").show();
                amount = amount * 1.002;
                amount = parseInt(amount);
                $("#tax").html(amount);
                qcodeImg.show();
                nocase_info.hide();
            } else {
                amount = amount;
                $("#tax").html(amount);
                $("#online").hide();
                qcodeImg.hide();
                nocase_info.show();
            }
        });
        var total_amount = $.getUrlParam('total_amount');
        var count = $.getUrlParam('count');
        $("#paymentNum").html(total_amount);
        $("#tax").html(total_amount * 1.002);
        var domStr = "";
        for (var i = 0; i < count; i++) {
            var casenum = "casenameArr" + i + "";
            var casename = $.getUrlParam(casenum);
            casename = decodeURIComponent(casename);
            var awardnum = "awardnameArr" + i + "";
            var awardname = $.getUrlParam(awardnum);
            awardname = decodeURIComponent(awardname);
            var amountNum = "amountArr" + i + "";
            var amount = $.getUrlParam(amountNum);
            domStr += "<tr><td><input type='checkbox' checked='checked' class='checkedInput'></td><td>" + casename + "</td><td>" + awardname + "</td><td class='hideAmount' style='display: none;'>" + amount + "</td></tr>"
        }
        $("#caseList").html(domStr);
        var totalAmount = $("#paymentNum");
        $(".checkedInput").on('change', function () {
            var amount = $(this).closest("tr").find(".hideAmount").html();
            if (this.checked) {
                var currentAmount = totalAmount.html();
                var next = parseInt(currentAmount) + parseInt(amount);
                totalAmount.html(next);
            } else {
                var currentAmount = totalAmount.html();
                var next = currentAmount - amount;
                totalAmount.html(next);
            }
        })
    });
    (function ($) {
        $.getUrlParam = function (name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        }
    })(jQuery);
</script>
</body>
</html>
<?php }} ?>