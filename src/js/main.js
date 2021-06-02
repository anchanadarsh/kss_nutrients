var indexPage = $('#index_page').length;
var contactPage = $('#contact_page').length;

//====================================functions====================================
var transferHeight = function (source, destination) {
    var sourceH = $(source).outerHeight();
    $(destination).outerHeight(sourceH);
}

var equalHeight = function (target) {
    var setHeight = 0;
    $(target).each(function () {
        var getH = $(this).outerHeight();
        if (setHeight < getH) {
            setHeight = getH;
        }
    });
    $(target).outerHeight(setHeight);
}

//function to check hidden radio buttons in project filter section
var checkHiddenRadio = function (targetParent, clickedElement) {
    $(targetParent).find('.hidden_inputs').prop('checked', false);
    $(clickedElement).find('.hidden_inputs').prop('checked', true);
}

//==========get current year===============
var getCurrentYear = function () {
    var date = new Date();
    var yearVal = date.getFullYear();
    $('.current_year').text(yearVal);
}

//====================================functions ends====================================

//==============global variables=================
var winW = $(window).outerWidth();
var winH = $(window).outerHeight();

//################################### document ready function ###########################################

$(document).ready(function (evt) {

    //==============displaying current year==============
    getCurrentYear();

    //========= wow initialization ==============
    // new WOW().init();

    //========toggle sidebar============
    $('#nav-icon3').click(function () {
        $(this).toggleClass('open');
        $('.sidebar_wrap').toggleClass('open');
    });

    // force click on nav-menu when any link is clicked
    $('.sidebar_wrap .links a').on('click', function () {
        $('#nav-icon3').trigger('click');
    })

    console.log(`window width is ${winW}`);

    //=====================================index page script========================================
    if (indexPage == 1) {
        var containerWidth = $(".container").outerWidth();
        var paddLeft = (winW-containerWidth)/2;
        if(winW<767){
            $(".product_slider").css("margin-left",'0');
        }else{
            $(".product_slider").css("margin-left",paddLeft);
        }

        $(".link").click(function() {
            var clickedLink = $(this).attr("data-link");
            $('html, body').animate({
                scrollTop: $("#"+clickedLink).offset().top
            }, 800);
        });
    }

    //=====================================contact page script========================================
    if (contactPage == 1) {

    }
});

//################################### window load function ##############################################
$(window).on('load', function () {
    setTimeout(function () {
        $('.loader_overlay').fadeOut(500);
    }, 300);
});

//################################### window scroll function ###########################################
$(window).on('scroll', function (e) {
    var scrollTopPos = $(window).scrollTop();

    //lazy loading images
    //html syntax below
    //<img data-lazy-src="path/to/image" alt="" class="">

    $('img[data-lazy-src]').each(function () {
        var getOffsetTop = $(this).offset().top;
        if (getOffsetTop < (scrollTopPos + (winH * 2))) {
            $(this).attr('src', $(this).attr('data-lazy-src'));
        }
    })

});

//################################### window resize function ###########################################
$(window).on('resize', function () {});

//################### window orientation change function ############################
window.addEventListener("orientationchange", function () {
    location.reload();
});
