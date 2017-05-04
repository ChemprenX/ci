<?php /* Smarty version Smarty-3.1.18, created on 2017-03-29 17:06:37
         compiled from "application/views/manager/judges/setjudges.html" */ ?>
<?php /*%%SmartyHeaderCode:23050610458db791defbfe1-63343627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a510c38c73d18f602e5a6893437a400fe4dc27b6' => 
    array (
      0 => 'application/views/manager/judges/setjudges.html',
      1 => 1490427770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23050610458db791defbfe1-63343627',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'judgesinfo' => 0,
    'grouplist' => 0,
    'group' => 0,
    'search' => 0,
    'records' => 0,
    'record' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58db791e298c98_55513642',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58db791e298c98_55513642')) {function content_58db791e298c98_55513642($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/75/jinwangjiang/application/libraries/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
<head >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>金网奖-设置评委</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="/static/manager/css/base.css" rel="stylesheet">
    <link href="/static/manager/css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/manager/css/jquery.bigautocomplete.css" type="text/css" />
    <script src="/static/manager/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/static/manager/js/base.js" type="text/javascript"></script>
</head>
<body class="setjudges">
<?php echo $_smarty_tpl->getSubTemplate ("../common/header_navigation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main clearfix  fYaHei">
    <div class="case_man">
        <form name="formSearch" id="formSearch" method="post" action="/index.php/manager/judges/setjudgesact">
            <div class="main_tl main_jiaoy mb20">
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['user_id'];?>
" id="uid" name="uid">
            </div>
            <div class="tab-content col-md-12">
                <strong>评委信息：</strong>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>评委姓名：</span>
                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['realname'];?>
" disabled="true" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>所属公司：</span>
                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['company'];?>
" disabled="true" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>联系手机：</span>
                                <input type="text" value="" disabled="true" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>公司介绍：</span>
                                <input type="text" value="" disabled="true" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-content col-md-12">
                <strong>账号信息：</strong>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>登录账号：</span>
                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['username'];?>
" disabled="true" class="form-control">
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon"><em class="holderBlock"></em>登录密码：</span>
                                <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['password'];?>
" disabled="true" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
            <!--<div class="setjudges_table main_td mt15 fYaHei mb20">
                <strong>评委信息：</strong>
                <table width="400px"  cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="intname"><span class="red">*</span>评委名称：</td>
                        <td class="intinput"><input type="text" name="realname" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['realname'];?>
"></td>
                    </tr>
                    <tr>
                        <td class="intname"><span class="red">*</span>所属公司：</td>
                        <td class="intinput"><input type="text" name="company" id="tt" autocomplete="off" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['company'];?>
"></td>
                    </tr>
                    </tbody>
                </table>
                <strong>账号信息：</strong>
                <table width="400px" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="intname"><span class="red">*</span>登录名：</td>
                        <td class="intinput" colspan="2"><input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['username'];?>
"></td>
                    </tr>
                    <tr>
                        &lt;!&ndash;<td class="intname"><span class="red">*</span>生成密码：</td>&ndash;&gt;
                        &lt;!&ndash;<td class="click_pwd"><input class="aka" type="button" value="生成" id="addpwd"></td>&ndash;&gt;
                        &lt;!&ndash;<td class="show_pwd">&ndash;&gt;
                            &lt;!&ndash;<span name="show_pwd" id="show_pwd"></span>&ndash;&gt;
                            &lt;!&ndash;<input type="hidden" value="" id="password" name="password">&ndash;&gt;
                        &lt;!&ndash;</td>&ndash;&gt;
                        <td class="intname"><span class="red">*</span>登录密码：</td>
                        <td class="intinput" colspan="2"><input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['password'];?>
"></td>
                    </tr>
                    </tbody>
                </table>-->
                <strong>评分权限：</strong>
                <ul class="clearfix pfCompetence" style="width:900px">
                <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grouplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
                <li class="fl" style="width:180px">
                    <input id="fz<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
" type="radio" name="group" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['judgesinfo']->value['group']==$_smarty_tpl->tpl_vars['group']->value['group_id']) {?>checked="true"<?php }?> />
                    <label for="fz<?php echo $_smarty_tpl->tpl_vars['group']->value['group_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value['group_title'];?>
</label>
                </li>
                <?php } ?>
                </ul>
            </div>
            <div class="btn clearfix">
                <div class="fl"><input class="submit aka dela"  name="" value="保存" readonly="readonly"></div>
                <div class="fl"><input class="button aka " name="" value="取消" readonly="readonly"></div>
            </div>
        </form>
    </div>
<!--第三部分-->
    <div class="container" style="margin-top: 20px;">
        <div class="case-detail">
            <form class="search" name="searchScore" id="searchScore" method="get" action="/index.php/manager/judges/setjudges">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['judgesinfo']->value['user_id'];?>
" name="uid">
            <input type="hidden" value="2" name="type" id="type">
            <span>提交时间：</span>
            <span>
                <select id="commitY" name="commitY">
                  <option value="2017"<?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2017) {?> selected="selected"<?php }?>>今年</option>
                  <option value="2016"<?php if ($_smarty_tpl->tpl_vars['search']->value['commitY']==2016) {?> selected="selected"<?php }?>>往年</option>
                </select>
            </span>
            <span>评分顺序</span>
            <span>
                <select id="sort" name="sort">
                    <option value="0">待选择</option>
                    <option value="1">评分由低到高</option>
                    <option value="2 ">评分由高到低</option>
                </select>
            </span>
            <span>
                <input type="submit" class="btn btn-warning" value="查询" style="width: 100px; padding: 5px;">
            </span>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <td>案例id</td>
                    <td>案例名称</td>
                    <td>提报奖项</td>
                    <td>评分</td>
                    <td>评分时间</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['record'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['record']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['records']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['record']->key => $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['award_code'];?>
</td>
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
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['record']->value['create_time'],'%Y-%m-%d %H:%M:%S');?>
</td>
                    <td>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
">下载PPT</a>
                        <?php if (!empty($_smarty_tpl->tpl_vars['record']->value['video_url'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['video_url'];?>
">下载视频</a><?php }?>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="black">
    <div class="black-inner">
        <p class="success"><span class="zf baocun">是否保存修改</span></p>
        <span class="x">X</span>
        <input type="button" class="click" value="确定" id="qud">
        </p>
    </div>
</div>
<script src="/static/manager/js/jquery.bigautocomplete.js" type="text/javascript"></script>
<script src="/static/manager/js/addpwd.js" type="text/javascript"></script>
<script src="/static/manager/js/judges.js" type="text/javascript"></script>
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
    $(function() {
        $("#qud").click(function() {
            $("#formSearch").submit();
         });
         
     });
</script>
</body>
</html><?php }} ?>
