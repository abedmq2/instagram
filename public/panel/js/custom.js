$(document).on("scroll", function () {
    sticky();
});
sticky();
function sticky() {
    if($(document).scrollTop() > 86) {
        $(".sticky-bar").addClass("sticky-fix");
        if(parseInt($('#kt_aside').css('left'))<0){
            right=5;
        }else{
            right=$('#kt_aside').width()+30;
        }

        $('.sticky-fix').find('.kt-portlet__head').css('top',($('#kt_wrapper').css('padding-top')));
        $('.sticky-fix').find('.kt-portlet__head').css('right',right+'px');
        $('.sticky-fix').find('.kt-portlet__head').css('width',$('.sticky-bar').width()+'px');
    } else {
        $('.sticky-fix').find('.kt-portlet__head').css('top','auto');
        $('.sticky-fix').find('.kt-portlet__head').css('right','auto');
        $('.sticky-fix').find('.kt-portlet__head').css('width','auto');

        $(".sticky-bar").removeClass("sticky-fix");
    }
}