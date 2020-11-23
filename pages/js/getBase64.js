var myaudio=""
function getBase64(file) {
var reader = new FileReader();
reader.readAsDataURL(file);
reader.onload = function () {
//console.log(reader.result);

};
reader.onerror = function (error) {
console.log('Error: ', error);
};
}


function encodeImageFileAsURL(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
    console.log(reader.result)
    document.getElementById('musica').value= reader.result;
        
    }
        reader.readAsDataURL(file);
}