/**
 * Created by Administrator on 2016/10/19.
 */
$(function() {
  $('#focus3').kxbdSuperMarquee({
        distance: 509,
        time: 5,
        duration: 20,
        isAuto: true,
        direction: 'left'
    });
    $('#focus1').kxbdSuperMarquee({
        distance: 610,
        time: 5,
        duration: 20,
       /* isAuto: false,
        btnGo: {right: '#focus1_left', left: '#focus1_right'},*/
        direction: 'left'
    });
    $('#focus2').kxbdSuperMarquee({
        distance: 610,
        time: 5,
        duration: 20,
        /* isAuto: false,
         btnGo: {right: '#focus1_left', left: '#focus1_right'},*/
        direction: 'left'
    });
    $(".section5_btn").on("click",function(){
        var num=$(".section5_btn").index(this);
        $(".section5_btn").removeClass("active");
        $(this).addClass("active");
       $(".section5_content_ul").removeClass("on");
        $(".section5_content_ul"+num).addClass("on");
    })
});