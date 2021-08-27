
$(document).on('click', '.has-arrow', function (e) {
    e.preventDefault();

    let thisObj = $(this);
    let targetDiv = thisObj.data("bs-target");


    let allArrow = $('.has-arrow').filter('.collapsed');
   
    allArrow.map(function (index, element) {       
        let newTargetDiv = $(element).data("bs-target");
        if(newTargetDiv !== targetDiv) {
            $(element).removeClass("collapsed");
            $(element).attr("aria-expanded",false);
            if ($(`${newTargetDiv}`).hasClass("show")) {
                $(`${newTargetDiv}`).removeClass("show");
            } 
        }
      
    });

    

    if(thisObj.hasClass("collapsed")) {
        thisObj.removeClass("collapsed");
        thisObj.attr("aria-expanded",false);
        if (($(`${targetDiv}`).hasClass("show"))) {
           $(`${targetDiv}`).removeClass("show");
        }
    }
    else {
        thisObj.addClass("collapsed");
        thisObj.attr("aria-expanded",true);
        if (!($(`${targetDiv}`).hasClass("show"))) {
           $(`${targetDiv}`).addClass("show");
        }
    }
   

   
    

});
