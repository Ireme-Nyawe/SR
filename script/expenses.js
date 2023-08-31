$(document).ready(function(){
    $("#expensii").css({"background":"rgb(0,200,250)"})
    $("#view_report").click(function(){
        console.log("kabaee");
        var date=$("#date").val();
        var date1=$("#date1").val();
        var date2=$("#date2").val();
    $("#report_t2").load("expense.respective.report.php",{"date":date,"date1":date1,"date2":date2});
    
    })
    $("#save_expense").click(function(){
        var expense=$("#expense").val();
        var amount=$("#amount").val();
        var person=$("#person").val();
        $("#expense_response").load("record_expense.php",{"expense":expense,"amount":amount,"person":person});

    })
    
})