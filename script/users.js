$(document).ready(function(){
    
    $("#hide_edit").click(function(){
        $("#edit_org").css({"display":"none"});
    })
    $("#change_credentials").click(function(){
        $("#crd").css({"display":"block"})
        $("#bss").css({"display":"none"})
    })
    $("#change_business").click(function(){
        $("#bss").css({"display":"block"})
        $("#crd").css({"display":"none"})
    })
    $("#save_edit1").click(function(){
        var usn=$("#new_usn").val();
        var ps1=$("#new_ps1").val();
        var ps2=$("#new_ps2").val();
        $(".edit_response").load("edit_user.php",{"credentials":1,"usn":usn,"ps1":ps1,"ps2":ps2});
    })
    $("#save_edit2").click(function(){
        var bss=$("#new_bss").val();
        $(".edit_response").load("edit_user.php",{"name":1,"bss":bss});
    })
})