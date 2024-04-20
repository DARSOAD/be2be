// JavaScript Document
var cantidad = function(color,talla,id){
	var enviar = "color="+color+"&talla="+talla+"&id="+id+"&funcion=cantidad";
	//alert(enviar);
	var stock;
	$.ajax({
		url: "https://concurvas.com/concurvas/controlador",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/controlador'},
		type: "POST",
		async: false,
        data: enviar,
		success: function(data){
			stock = data;
		}						
	});
	//alert(stock);
	return stock;
};
var actualizar = function(cantidad,id){
	var enviar = "cantidad="+cantidad+"&id="+id+"&funcion=actualizar";;
	var precio;
	alert(enviar);
	$.ajax({
		url: "https://concurvas.com/concurvas/controlador",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/controlador'},
		type: "POST",
		async: false,
        data: enviar,
		success: function(data){
			precio = data;
		}						
	});
	alert(precio);
	return precio;
};