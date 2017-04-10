
$(function(){

$("#picture").fileinput({
    uploadUrl: "/file-upload-batch/2",
    allowedFileExtensions: ["jpg", "png", "jpeg", "gif", "pjpeg"],
    minImageWidth: 50,
    minImageHeight: 50
});

});