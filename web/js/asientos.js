var $boleto = $('#total').val();
$(".check").change(function(e){
	//console.log($(this).attr('id'));
	var $total = $(".acciones input:checked").length;
	if($total > $boleto){
		alert("Excedes numero de asientos");
		$('.check').prop("checked", false);
		$(".imgButaca").attr("src","/SIE/web/img/butacas/butacaVacia.gif");
	}else{
		$(this).is(':checked') ? 
		$("#my_image-"+$(this).attr('id')).attr("src","/SIE/web/img/butacas/miButaca.gif")
		: $("#my_image-"+$(this).attr('id')).attr("src","/SIE/web/img/butacas/butacaVacia.gif")
	}
});