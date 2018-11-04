(function($){
    $(window).load(function(){
        $('.gallery-loading').removeClass('open');
        $('.gallery-featured .slick-slide').height((window.innerHeight - $('.main-header').height()) * 0.87);
        $('.gallery-thumbnails .slick-slide').height((window.innerHeight - $('.main-header').height()) * 0.13);
        
        $(this).resize(function(){
            $('.gallery-featured .slick-slide').height((window.innerHeight - $('.main-header').height()) * 0.87);
            $('.gallery-thumbnails .slick-slide').height((window.innerHeight - $('.main-header').height()) * 0.13);
        });
    });
    
    $(document).ready(function(){
        $('.gallery-featured').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.gallery-thumbnails'
        });
        
        $('.gallery-thumbnails').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.gallery-featured',
            dots: false,
            centerMode: true,
            focusOnSelect: true
        });
    });
})(jQuery);