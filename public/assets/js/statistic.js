function activity()
{
	$.getJSON('/Alliance-Sociale/public/activite/showAll', function(data) 
	{
		return data;
	});
}

function nbrPoeplesByActivity()
{
	$.getJSON('/Alliance-Sociale/public/users/listActivity', function(data) 
	{
		var res = "";
		var activities = activity();
		console.log(activities);
		$.each(data, function(index, val) 
		{
			res += '<figure>';
			$.each(activities, function(key, value) 
			{
				 if(value.name == val.activity)
				 {
				 	res += '<img src="/Alliance-Sociale/public/'+value.picture+'" class="img-responsive img-ronded">';
				 }
			});
			res += '<figcaption>';
			res += val.activity;
			res += '</figcaption>';
			res += '</figure>';



			// res += '<div class="list-group-item text-center>';
			// res += '<div class="list-group-item-heading">';
			// res += '<a href="/Alliance-Sociale/public/Statistics/users/'+val.activity+'">';
			// if(val.activity == "")
			// {
			// 	res += 'Sans activité';
			// }
			// else
			// {
			// 	res += val.activity;
			// }
			// res += '</a>';
			// res += '</div>';
			// res += '<div class="list-group-item-text">';
			// res += val.nbUsers;
			// res += '</div>';
			// res += '</div>';
		});
		$('#users').html(res);
	});
}

function nbrTotal()
{
	$.getJSON('/Alliance-Sociale/public/users/listAll', function(data) 
	{
		
	});
}