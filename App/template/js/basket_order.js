$(document).ready(function () {

$('#formx').on('submit', function() {
  //var $this = $(this);
  //var priceInput = $this.find('#some_id');
  //var sum = $this.find('#sum').data('value');
  //priceInput.val(sum);
  
});

 /*$(document).on('click', "forma[jax=true]",function () {
       /// var fnumb = $("#count_1").val();
        //var snumb = $("#price_1").attr('value');
        //var bnumb = $("#submit").val();


        //$.post('/basket/confirmOrder', {count: fnumb, price: snumb }, function (data) {
            // $('#login_form').remove();
           // $("#block").html(data);

        });

        return false;
    });*/

//////////////////////////////////////////////////////////

    $(document).on('click', "a.delete_order", function () {
        var id = $(this).attr("data-id");
        $.post("/basket/remove/" + id, {}, function (data) {

            //$("#table_"+ id).hide();
            $("#table_"+ id).remove();

            //$("#remove_basket").html(data);
var obj = $('#remove_basket');
//if($.isEmptyObject(obj)){
//	$("#basket").html("newContent");
//}else{
	//$("#remove_basket").html("newContent");
//}

            //$("#remove_basket").html(newContent);

        })
        return false;
    });


    });
/////////////////////////////////////////////////
/*function delete_order(id_b){
 //var id = $(this).attr("data-id");
        $.post("/basket/remove/" + id_b, {}, function (data) {
            $("#remove_basket").html(data);
            $("#remove_basket").reset();
        })
        return false;
}*/
///////////////////////////////////////////
function conversionPrice(itemID){ 
	var j_count = $("#count_"+itemID).val();
	var price =$("#price_"+itemID).attr("value");
	var item_sum=j_count*price; 
	//$("#item_sum_"+itemID).reset();
	//$("#item_sum_"+itemID).empty();
	//$("#item_sum_"+itemID).remove();
    //$("#item_sum_"+itemID).hide();

	 $("#item_sum_"+itemID).html(item_sum);

    $.post('/basket/updateCount', {ID: itemID, count: j_count }, function (data) {

        $("#warning_"+itemID).html(data);

    })

}

///////////////////////////////////////

/////////////////////////////////////////
/*function call() {
 	  var msg   = $('#formx').serialize();
        $.ajax({
          type: 'POST',
          url: 'res.php',
          data: msg,
         // success: function(data) {
          //  $('#results').html(data);
         // },
          });
}*/
//////////////////
/* $(document).on("input.count", function () {
        var id = $("#test").attr("data-id");
        $.post("/basket/test/" + id, {}, function (data) {
            $("count_basket").html(data);
        })
        return false;
    });*/
//////////////////

/*$(document).on("input.count", function () {
	    var j_id = $("#test").attr("data-id");
	    //var j_id =<?echo $row['ID'];?>
        var j_count = $("#test").val();
        $.post("/basket/test", {id:j_id,count:j_count}, function (data) {
            $("#count_basket").html(data);
        })
        return false;
    });
});*/
//////////////////////

/*$(document).on("input.count", function () {
	    var j_id = $("#count").attr("data-id");
	    //var j_id =<?echo $row['ID'];?>
        var j_count = $("#count").val();
        var price =$("#price").attr("value");

        var test=j_count*price;

       // $.post("/basket/test", {id:j_id,count:j_count}, function (data) {
            $("#count_basket").html(test);
        })
        return false;
    });*/

//});




///////
/*


$(document).on("input.count", function () {
	    var j_id = $("#count").attr("data-id");
	    //var j_id =<?echo $row['ID'];?>
        var j_count = $("#count").val();
        var price =$("#price").attr("value");

        var test=j_count*price;

       // $.post("/basket/test", {id:j_id,count:j_count}, function (data) {
            $("#count_basket").html(test);
        })
        return false;
    });



/////////////////
$(document).ready(function () {
    //$("#block1").html(data);

    $(document).on('click', "#submit",function () {
        var fnumb = $("#user_name").val();
        var snumb = $("#pass").val();


        $.post('php/cabinetUser.php', {user_name: fnumb, pass: snumb}, function (data) {
            // $('#login_form').remove();
            $("#block").html(data);

        });

        return false;
    });*/
