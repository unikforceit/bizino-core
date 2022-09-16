;(function($){
    "use strict";
    $( function(){
        $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
        $(document).on('widget-updated',function(event,widget){
            var widget_id = $(widget).attr('id');
            if(widget_id.indexOf('haarmax_vido_intro_widget')!=-1){
                $imgval = $(".img_val").val();
                $(".img_show").attr("src",$imgval);
                $(".img_show").css({"margin":"0 auto","display":"block","max-width":"80%"});
            }
        });
        $("body").off("click",".about-up-btn");
        $("body").on("click",".about-up-btn",function( e ){

            let frame = wp.media({
                title: 'Select or Upload Media',
                button: {
                    text: 'Use this'
                },
                multiple: false
            });

            frame.on("select",function(){
                // Get media attachment details from the frame state
                let $img = frame.state().get('selection').first().toJSON();

                $(".img_show").attr("src",$img.url);
                $(".img_val").val($img.url);

                $(".img_val").trigger('change');

                $(".about-up-btn").text("Change Image");
            });

            // Open Media Modal
            frame.open();
            e.preventDefault();
        });
    });
})(jQuery);