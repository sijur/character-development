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
					className: 'Humanoid',
					methodName: 'createCharacterName',
				},
				callBack: function( result )
				{
					$('#characterNameLabel').html( result );
				} 
			});
		});		
	}
};

jQuery(function($)
{
	main.generateName();
});

