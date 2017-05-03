<?php /* Smarty version Smarty-3.1.18, created on 2017-03-27 20:10:04
         compiled from "application/views/api/case/casesubmit.html" */ ?>
<?php /*%%SmartyHeaderCode:99250487358d9011c330764-22470438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59728a50849edc0a2219cb59c4ac714989a5466f' => 
    array (
      0 => 'application/views/api/case/casesubmit.html',
      1 => 1488791874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99250487358d9011c330764-22470438',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58d9011c38c3b7_46160455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d9011c38c3b7_46160455')) {function content_58d9011c38c3b7_46160455($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="part twpart2 wrap twpart">
    <div class="title">
        奖项提报
    </div>

    <div class="main_zh clearfix">

        <ul class=" nav-stacked col-xs-2 userNav" id="myTab">
            <li><a href="/index.php/api/user/userinfo">个人信息</a></li>
            <li class="act"><a href="/index.php/api/cases/casesubmit">案例提交</a></li>
            <li><a href="/index.php/api/user/mycase">作品查询</a></li>
        </ul>
        <div class="awardWarpDiv col-xs-10">
            <ul class="twtag clearfix">
                <li class="on">
                    案例类奖项
                </li>
                <li>
                    非案例类奖项
                </li>
            </ul>
            <ul class="awardWrap">
                <form name="formCase" method="post" action="/index.php/api/cases/casesubmitact"
                      enctype="multipart/form-data" target="_self">
                    <input type="hidden" name="uid" id="uid" value="<?php echo get_cookie('uid');?>
"/>
                    <li class="caseAward on awardLi">
                        <div class="csjx pad mb">
                            <div class="csjx_div">
                                <div class="ftitle">案例类文档</div>
                                <div class="nocase nocase1">
                                    <div class="dllist cf case_detail" id="case_detail">
                                        <ul class="ul3 pad ul2 mb zw_a">
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>广告主名称：</span>
                                                    <input type="text" class="form-control"
                                                           aria-describedby="basic-addon3" name="advertiser">
                                                </div>
                                                <!--<label><span class="red" style="font-size: 20px; vertical-align: bottom">*</span>广告主名称：</label>
                                                <input type="text" name="advertiser" class="form-control">-->
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>广告主LOGO：</span>
                                                    <input type="file" class="form-control"
                                                           id="file1" name="advertiser_logo">
                                                </div>
                                                <p class="col-xs-12">图片格式为jpg　尺寸(120*60)</p>
                                            </li>


                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>代理公司名称：</span>
                                                    <input type="text" name="agency_company" class="form-control">
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon "><em class="red"> * </em>代理公司LOGO：</span>
                                                    <input type="file" class="form-control"
                                                           id="file2" name="agency_company_logo">

                                                </div>
                                                <p class="col-xs-12">图片格式为jpg　尺寸(120*60)</p>
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>案例名称：</span>
                                                    <input type="text" name="title" class="form-control">
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>作品主视觉：</span>
                                                    <input type="file" class="form-control"
                                                           id="file3" name="visual_url">

                                                </div>
                                                <p class="col-xs-12">图片格式为jpg　尺寸(500*355px)</p>
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="red"> * </em>上传参赛作品：</span>
                                                    <!--<input type="file"  class="inputtext inputtext1 form-control" id="file4" name="url">-->
                                                    <input type="file" class="form-control" id="file4" name="url">
                                                </div>
                                                <p class="col-xs-12">
                                                    请将案例PPT保存成为微软97-2003版本的兼容格式文件 <br>
                                                    文件大小请小于10M
                                                </p>
                                            </li>
                                            <li class="clearfix">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><em class="holderBlock"></em>上传视频：</span>
                                                    <input type="file" class="form-control"
                                                           id="file5" name="video_url">
                                                </div>
                                                <p class="col-xs-12">
                                                    视频格式为MP4,容量限制：50M；
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="ftitle">参赛选项</div>
                                <div class="nocase nocase1">
                                    <div class="dllistWrap clearfix">
                                        <dl class="dllist cf on">
                                            <dt>
                                            <div class="csjx_title">场景类</div>
                                            </dt>
                                            <dd class="cf on">
                                                <!-- <label style="display:none">
                                                     <input name="award[]" type="checkbox" value="1" data-rule="checked" /><span>场景类</span></label>-->
                                                <label>
                                                    <input name="award[]" type="checkbox" value="2" data-rule="checked"/><span>场景营销类</span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox" value="3"/><span>移动营销类</span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox" value="22"/><span>大屏营销类</span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox" value="4"/><span>电商O2O类</span></label>
                                            </dd>
                                        </dl>
                                        <dl class="dllist cf on">
                                            <dt>
                                            <div class="csjx_title">智能类</div>
                                            </dt>
                                            <dd class="cf">
                                                <!--<label style="display:none">
                                                    <input name="award[]" type="checkbox" value="5" /><span>技术类营销大奖 </span></label>-->
                                                <label>
                                                    <input name="award[]" type="checkbox" value="27"/><span>智能营销类</span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox" value="6"/><span>大数据营销类</span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="23"/><span>AR/VR营销类</span> </label>
                                                <!-- <label>
                                                     <input name="award[]" type="checkbox" value="19" /><span>H5营销类</span> </label>-->
                                            </dd>
                                        </dl>
                                        <dl class="dllist cf on">
                                            <dt>
                                            <div class="csjx_title">原生类</div>
                                            </dt>
                                            <dd class="cf">
                                                <!-- <label style="display:none">
                                                     <input name="award[]" type="checkbox" value="8" /><span>原生营销大奖</span></label>-->
                                                <label>
                                                    <input name="award[]" type="checkbox" value="9"/><span>情感营销类</span></label>
                                                <!-- <label>
                                                     <input name="award[]" type="checkbox" value="10" /><span>娱乐营销类</span> </label>-->
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="11"/><span>社会化营销类</span></label>
                                            </dd>
                                        </dl>
                                        <dl class="dllist cf on">
                                            <dt>
                                            <div class="csjx_title">体育类</div>
                                            </dt>
                                            <dd class="cf">
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="13"/><span>体育营销类 </span></label>
                                            </dd>
                                        </dl>
                                        <dl class="dllist cf on">
                                            <dt>
                                            <div class="csjx_title">公益类</div>
                                            </dt>
                                            <dd class="cf">
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="12"/><span>公益营销类 </span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="24"/><span>健康营销类 </span></label>
                                            </dd>
                                        </dl>

                                        <dl class="dllist cf on last">
                                            <dt>
                                            <div class="csjx_title">泛娱乐类</div>
                                            </dt>
                                            <dd class="cf">
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="25"/><span>直播营销类 </span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="10"/><span>娱乐营销类 </span></label>
                                                <label>
                                                    <input name="award[]" type="checkbox"
                                                           value="26"/><span>短视频营销类 </span></label>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="caseAward awardLi">
                        <div class="csjx_div">
                            <div class="ftitle">申报材料</div>
                            <div class="nocase nocase2">
                                <dl class="dllist cf case_detail" id="nocase_detail">

                                    <ul class="ul3 pad ul2 mb zw_a">
                                        <li class="clearfix">
                                            <div class="input-group">
                                                <span class="input-group-addon"><em class="red"> * </em>报送公司：</span>
                                                <input type="text" id="" name="no_case_advertiser" class="form-control">
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="input-group">
                                                <span class="input-group-addon"><em class="holderBlock"></em>广告主LOGO：</span>
                                                <input type="file" class="form-control"
                                                       id="no_case_file1" name="no_case_advertiser_logo">

                                            </div>
                                            <p class="col-xs-12">图片格式为jpg　尺寸(120*60)</p>
                                        </li>
                                        <li class="clearfix">
                                            <div class="input-group">
                                                <span class="input-group-addon"><em class="holderBlock"></em>人物照片：</span>
                                                <input type="file" class="form-control"
                                                       id="no_case_file3" name="no_case_visual_url">
                                            </div>
                                            <p class="col-xs-12">图片格式为jpg　尺寸(大小不超过2M)</p>
                                        </li>
                                        <li class="clearfix">
                                            <div class="input-group">
                                                <span class="input-group-addon"><em class="red"> * </em>上传申报资料：</span>
                                                <input type="file" class="form-control"
                                                       id="no_case_file4" name="no_case_url">
                                            </div>
                                            <p class="col-xs-12">请将word保存成为微软97-2003版本的兼容格式文件</p>
                                        </li>
                                    </ul>
                                </dl>
                            </div>
                            <div class="ftitle">参选奖项</div>
                            <div class="nocase nocase2">
                                <div class="nocaseDllistWrap clearfix">
                                    <dl class="dllist cf on">
                                        <dt>
                                        <div class="csjx_title">人物类</div>
                                        </dt>
                                        <dd class="cf on">
                                            <label><input name="award[]" type="checkbox"
                                                          value="14" data-rule="checked"/><span>年度网络营销领军人物</span></label>
                                            <label>
                                                <input name="award[]" type="checkbox"
                                                       value="15"/><span>年度网络营销新锐人物</span></label>
                                        </dd>
                                    </dl>
                                    <dl class="dllist cf on">
                                        <dt>
                                        <div class="csjx_title">品牌类</div>
                                        </dt>
                                        <dd class="cf on">
                                            <label>
                                                <input name="award[]" type="checkbox"
                                                       value="17"/><span>年度网络营销最佳品牌主</span></label>
                                        </dd>
                                    </dl>
                                    <dl class="dllist cf on">
                                        <dt>
                                        <div class="csjx_title">产品类</div>
                                        </dt>
                                        <dd class="cf on">
                                            <label>
                                                <input name="award[]" type="checkbox"
                                                       value="18"/><span>年度网络营销优秀产品及工具</span></label>
                                        </dd>
                                    </dl>
                                    <dl class="dllist cf on">
                                        <dt>
                                        <div class="csjx_title">排行榜</div>
                                        </dt>
                                        <dd class="cf on">
                                            <label>
                                                <input name="award[]" type="checkbox" value="16"/><span>年度网络营销最佳数字代理机构排行榜</span></label>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div class="hiddenPayType hidden">
                        <div class="title">
                            支付方式
                        </div>
                        <div class="csjx_div paylabel">
                            <dl class="dllist cf on">
                                <dt>
                                    <label><input name="paytype" type="radio" value="1"/><span>支付宝支付</span></label>
                                    <label><input name="paytype" type="radio" value="2" checked="checked"/><span>线下支付</span></label>
                                </dt>
                            </dl>
                        </div>
                        <div class="zw_a none zw_a1"><img src="/static/api/images/erb.jpg" width="430" height="430"/></div>
                        <div class="zw_a none zw_a2"><img src="/static/api/images/erb.jpg" width="430" height="430"/></div>
                        <div class="zw_a none zw_a3"><img src="/static/api/images/erb.jpg" width="430" height="430"/></div>
                        <div class="zw_a none zw_a4"><img src="/static/api/images/erb.jpg" width="430" height="430"/></div>
                        <div class="zw_a none zw_a5"><img src="/static/api/images/erb.jpg" width="430" height="430"/></div>
                    </div>

                    <div class="twentySubmitWrap">
                        <input type="submit" value="提交" class="submitBtn twentySubmit" id="submitBtn">
                    </div>
                </form>
                <div class="userInfo">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['company'];?>
" id="hideCompany">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['contact'];?>
" id="hideContact">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['email'];?>
" id="hideEmail">
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['mobile'];?>
" id="hideTelephone">
                </div>
            </ul>
        </div>

    </div>
    <div id="msg_holder"></div>

</div>
<!--<div style="position:fixed; right:50px; top:103px;"><img src="/static/api/images/erb.jpg" width="130" height="130"/>
</div>-->
<div class="jiazai"
     style="position:fixed; display:none; left:0px; top:0px; width:100%; height:100%; background:#000; opacity:0.7;filter:alpha(opacity=0.7); z-index:999;">
    <div style="color:#fff; font-size:34px; text-align:center; line-height:600px; font-weight:bold;">上传中请稍等...</div>
</div>
<script type="text/javascript">
    //选择相应选项，显示对应填报内容
    /*$(".nocase input[type='checkbox']").on("change", function () {
     var now_nocase = $(this).closest(".nocase");
     var now_nocase_detail = $(this).closest(".nocase").find(".case_detail");
     var checkbox_num = $(now_nocase).find("input[type='checkbox']:checked").length;
     if (checkbox_num > 0) {
     now_nocase_detail.show();
     } else {
     now_nocase_detail.hide().find("input").val("");
     };
     });*/
    $(function () {
        var tagsLi = $(".twtag li");
        var awardLi = $(".awardLi");
        tagsLi.on("click", function () {
            var num = $(".twtag li").index(this);
            tagsLi.removeClass("on");
            $(this).addClass("on");
            awardLi.removeClass("on");
            awardLi.eq(num).addClass("on");
        });
        var submitBtn = $("#submitBtn");
        var hideCompany = $("#hideCompany").val();
        var hideContact = $("#hideContact").val();
        var hideEmail = $("#hideEmail").val();
        var hideTelephone = $("#hideTelephone").val();
        var info = false;
        if (hideCompany && hideContact && hideEmail && hideTelephone){
            info = true;
        }
        submitBtn.on("click",function(){
            if (!info){
                alert("因您的用户信息未能完善，为避免给您带来损失，请完善相关信息后提交案例");
                window.open("/index.php/api/user/userinfo","_self");
                return false;
            }else{
                return true;
            }
        });
    })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("../common/footer_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
