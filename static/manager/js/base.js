$(function(){
    $(".dela").on('click', function(){
        $(".black").show();
        var content="";
        if($(this).attr("href")){
            content=$(this).html();
        }else{
            content=$(this).val();
        }
        $(".zf").hide();
        switch (content){
            case "删除":
                $('.delpv').show();
                break;
            case "作废":
                $('.zuofei').show();
                break;
            case "取消作废":
                $('.qxzuofei').show();
                break;
            case "保存":
                $(".baocun").show();
                break;
        }
        return false;
    });
    $(".black-inner .x").on('click',function(){
        $(".black").hide();
    });
    $(".black-inner .click").on('click',function(){
        $(".black").hide();
    });
});
