$(document).ready(function(){
    $("#image-bat").click(function(){
        $("#myImage").attr('src','on.gif');
    });
});
$(document).ready(function(){
    $("#image-tat").click(function(){
        $("#myImage").attr('src','off.gif');
    });
});

$(document).ready(function(){
    $("#hien_div").click(function(){
        $("#div-red").show();
    });
});
$(document).ready(function(){
    $("#an_div").click(function(){
        $("#div-red").hide();
    });
});

$(document).ready(function(){
    $("#hien").click(function(){
        $("#hiendiv").toggle();
    });
});