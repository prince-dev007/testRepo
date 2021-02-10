$( document ).ready( function() {
    $('#state').change(function () {
        $.ajax({
            url: "cart/CartController.php",
            type:"post",
            async:false,
            data : "action=city&q="+$(this).val(),
            success: function(json){
                $('#city').html(json);
            }
        });
    });
    $('#zip').keyup(function (){
        console.log($(this).val().length);
        if($(this).val().length==5){
            $.ajax({
                url: "cart/CartController.php",
                type:"post",
                async:true,
                data : "action=checkZip&q="+$(this).val()+"&city="+$('#city').val(),
                success: function(json){
                   if(json==="false"){
                       $('#zip').val("");
                       alert('Zipcode is not valid, please provide valid zipcode.');
                   }
                }
            });
        }
    });
});