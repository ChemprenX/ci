$(function () {
    /*nav on*/
    var pageName = $("body")[0].className;
    var lis = $(".navUl li");
    lis.removeClass("on");
    var currentLi = lis.parent().find("." + pageName + "li");
    currentLi.addClass("on");
    /*focus*/
    $('#banner').bxSlider({});
    /*vip*/
    var slider = $('.vipSlider').bxSlider({
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 235,
        slideMargin: 19,
        pager: false,
        moveSlides: 1,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '',
        prevText: ''
    });
    $('#slider-next').click(function () {
        slider.goToNextSlide();
        return false;
    });

    $('#slider-prev').click(function () {
        slider.goToPrevSlide();
        return false;
    });
    /*cloudTags*/
    tagcloud({
        fontsize: 14,
        radius: 140,
        mspeed: "slow",
        ispeed: "slow",
        direction: 135,
        keep: true
    });
//填报联系人信息校验
    $('form[name="formUser"]').validator({
        stopOnError: false,
        timely: false,
        fields: {
            'company': 'required;',
            'profile': 'required;',
            'contact': 'required;',
            'telephone': 'required; tel;',
            'email': 'required; email;',
            'qq': 'required; qq;',
            'mobile': 'required; mobile',
            'position': 'required;'
        }
    });

    $('form[name="formUserEdit"]').validator({
        stopOnError: false,
        timely: false,
        rules: {
            isChangePwd: function () {
                return $('#changePwdCon').is(":visible");
            }
        },
        fields: {
            'company': 'required;',
            'contact': 'required;',
            'email': 'required; email;',
            'mobile': 'required; mobile',
            'oldpassword': 'required(isChangePwd)',
            'passwordsure': 'required(isChangePwd); match(password)'
        }
    });
//填报案例信息校验
    $('form[name="formCase"]').validator({
        stopOnError: false,
        timely: false,
        rules: {
            isCase: function () {
                return $('#case_detail').is(":visible");
            },
            isNoCase: function () {
                return $('#nocase_detail').is(":visible");
            },
            pptSize: function() {
                var ppt = document.getElementById('file4').files;
                var size = ppt[0].size;
                if (size >= 10485760){
                    return {"error":  "ppt过大，请小于10M"};
                }
            }
        },
        fields: {
            'advertiser': 'required(isCase);',
            'advertiser_logo': 'required(isCase); jpg',
            'agency_company': 'required(isCase)',
            'agency_company_logo': 'required(isCase); jpg',
            'title': 'required(isCase)',
            'visual_url': 'required(isCase); jpg',
            'url': 'required(isCase); ppt; pptSize',
            'video_url': 'video',
            'no_case_advertiser': 'required(isNoCase)',
            'no_case_url': 'required(isNoCase), word',
            'no_case_advertiser_logo': 'jpg',
            'no_case_visual_url': 'jpg'
        },
        callback: function (e) {
            $(".jiazai").show();
        }
    });
    //填报发票信息校验
    $('form[name="formInvoice"]').validator({
        stopOnError: false,
        timely: false,
        rules: {
            isNormal: function () {
                return $('#normalInvoice').is(":visible");
            },
            isSpecial: function () {
                return $('#specialInvoice').is(":visible");
            }
        },
        fields: {
            'pay_prove':'required',

            'normal_company_name': 'required(isNormal);',

            'hardcopy':'required(isSpecial); jpg',
            'license':'required(isSpecial); jpg',
            'company_name':'required(isSpecial);',
            'company_address':'required(isSpecial);',
            'telephone':'required(isSpecial);',
            'bank_name':'required(isSpecial);',
            'bank_account':'required(isSpecial);',
            'addressee':'required(isSpecial);',
            'direction':'required(isSpecial);'
        },
        callback: function (e) {
            $(".jiazai").show();
        }
    });




    $('#peak_foucs').bxSlider({
        auto: true
    });

    //caseCollection
    $(".unitTitle").on("click", function () {

        var str = $(this).find(".clickArr").attr("class");
        $(".clickArr").css({background: "url('/static/api/new/images/arraw_03.png')"});
        $(this).find(".clickArr").css({background: "url('/static/api/new/images/arrawDown.png')"});
        $(".subContent").hide();
        if (str.indexOf("innerClick") != -1) {
            $(".unit2 .parentSubContent").show();
        }
        ;
        $(this).next(".subContent").toggle();

    });

});