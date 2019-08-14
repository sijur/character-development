var main =
{
	writeIt: function(msg)
	{
		console.log(msg);
	},

	ajax: function()
	{
		$('#characterName').click(function()
		{
			$.ajax({
				url: 'LIbrary/callMethod.php',
				type: 'POST',
				data: {
					className: 'NameGenerator',
					methodName: 'setup',
				},
				success: function( result )
				{
					$('#characterNameLabel').html( result );
				}
			} );
		});
	}
};

jQuery(function($)
{
	main.ajax();
});

