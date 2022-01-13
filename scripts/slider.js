
let slideder_interval;

$(document).ready(function(){
    if (!slideder_interval && slider_switch == true) {
        slideder_interval = setInterval(next_slide, 3000);
    }

    $('#slider-wrap').on('mouseenter', function(){
        clearInterval(slideder_interval);
        slideder_interval = null;
    });
    $('#slider-wrap').on('mouseleave', function(){
        if (!slideder_interval && slider_switch == true) {
            slideder_interval = setInterval(next_slide, 3000);
        }
    });
    $(window).on('resize', function(){
        slide_width = $('.slide-item').innerWidth();
        $('#slider').css({'left': `-${slide_width}px`});
        current_px = -slide_width;
    })
});

window.onblur = function(){
    clearInterval(slideder_interval);
    slideder_interval = null;
}
window.onfocus = function(){
    if (!slideder_interval && slider_switch == true) {
        slideder_interval = setInterval(next_slide, 3000);
    }
}


function next_slide(){
    if(current_px == -(slides_count*slide_width)){
        $('#slider').css({'left': `-${slide_width}px`});
        current_px = -slide_width;
    }
    current_px-=slide_width;
    $('#slider').animate({'left': `${current_px}`}, 500);
}
function prev_slide(){
    if(current_px == 0){
        $('#slider').css({'left': `-${slide_width*(slides_count-1)}px`});
        current_px = -slide_width*(slides_count-1);
    }
    current_px+=slide_width;
    $('#slider').animate({'left': `${current_px}`}, 500);
}
