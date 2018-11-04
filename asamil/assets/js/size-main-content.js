(function($){
    $(document).ready(function(){
        var proportion = $('.main-content').attr('data-proportion');
        
        proportion = proportion <= 0 ? 1 : proportion;
        
        $('.main-content').height(window.innerHeight * proportion);
        
        $(window).resize(function(){
            proportion = $('.main-content').attr('data-proportion');
            proportion = proportion <= 0 ? 1 : proportion;

            $('.main-content').height(window.innerHeight * proportion);
        });
    });
})(jQuery);