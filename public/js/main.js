var main =
{
	chooseRace: function()
	{
		$( '#raceSelectorBtn' ).on( 'click', function()
		{
			_s.ajax( {
				type: 'POST',
				url: 'Library/callMethod.php',
				data: {
					className: 'RaceSelector',
					methodName: 'saveRace',
					value: $("select[name='raceTypes']").val()
				},
				callBack: function( result )
				{
					if ( result !== '' )
					{
						console.log( result );
					}
				}
			} );
		} );
	},

	submitForm: function()
	{
		$('#loginButton').on('click', function(evt)
		{
			evt.preventDefault();
			_s.ajax({
				type: 'POST',
				url: '/login/verify',
				data: {
					username: $('#userName').val(),
					password: $('#password').val()
				},
				callBack: function( result )
				{
					console.log(result);
				}
			});
		});
	}
};

jQuery(function($)
{
	main.chooseRace();
	// main.submitForm();
});

