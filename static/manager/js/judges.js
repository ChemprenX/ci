;(function($){
    /*调随机密码*/
    $(function(){
        var pwdbtn=$("#addpwd");
        var showpwd=$("#show_pwd");
        var password=$("#password");
        var pwd;
        pwdbtn.on('click',function(){
            pwd=randPassword(8);
            if(pwd){
                showpwd.html(pwd);
                password.val(pwd);
            }
        });
    });
    /*模糊查询*/
    $(function(){
        $("#tt").bigAutocomplete({
            width:266,
            url:'/index.php/manager/judges/getcompany',
            callback:function(data){
                
            }
        });
    });
    

})(jQuery);