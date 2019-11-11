
$(".sorting").bind("change", function(){
    var id;
    var url = "http://tasks/page/1/";
    $(".sorting").each( function(){
        var e = $(this);
        id = e.attr("id");
        if (e.val() == '' || (e.val() == 0 && id == 'closed')) {
            return;
        }
        url += id + '/' + e.val() + '/';
    });
    $(location).attr("href", url);
});
