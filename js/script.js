$(document).ready(function(){
    $(".yazilar").load("message.php?action=read");
    $(".yazilar").scrollTop($(".yazilar")[0].scrollHeight);
    $(".username").load("message.php?action=username");
    $(".settingsschema").hide();
    $(".notification").hide();
    $('.iconsonuc').hide();
    $('.arkaplanimagesonuc').hide();
    $('.sessonuc').hide();
    
    $("#colorsettings").click(function(e){
        $(".settingsschema").slideToggle();
        $(".notification").hide();
        e.preventDefault();
    });
    setInterval(function(){ $(".yazilar").load("message.php?action=read")}, 1000);
    setInterval(function(){ $(".username ").load("message.php?action=username");}, 1000);
    var loop = 0;
    $("body").delegate("#gonder", "keyup change", function(){
        var username= $("#gonder").attr("data-id");
        var messages = $("#gonder").val();
        var messageLimit = messages.length;

        if(messageLimit>0 && loop==0){
            $.post("message.php?action=writing",{"name": username}, function(data){
                setInterval(function(){$(".writing").load("message.php?action=reading");},1000);
            })
            loop = 1;
        }else if(messageLimit == 0){
            $.post("message.php?action=writing",{"namedelete": username}, function(data){
                setInterval(function(){$(".writing").load("message.php?action=reading");},1000);
            })
            loop = 0;
        }
    })
    $("#gonder").keyup(function(e){
        var text = $(this).val();
            if(e.keyCode==13){
                $.ajax({
                    method: "POST",
                    url: "message.php?action=add",
                    data: $("#mesajgonder").serialize(),
                    success: function(data){
                        text.length = 0;
                        $("#gonder").val("");
                        $(".yazilar").load("message.php?action=read");
                        $(".yazilar").scrollTop($(".yazilar")[0].scrollHeight);
                        $(".notification").hide();
                        $("#notification").trigger("play");
                    }
                })
            }
    });
    $("#back_button").click(function(e){
        $.ajax({
            method: "POST",
            url: "message.php?action=background",
            data: $("#backgroundColor").serialize(),
            success: function(data){
                $(".settingsschema").hide();
                $(".notification").show();
            }
        })
        e.preventDefault();
    });
    $("#text_button").click(function(e){
        $.ajax({
            method: "POST",
            url: "message.php?action=text",
            data: $("#textColor").serialize(),
            success: function(data){
                $(".settingsschema").hide();
                $(".notification").show();
            }
        })
        e.preventDefault();
    });
    $("#sesbuton").click(function(){
        $.ajax({
            method: "POST",
            url: "message.php?action=soundchange",
            data: $("#sesform").serialize(),
            success: function(data){
                $("#sound").hide();
                $(".sessonuc").html(data).show();
            }
        })
        e.preventDefault();
    })
    $("#iconbuton").click(function(){
        $.ajax({
            method: "POST",
            url: "message.php?action=iconchange",
            data: $("#iconform").serialize(),
            success: function(data){
                $("#icon").hide();
                $(".iconsonuc").html(data).show();
            }
        })
        e.preventDefault();
    })
    $("#arkaplanimagebuton").click(function(){
        $.ajax({
            method: "POST",
            url: "message.php?action=backchange",
            data: $("#arkaplanimageform").serialize(),
            success: function(data){
                $("#backimage").hide();
                $(".arkaplanimagesonuc").html(data).show();
            }
        })
        e.preventDefault();
    })
});

