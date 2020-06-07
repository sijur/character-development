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
		$( '#next_button' ).on( 'click', function(e)
		{
			e.preventDefault();
			var group = $( this ).data( 'group' );
			var checkedValue = $( "input[name='" + group + "']:checked" ).val();
		});
	}
};

jQuery(function($)
{
	main.spanToInput();
	main.nextSection();
	// main.chooseRace();
	// main.submitForm();
});

