var main =
{
	writeIt: function(msg)
	{
		console.log(msg);
	},

	generateName: function()
	{
		$('#characterName').click(function()
		{
			_s.ajax({
				type: 'POST',
				url: 'Library/callMethod.php',
				data: {
					className: 'NameGenerator',
					methodName: 'setup',
				},
				callBack: function( result )
				{
					$('#characterNameLabel').html( result );
				} 
			});
			//sapphire.ajax('POST', 'Library/callMethod.php', 'setup');
		});
		
	}
};

jQuery(function($)
{
	main.generateName();
});

