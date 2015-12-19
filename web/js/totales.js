$('.cantidad').click(function(e){
	//alert('clicked');
	$precio =($('#precio-'+$(this).attr('id')).attr('value'));
	$cantidad =  ($(this).val());
	$total = 0;
	$('#sub-'+$(this).attr('id')).html($precio*$cantidad);

	$('.cantidad').each(function(index, value){
		//console.log($(this).val());
		$total+=($(this).val()*$('#precio-'+$(this).attr('id')).attr('value'));
	});
	$('#total').html($total);	
});