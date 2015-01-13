$(document).ready(function(){
    
    $("#contact_l").click(function(){
        $("#contact").show(300,function(){
           
        });
        $("#close").click(function(){
            $("#contact").hide(300);
        });
    });
    
    $("#contact form").submit(function(){
        var email = $("#email").val();
        var object = $("#object").val();
        var mex = $("textarea").val();
        var file = "email="+email+"&object="+object+"&mex="+mex;
        $.ajax({
            url: "contact.php",
            type: "POST",
            data: file,
            success: function(){
                alert("Thank you, I'll answer you as soon as possible.");
                $("#contact").hide(300);
            },
            error: function(){
                alert("error... please try again");
            }
        });
        return false;
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});