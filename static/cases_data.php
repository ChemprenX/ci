<?php
include_once '../application/services/cases/test';
$model = new case_service();
$rs = $model->get_cases_num();
include_once ('global.php');  //调用数据库
include_once ('ofc/open-flash-chart.php'); //调用OFC库文件
//设置图表标题
$title = new title( '各区域单位场所数量分布图'.date('Y-m-d') );
$title->set_style("font-size:12px; font-weight:bold;");
$pie = new pie();
$pie->set_alpha(0.6);
$pie->set_start_angle( 32 );
$pie->add_animation( new pie_fade() );
$pie->set_tooltip( '#val# of #total##percent# of 100%' );
$pie->set_colours( array('#1C9E05','#FF368D','#0099cc','#d853ce','#ff7400','#006e2e',
        '#d15600','#4096ee','#c79810') );
//读取各区域信息
$model = new case_service();
$rs = $model->get_cases_num();
var_dump($rs);exit();
$sql="select sum(total) as num from ".$prefix."district";
$query=$db->query($sql);
$rs=$db->fetch_array($query);
$t=$rs[num];
$sql="select name,total from ".$prefix."district";
$query=$db->query($sql);
while($row=$db->fetch_array($query)){
    $total=$row[total];
    if(!empty($t)){
        $v=round($total/$t,4)*100;
    }else{
        $v=0;
    }
    $dis[]=array("name"=>$row[name],"total"=>$row[total],"v"=>$v);
}
$len_dis=count($dis);
for($i=0;$i<$len_dis;$i++){
    $dis_value[]=new pie_value(intval($dis[$i][total]),$dis[$i][name]."(".$dis[$i][v]."%)");
}
$pie->set_values($dis_value);

$chart = new open_flash_chart();
$chart->set_title( $title );
$chart->add_element( $pie );
$chart->x_axis = null;
echo $chart->toPrettyString(); //生成json数据