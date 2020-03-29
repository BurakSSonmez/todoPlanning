var site="http://www.mocky.io/v2/5d47f235330000623fa3ebf7";

$(document).ready(function () {

    $("button").click(function () {

        $.getJSON(site,function (gelen) {

            for(var i=0; i<gelen.length; i++){

                $.each(gelen[i], function (key,value) {
                    document.write("<b>"+ key + "</b>"+": "+value+"</br>");
                });
                document.write("<hr/>");
            }
        })
    });
});