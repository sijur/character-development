var main =
{
	generateName: function()
	{
		$( '#characterName' ).on( 'click', function()
		{
			_s.ajax( {
				type: 'POST',
				url: 'Library/callMethod.php',
				data: {
					className: 'NameGenerator',
					methodName: 'getName'
				},
				callBack: function( result )
				{
					// $('#characterNameLabel').html( result );
					$( '#characterNameInput' ).val( result );
				} 
			} );
		} );

		$( '#characterNameInput' ).on( 'blur', function()
		{
			_s.ajax( {
				type: 'POST',
				url: 'Library/callMethod.php',
				data: {
					className: 'NameGenerator',
					methodName: 'saveName',
					value: this.value
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

		$( '#clearLink' ).on( 'click', function( evt )
		{
			evt.preventDefault();
			$( '#characterNameInput' ).val( '' );
		} );
	},

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


	}
};

jQuery(function($)
{
	main.generateName();
	main.chooseRace();
});

