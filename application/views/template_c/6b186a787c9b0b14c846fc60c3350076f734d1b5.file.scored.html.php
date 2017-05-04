<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 17:06:10
         compiled from "application/views/manager/judges/scored.html" */ ?>
<?php /*%%SmartyHeaderCode:182832918858db79021ec787-38919639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b186a787c9b0b14c846fc60c3350076f734d1b5' => 
    array (
      0 => 'application/views/manager/judges/scored.html',
      1 => 1490263146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182832918858db79021ec787-38919639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sum' => 0,
    'records' => 0,
    'record' => 0,
    'sumpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db7902487ce4_84321844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db7902487ce4_84321844')) {function content_58db7902487ce4_84321844($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>金网奖</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="css/base.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/base.js" type="text/javascript"></script>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="main clearfix  fYaHei">
    <div class="case_man">
        <!-- <div class="main_tl main_jiaoy mb20">
            <form name="formSearch" id="formSearch" method="get" action="/index.php/manager/record/recordlist">
                <div class="clearfix ">
                    <div class="fl f14 mr10 graydeep"><input placeholder="想要找..." value="" id="title" name="title"
                                                             class="ml5 cz pl10 w200"></div>
                    <div class="fl"><input type="submit" value="查询" class="aka fl mr5 cx white"></div>
                    <div class="fl clearfix">
                        <p class="scoretype fl">分数类别：</p>
                        <div CLASS="selectwrap fl" >
                            <select style="width:90%">
                                <option value ="总分：xxx">-全部-</option>
                                <option value ="评分项1(xx%:xx)">最低分</option>
                                <option value="评分项1(xx%:xx)">最高分</option>
                                <option value="评分项1(xx%:xx)">被作废</option>
                                <option value="评分项1(xx%:xx)">有效分</option>
                            </select>
                        </div>
                        <div CLASS="selectwrap fl" >
                            <select style="width:90%">
                                <option value ="总分：xxx">默认排序</option>
                                <option value ="评分项1(xx%:xx)">分数由低到高</option>
                                <option value="评分项1(xx%:xx)">分数由高到低</option>
                            </select>
                        </div>
                        <div CLASS="selectwrap fl" >
                            <select style="width:90%">
                                <option value ="总分：xxx">全部分类</option>
                                <option value ="评分项1(xx%:xx)">整合营销</option>
                                <option value="评分项1(xx%:xx)">单项类</option>
                                <option value="评分项1(xx%:xx)">行业特别奖</option>
                                <option value="评分项1(xx%:xx)">公益类</option>
                            </select>
                        </div>

                    </div>
                </div>

            </form>
        </div> -->
        <!-- <div class="chanel-name">总评分数：<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>
</div> -->
        <div class="main_td mt15 fYaHei mb20">
            <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tbody>
                <tr align="center" class="lbg">
                    <td width="50" height="50">序号</td>
                    <td>案例名称</td>
                    <td>广告主</td>
                    <td>类别</td>
                    <!-- <td>评分时间</td> -->
                    <td >评分</td>
                    <td>分数注释</td>
                    <td>监审注释</td>
                    <td>操作</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['record']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['records']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->_loop = true;
?>
                <tr align="center" height="50">
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['advertiser'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['award_code'];?>
</td>
                    <!-- <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['record']->value['create_time'],'%Y-%m-%d %H:%M:%S');?>
</td> -->
                    <td style="width:220px;">
                        <select style="width:90%">
                            <?php if ($_smarty_tpl->tpl_vars['record']->value['award_id']==1) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">线上线下整合(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">整体策略与执行(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">营销效果(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">创意与传播(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==2) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">技术手段(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">互动性(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">到达率(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">创意(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==3) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">整合度(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">传播与影响(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">转化率(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">互动性(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==4) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">策略与执行(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">产品互动(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">营销效果(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">服务(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==5) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">科技与新技术应用(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">数据应用(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">投放效果(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">数据分析(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==6) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">创意(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">制作效果(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">传播与策略(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">新技术应用(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==7) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">创意(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">媒介整合(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">策略与执行(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">新技术应用(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==8) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">新技术应用(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">营销互动(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">创意设计(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">用户体验(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==9) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">营销投入(40%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">品牌提升(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">投资回报率(40%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                        <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['award_id']==18) {?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">互联网传播(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">执行与效果(30%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">创意(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">影响力(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                        <?php } else { ?>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
">总分：<?php echo $_smarty_tpl->tpl_vars['record']->value['score'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
">互联网新技术应用(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score1'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
">创意能力(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score2'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
">营销效果(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score3'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
">互联网传播与影响(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score4'];?>
</option>
                            <option value ="<?php echo $_smarty_tpl->tpl_vars['record']->value['score5'];?>
">策略与执行(20%):<?php echo $_smarty_tpl->tpl_vars['record']->value['score5'];?>
</option>
                        <?php }?>
                        </select>
                    </td>
                    <td></td>
                    <td>
                    <?php if ($_smarty_tpl->tpl_vars['record']->value['jsstatus']==1) {?>
                        <span>无</span>
                    <?php } else { ?>
                        <span>作废</span>
                    <?php }?>
                    </td>
                    <td>
                    <?php if ($_smarty_tpl->tpl_vars['record']->value['status']==1) {?>
                        <span><a href="/index.php/manager/record/updatestatus?id=<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
">作废</a></span>
                    <?php } else { ?>
                        <span><a href="/index.php/manager/record/updatestatus?id=<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
">取消作废</a></span>
                    <?php }?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="black">
            <div class="black-inner">
                <p class="success"><span class="zf zuofei">是否作废该分数</span><span class="zf qxzuofei">是否取消作废该分数</span></p><span class="x">X</span>
                <input type="button" class="click" value="确定"></p>
            </div>
        </div>
        <div class="page clearfix">
            <div class="fr">
                <div class="fr">
                    <div class="fl go " onclick="indexpage()">首页</div>
                    <div class="fl go " onclick="uppage()">上一页</div>
                    <div class="fl go  page_bg">1</div>
                    <div class="fl go " onclick="downpage()">下一页</div>
                    <div class="fl go " onclick="lastpage()" style=" border-right:1px solid #eeeeee;">尾页</div>
                </div>
            </div>
            <!--弹出修改 删除 none 可显示隐藏div-->
        </div>
    </div>
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
</div>
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
</script>
</body>

</html><?php }} ?>
