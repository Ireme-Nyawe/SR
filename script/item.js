$(document).ready(function(){
    $("#stocki").css({"background":"rgb(0,200,250)"})
    var quantity= 0;
    $(".quantity_type").click(function(){
        quantity=$(this).val();
    })
    $("#add_item").click(function(){
        var name= $("#item_name").val();
        var price= $("#item_price").val();
        $("#add_response").load("add_item.php",{"name":name,"price":price,"quantity":quantity});
    })
    $("#update_item").click(function(){
        var id=$("#item_id").val();
        var name= $("#update_name").val();
        var price= $("#update_price").val();
        $("#update_response").load("update_item.php",{"id":id,"name":name,"price":price});
    })
    $("#delete_item").click(function(){
        var id=$("#delete_id").val();
        $("#delete_response").load("delete_item.php",{"id":id});
    })
    $("#define_quantity").click(function(){
        $(".quantity").toggle();
    })
    $("#import_now").click(function(){
        var item= $("#import_item").val();
        var quantity=$("#import_quantity").val();
        var amount=$("#import_amount").val();
        $("#import_response").load("import.php",{"item":item,"quantity":quantity,"amount":amount});
        
    })
})