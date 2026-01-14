(function ($) {


    function repositionElements() {
        var newWidth = $(window).width();

        if (newWidth < 768) {
            $('#promotion-mechanics-form #bottom-section .bs-left')
                .insertAfter('#promotion-mechanics-form #bottom-section .bs-right');
        } else {
            $('#promotion-mechanics-form #bottom-section .bs-left')
                .insertBefore('#promotion-mechanics-form #bottom-section .bs-right');
        }
    }

    $(document).ready(function () {


        /* PROMOTION PAGE */
        repositionElements();

        // Re-check on resize
        $(window).resize(function () {
            repositionElements();
        });
    });

    $('#mc-header #sidebarCollapse').click(function () {
        var classes_ = $('#sidebar-menu').attr('class');
        if (classes_.indexOf("active") !== -1) {
            $('#sidebar-menu').removeClass('active-sidebar-menu');
            $('#main-content').removeClass('active-main-content');
            // $('#sidebar-menu').css('margin-left',-300px');
        } else {
            // $('#sidebar-menu').css('margin-left',0);
            $('#sidebar-menu').addClass('active-sidebar-menu');
            $('#main-content').addClass('active-main-content');
        }
    });

    $('#navbar .navbar-toggle').on('click', function () {
        const $collapse = $('#navbar-collapse');

        if ($collapse.height() === 0) {
            $collapse.css({
                display: 'block',
                height: 'auto'
            });
        } else {
            $collapse.css({
                height: '0',
                display: 'none'
            });
        }
    });

    $('#sidebar-menu ul li a.is_accordion').click(function () {
        var classes_ = $(this).parent('li').find('.submenu').attr('class');

        if (classes_.indexOf("show") !== -1) {
            $(this).parent('li').find('.submenu').first().removeClass('show');
        } else {
            $(this).parent('li').find('.submenu').first().addClass('show');
        }

    });

    $('#sidebar-menu .hide-sidebar-menu a').click(function () {
        $('#sidebar-menu').removeClass('active-sidebar-menu');
    });

})(jQuery);
