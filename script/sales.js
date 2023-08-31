$(document).ready(function(){
    $("#sali").css({"background":"rgb(0,200,250)"})
$("#save_record").click(function(){
    var item=$("#item").val();
    var amount=$("#amount").val();
    $("#save_response").load("record_sales.php",{"item":item,"amount":amount});

})
$("#view_report").click(function(){
    var date=$("#date").val();
    var date1=$("#date1").val();
    var date2=$("#date2").val();
$("#report_t2").load("respective_report.php",{"date":date,"date1":date1,"date2":date2});
    console.log(date);
    console.log(date1);
    console.log(date2);

})
$("#sale_item").click(function(){
    var item= $(this).val();
    console.log(item);
    $("#continuing_form").load("sales_form2.php",{"item":item});
})
$("#qty2").keyup(function(){
   var qty2=$(this).val();
   var price=$("#amounti").val();
   var new_p2= price * qty2;
   $("#amount2").val(new_p2);
})
$("#save_sale2").click(function(){
    var quantiti=$("#qty2").val();
    var amounti=$("#amount2").val();
    var modi=$("#pmodi").val();
    var item=$("#sale_item").val();
    $("#sale_response").load("record_sales.php",{"item":item,"qty":quantiti,"amount":amounti,"pmode":modi});

    
})
$("#save_sale1").click(function(){
    var amount=$("#amount").val();
    var mode=$("#pmode").val();
    var item=$("#sale_item").val();
    $("#sale_response").load("record_sales2.php",{"item":item,"amount":amount,"pmode":mode});
    
    
})
})