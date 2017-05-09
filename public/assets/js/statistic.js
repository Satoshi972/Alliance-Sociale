function nbrPoeplesByActivity()
{
	$.getJSON('/Alliance-Sociale/public/users/listActivity', function(data) 
	{
		var res = "";
		$.getJSON('/Alliance-Sociale/public/activite/showAll', function(activities) 
		{
			$.each(data, function(index, val) 
			{
				var urlA = '/Alliance-Sociale/public/Statistics/users/';
				res += '<div class="col-xs-3">';
				urlA += val.activity+'/1';
				res += '<a href="'+urlA+'">';
				res += '<figure>';
				$.each(activities, function(key, value) 
				{
					 if(value.name == val.activity)
					 {
					 	res += '<img src="/Alliance-Sociale/public/'+value.picture+'" class="img-responsive img-ronded" alt="logo">';
					 }
				});
				if(val.activity == "none")
				{
					res += '<img src="/Alliance-Sociale/public/assets/img/partners/ca.png" class="img-responsive img-ronded" alt="logo">';
				}
				res += '<figcaption class="text-center name">';
				res += val.activity;
				res += '</figcaption>';
				res += '<figcaption class="text-center number">';
				res += val.nbUsers;
				res += ' membres</figcaption>';
				res += '</figure>';
				res += '</a>';
				res += '</div>';
			});
		$('#users').html(res);
		});
	});
}

function nbrTotal()
{
	$.getJSON('/Alliance-Sociale/public/users/listAll', function(data) 
	{
		console.log(data);
		var res = "";
	
		res += '<legend class="text-center">';
		res += data;
		res += ' Personnes dans la base de données';
		res += '</legend>';

		$('#total').html(res);
	});
}

function nbrTotalA()
{
	$.getJSON('/Alliance-Sociale/public/users/listAllA', function(data) 
	{
		var res = "";

		res += '<legend class="text-center">';
		res += data;
		res += ' Adhérents';
		res += '</legend>';

		$('#totalA').html(res);
	});
}