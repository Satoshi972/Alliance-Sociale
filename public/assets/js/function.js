function submitForm(myForm)
{
  	var formdata = (window.FormData) ? new FormData(myForm[0]) : null;
	var data = (formdata !== null) ? formdata : myForm.serialize();
	               
	$.ajax(
	{
	    method: myForm.attr('method'),
	    url: myForm.attr('action'),
	    contentType: false, // obligatoire pour de l'upload
	    processData: false, // obligatoire pour de l'upload
	    cache: false,
	    data: data,
	    success: function(res)
	    {
	    	if(res == "success")
	        {
	        	$('#result').html("Votre action a bien effectuée").addClass('alert-dismissable alert-success').fadeIn(5000).fadeOut(5000);
	            $('form')[0].reset();
	        }
	        else
	        {
	            $('#result').html(res).addClass('alert-dismissable alert-danger').fadeIn(10000).fadeOut(20000);
	        }
	    }
	});
}

// function customFileInput(name, maxFile = 10)
// {
// 	$(name).fileinput(
// 	{
// 	  'showUpload':false,
// 	  'showCaption' : false,
// 	  'showRemove'  :true,
// 	  'maxFileCount': maxFile,
// 	  language: "fr"
// 	});
// }