$(document).ready(function(){
    $("#reporti").css({"background":"rgb(0,200,250)"})
    $("#reporting").click(function(){
        var report_option=$("#report_option").val();
        var date=$("#date").val();
        var date1=$("#date1").val();
        var date2=$("#date2").val();
        $("#report_t").load("reports.php",{"table":report_option,"date":date,"date1":date1,"date2":date2});
        console.log(report_option);
        
    
    
    })

})