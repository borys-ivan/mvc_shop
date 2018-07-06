$(document).ready(function () {
    //$("#block1").html(data);

    $(document).on('click', "a.add_to_basket", function () {
        var id = $(this).attr("data-id");
        $.post("/product/basket/" + id, {}, function (data) {
            $("#block2").html(data);
        })
        return false;
    }); 


    $(document).on('click', "a.remove_from_basket", function () {
        var id = $(this).attr("data-id");
        $.post("/product/remove/" + id, {}, function (data) {
            $("#block2").html(data);
        })
        return false;
    });





    /*        var ID = "<?echo  $_SESSION['ID'];?>";
     //        var cart = '<?echo $ID;?>';
     //        var name_product = '<?echo $name;?>';
     //            var view = $("#view").val();


     $.get('/product/basket', {
     id: ID
     //   cart: cart,
     //   name_product: name_product,
     //   view: 'add_to_basket'
     }, function (data) {
     // $('#login_form').remove();
     $("#block2").html(data);

     });

     return false;

     });*/








/*    $("a.test2").click(function () {

        var ID = '<?echo $ID;?>';
//        var cart = '<?echo $ID;?>';
//        var name_product = '<?echo $name;?>';
//            var view = $("#view").val();

        $.get('/product/basket', {
            id: ID
            //          cart: cart,
            //          name_product: name_product,
            //           view: 'remove_from_basket'
        }, function (data) {
            // $('#login_form').remove();
            $("#block2").html(data);

        });

    }); */

});

