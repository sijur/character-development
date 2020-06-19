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
		var self = this;

		$( '#next_button' ).on( 'click', function(e)
		{
			// prevent default action
			e.preventDefault();

			// grab the group that we're working on currently.
			var group = $( this ).data( 'group' );

			// get the value that is chosen.
			var checkedValue = $( "input[name='" + group + "']:checked" ).val();

			// store the value in the session.
			sessionStorage.setItem( group, checkedValue );

			// set the value in the character quick view.
			$( '#' + group + 'Content' ).html( sessionStorage.getItem( group ) );

			// clear the current section.
			self.clearSection( group );

			// create the link in the breadcrumb section and activate it.

			// get the next section and display it.
		});
	},

	clearSection: function( section )
	{
		console.log(section);
	}
};

jQuery(function()
{
	main.spanToInput();
	main.nextSection();
	// main.chooseRace();
	// main.submitForm();
});

