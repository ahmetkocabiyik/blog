// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Navigation Scripts to Show Header on Scroll-Up
jQuery(document).ready(function($) {
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.navbar-custom').height();
        $(window).on('scroll',
            function() {
                var currentTop = $(window).scrollTop();

                if(currentTop > headerHeight)
                {
                    $('.navbar-custom').addClass('is-fixed');
                    $('.navbar-custom').find("#topbar").hide();
                }
                else
                {
                    $('.navbar-custom').removeClass('is-fixed');
                    $('.navbar-custom').find("#topbar").show();
                }

            });
    }
});
