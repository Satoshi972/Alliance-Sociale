function nbrPoeplesByActivity()
{
	$.getJSON('/Alliance-Sociale/public/users/listActivity', function(data) 
	{
		var res = "";
		$.getJSON('/Alliance-Sociale/public/activite/showAll', function(activities) 
		{
			$.each(data, function(key, value) 
			{
				$.each(activities, function(index, val) 
				{			
					var urlA = '/Alliance-Sociale/public/Statistics/users/';
					res += '<div class="col-xs-3">';
					urlA += val.act_id+'/1';
					res += '<a href="'+urlA+'">';
					res += '<figure>';
					
					if(val.name == "none")
					{
						res += '<img src="/Alliance-Sociale/public/assets/img/partners/ca.png" class="img-responsive img-ronded" alt="logo">';
					}
					else
					{
						res += '<img src="/Alliance-Sociale/public/'+val.picture+'" class="img-responsive img-ronded" alt="logo">';
					}

					res += '<figcaption class="text-center name">';
					res += val.name;
					res += '</figcaption>';
					res += '<figcaption class="text-center number">';
					res += value.nbUsers;
					res += ' membres</figcaption>';
					res += '</figure>';
					res += '</a>';
					res += '</div>';
				});
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
	
		res += '<legend class="text-center" style="color: #DAA520 !important;">';
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

		res += '<legend class="text-center" style="color: #DAA520 !important;">';
		res += data;
		res += ' Adhérents';
		res += '</legend>';

		$('#totalA').html(res);
	});
}