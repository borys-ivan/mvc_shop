$(document).ready(function () {
    //$("#block1").html(data);

    $(document).on('click', "#submit",function () {
        var fnumb = $("#user_name").val();
        var snumb = $("#pass").val();
        //var bnumb = $("#submit").val();

        $.post('/cabinet/login', {user: fnumb, pass: snumb }, function (data) {
            // $('#login_form').remove();
            $("#block").html(data);

        });

        return false;
    });







});