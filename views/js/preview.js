

$( document ).ready( function(){

    $("#preview").on("click", function(e){

        var name = $("#form-name").val(),
            email = $("#form-email").val(),
            text = $("#form-text").val(),
            photo = $("#form-photo").val();

        var re = /.jpg|.gif|.jpeg|.png/g;
        console.log(photo.search(re));

        // check all fields no empty value for show modal preview window
        if ((name != "") && (email != "") && (text != "") && (photo.search(re) >= 0)){
            //console.log(';lkj');
            $("#preview").attr("data-target", "#myModal");
            e.preventDefault();
        } else {
            $("#preview").attr("data-target", "");
            e.preventDefault();
        }
    });

});