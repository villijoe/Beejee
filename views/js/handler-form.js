
// if bluring input to input value save in preview modal window

$("#form-name").blur(function(){
    $("#name").text($(this).val());
});

$("#form-email").blur(function(){
    $("#email").text($(this).val());
});

$("#form-text").blur(function(){
    $("#text").text($(this).val());
});

function handleFileSelect(e){
    var file = e.target.files;
    var f = file[0];

    if (!f.type.match('image.*')){
        return false;
    }

    var reader = new FileReader();

    reader.onload = (function(theFile) {
        return function(e) {
            var img = document.getElementById('photo');
            img.innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', theFile.name, '"/>'].join('');
        }
    })(f);

    reader.readAsDataURL(f);
}
document.getElementById('form-photo').addEventListener('change', handleFileSelect, false);