$(document).ready(function(){
    $("#load").fadeOut(1000,function(){
        console.log("well");
    })
$("#drop_down").css({"display":"none"});
$("#drop_down_button").click(function(){
$("#drop_down").toggle();
})

$("#edit_profile").click(function(){
    $("#edit").css({"display":"block"})
    $("#drop_down").css({"display":"none"});
    $("#edit").load("user.php");
    // alert("rwanda")

})
$("#remove_edit").click(function(){
    alert("rwandaa")
})
$("#remove_edit").click(function(){
    console.log("eee")
})


})