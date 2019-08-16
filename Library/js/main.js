var main =
{
	generateName: function()
	{
		$('#characterName').click(function()
		{
			_s.ajax({
				type: 'POST',
				url: 'Library/callMethod.php',
				data: {
					className: 'NameGenerator',
					methodName: 'getName'
				},
				callBack: function( result )
				{
					// $('#characterNameLabel').html( result );
					$('#characterNameInput').val( result );
				} 
			});
		});

		$('#characterNameInput').on('blur', function()
		{
			_s.ajax({
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
			});
		});

		$('#clearLink').on('click', function(evt)
		{
			evt.preventDefault();
			$('#characterNameInput').val('');
		});
	}
};

jQuery(function($)
{
	main.generateName();
});

