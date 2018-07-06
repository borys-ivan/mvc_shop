$(document).ready(function () {
    //$("#block1").html(data);

    $(document).on('click', "ul#test_paginate",function () {
        var page = $(get('page-')).val();
        var href = $(this).attr('href');
        //var snumb = $("#pass").val();
        //var bnumb = $("#submit").val();

        $.post('/category/view', {page: page}, function (data) {
            // $('#login_form').remove();
            //$("#block").html(data);

        });

        return false;
    });







});
