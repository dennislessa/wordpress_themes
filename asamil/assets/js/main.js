(function($){
    $(document).ready(function(){
        if ($(this).scrollTop() > 0)
            $('body').addClass('scrolled');
        else
            $('body').removeClass('scrolled');

        $(this).scroll(function(){
            if ($(this).scrollTop() > 0)
                $('body').addClass('scrolled');
            else
                $('body').removeClass('scrolled');
        })

        // Slick on banner
        $('#main-banner').slick({
            speed: 800
        });

        // Menu mobile
        $('.menu-mobile-btn').click(function(){
            $('body').toggleClass('menu-open');
            
            if ($('body').hasClass('menu-open'))
                $('i', this).addClass('fa-times');
            else
                $('i', this).removeClass('fa-times');
        });

        // Submenu mobile
        $('.menu-mobile .menu-item-has-children > a').click(function(e){
            e.preventDefault();

            $(this).parent().toggleClass('is-open').siblings().removeClass('is-open');
        });
        
        
        // Search bar
        $('.trigger-searchbar').click(function(){
            $('body').toggleClass('open-searchbar');
            
            if ($('body').hasClass('open-searchbar'))
                $(this).addClass('fa-times');
            else
                $(this).removeClass('fa-times');
        });
        
        // Relatórios
        $('.relatorio-ano').click(function(){
            $(this).toggleClass('open');
        });
        
        $('.contact-col-half .contact-cover').css('top', $('.main-header').height());
    });
})(jQuery);