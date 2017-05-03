<?php /* Smarty version Smarty-3.1.18, created on 2017-04-14 14:50:32
         compiled from "application\views\manager\user\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1682558f0713878bec1-85203297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '532e311201dda719bef12a15580c13a7a87240db' => 
    array (
      0 => 'application\\views\\manager\\user\\index.html',
      1 => 1490600834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1682558f0713878bec1-85203297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usersum' => 0,
    'sums' => 0,
    'pingweiNum' => 0,
    'search' => 0,
    'casesum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58f07138825467_06084886',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f07138825467_06084886')) {function content_58f07138825467_06084886($_smarty_tpl) {?><script type="text/javascript" src="/static/swfobject.js"></script> 
<script type="text/javascript"> 
var flashvars = {"data-file":"/index.php/manager/user/indeximg"}; //这里是数据源  
var params = {menu: "false",scale: "noScale",wmode:"opaque"};  
swfobject.embedSWF("/static/open-flash-chart.swf", "chart", "430px", "330px", 
 "9.0.0","/static/expressInstall.swf", flashvars,params);
</script> 

<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main main_index clearfix  fYaHei">
    <!--第一部分-->
    <div class=" clearfix index_list">
        <div class="list_a pr fYaHei fl">
            <div class="shz pa bgz"></div>
            <div class="list_an">
                <div class="tc mb15"><img src="/static/manager/images/s1_03.png" width="42" height="35"></div>
                <div class="f16 graydeep">用户总数：<?php echo $_smarty_tpl->tpl_vars['usersum']->value;?>
</div>
            </div>
        </div>
        <div class="list_a pr fYaHei fl">
            <div class="shz pa bglv"></div>
            <div class="list_an">
                <div class="tc mb15"><img src="/static/manager/images/s2_03.png" width="28" height="34"></div>
                <div class="f16 graydeep">案例总数：<?php echo $_smarty_tpl->tpl_vars['sums']->value;?>
</div>
            </div>
        </div>
        <div class="list_a pr fYaHei fl">
            <div class="shz pa bglv"></div>
            <div class="list_an">
                <div class="tc mb15"><img src="/static/manager/images/s2_03.png" width="28" height="34"></div>
                <div class="f16 graydeep">评委总数：<?php echo $_smarty_tpl->tpl_vars['pingweiNum']->value;?>
</div>
            </div>
        </div>
    </div>
    <!--第二部分-->
    <div>
        <form name="formCase" id="formCase" method="get" action="/index.php/manager/user/index">
            <select id="commitY" name="commitY">
                <option value="2017" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2017) {?> selected="selected"<?php }?>>2017</option>
                <option value="2016" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2016) {?> selected="selected"<?php }?>>2016</option>
                <option value="2015" <?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2015) {?> selected="selected"<?php }?>>2015</option>
            </select>
            <input type='submit' class="btn btn-success" value="确定" type="button">
        </form>
    </div>
    <!--第三部分-->
    <div class="data_sheet fYaHei">
        <div class="f18 graydeep mb10">案例概览</div>
        <div class="clearfix">
            <div class="fl clearfix mt30">
                <div class="fl mt10 mr10">
                    <img src="/static/manager/images/ss_03.png" width="15" height="108"> 
                </div>
                <div class="fl graydeep mt2 f14 lh220">
                <P>全部案例数量：<?php echo $_smarty_tpl->tpl_vars['sums']->value;?>
</P>
                <P>待审核案例数量：<?php echo $_smarty_tpl->tpl_vars['casesum']->value[1];?>
</P> 
                <P>已审核案例数量：<?php echo $_smarty_tpl->tpl_vars['casesum']->value[2];?>
</P> 
                <P>未通过审核案例数量：<?php echo $_smarty_tpl->tpl_vars['casesum']->value[3];?>
</P>
                </div>
            </div>
            <div class="fr mr30">
            <div id="chart"></div>  
           <!--  <img src="/static/manager/images/hl_03.png" width="189" height="189"> --> 
           </div>
        </div>
    </div>
</div>
<?php }} ?>
