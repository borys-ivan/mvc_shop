$(document).ready(function () {
    $('p a').click(function () {
        var o = $(this).parent();
        var url = o.find('img').attr('src');
        var html = '<a href="#" class="clone"><img src="' + url + '" /></a>'
        o.append(html);
        o = o.find('.clone');
        o.animate({width: '100%', height: '100%'});
        o.click(function () {
            $(this).remove();
        });
    });
});
