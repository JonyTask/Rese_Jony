const hamburger_menu = $(".hamburger_menu");

hamburger_menu.on("click",function(){
    const modal = $(".modal");
    const state = modal.css('position');
    const hamburger_lines = $(".hamburger_line");
    if(state == "absolute"){
        hamburger_lines.css({'display':'none'});
        modal.css({'position':'fixed'});
        $(this).prepend('<p class="close_button">×</p>');

        modal.animate({top:0},400,'linear');
        $(".body_zone").css({'overflow':'hidden'});
        $(this).addClass('modal_change_close');
    }else if(state == "fixed"){
        hamburger_lines.css({'display':'inline-block'});
        modal.css({'position':'absolute'});
        $('.close_button').remove();

        modal.animate({top:'-100%'},400,'linear');
        $(".body_zone").css({'overflow':'unset'});
        $(this).removeClass('modal_change_close');
    }
});