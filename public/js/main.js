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
	},

	spanToInput: function()
	{
		$( '.spanButton' ).on( 'click', function()
		{
			if ( $( '.spanButton' ).hasClass( 'active' ) )
			{
				$( '.spanButton' ).removeClass( 'active' );
			}

			$( this ).addClass( 'active' );

			var id = this.id.split( '_' );
			$( '#' + id[ 1 ] ).prop( "checked", true );

		});
	},

	nextSection: function()
	{
		$( '' )
	}
};

jQuery(function($)
{
	main.spanToInput();
	// main.chooseRace();
	// main.submitForm();
});

