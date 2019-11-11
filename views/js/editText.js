
var text, textInput;

var saveText = $(".saveText");

saveText.hide();

$(".editText").bind("click", function(){
    textInput = getTextArea($(this));
    text = textInput.text();
    textInput.empty();
    textInput.append("<textarea autofocus>" + text + "</textarea>");
    $(this).hide();
    $(this).next().show();
});

saveText.bind("click", function(){
    var id = $(this).attr("id");
    var e = $(this);
    textInput = getTextArea($(this));
    text = textInput.find("textarea").val();
    console.log(text);
    $.ajax({
        method: "POST",
        url: "http://tasks.loc/edit/",
        data: { id: id, text: text}
    })
        .done( function( msg ){
            console.log(msg);
            textInput.empty();
            textInput.text(msg);
            e.hide();
            e.prev().show();

        });
});

function getTextArea(e){
    return e.parent().parent().find("td.text");
}