jQuery(document).ready(function($){
	var cartWrapper = $('.cd-cart-container');
	//product id - you don't need a counter in your real project but you can use your real product id	
	
	
	if( cartWrapper.length > 0 ) {
		//store jQuery objects
		var cartBody = cartWrapper.find('.body')
		var cartList = cartBody.find('ul').eq(0);
		var cartTotal = cartWrapper.find('.checkout').find('span');
		var cartTrigger = cartWrapper.children('.cd-cart-trigger');
		var cartCount = cartTrigger.children('.count')
		var addToCartBtn = $('.cd-add-to-cart');
		var undo = cartWrapper.find('.undo');
		var undoTimeoutId;		
		var contador= 0;	
		var enviar = "funcion=carrito";
		var datosCarro;
		$.ajax({
			url: "http://concurvas.com/obtener-carrito",
			headers: {'Access-Control-Allow-Origin': 'http://concurvas.com/obtener-carrito'},
			type: "GET",
			async: false,
			data: enviar,
			success: function(data){
				datosCarro = data;
			}						
		});		
		//alert(datosCarro);
		var items = datosCarro.split(' ## ');
		//var ids = [];
		var productId = 1;
		var color = 'Verde';
		var talla = 'Unica';
		var precio = 95000;
		var nombre = 'Abrigo invierno';
		var url = 'https//';
		while(contador < items.length-1){
			var caracteristicas = items[contador].split('@');
			productId=caracteristicas[3];
			color = caracteristicas[4];
			talla = caracteristicas[5];
			precio = caracteristicas[2];
			nombre = caracteristicas[0];
			url = caracteristicas[6];
			addToCart(color,talla,precio,productId,nombre);	
			$('#cd-product-'+ productId +'').val(caracteristicas[1]);
			quickUpdateCart();					
			contador++;
		}		
		//add product to cart
		addToCartBtn.on('click', function(event){
			event.preventDefault();
			var color = $(this).attr('data-color');
			var talla = $(this).attr('data-talla');
			var precio = $(this).attr('data-price');
			var productId = $(this).attr('data-id');
			var nombre = $(this).text();
			addToCart(color,talla,precio,productId,nombre);
		});

		//open/close cart
		cartTrigger.on('click', function(event){
			event.preventDefault();
			toggleCart();
		});

		//close cart when clicking on the .cd-cart-container::before (bg layer)
		cartWrapper.on('click', function(event){
			if( $(event.target).is($(this)) ) toggleCart(true);
		});

		//delete an item from the cart
		cartList.on('click', '.delete-item', function(event){
			event.preventDefault();
			var foor = $(event.target).parents('.product').find('.quantity').find('label').attr('for');
			var fe = foor.split('-');
			var id = fe[2];
			//alert(id);
			setCantidad(0,id);
			removeProduct($(event.target).parents('.product'));
		});

		
		//update item quantity
		cartList.on('change', 'select', function(event){
			var cantidad = $(this).val();
			var id = $(this).attr('id');
			var id_r = id.split('-');
			//alert(id_r[2]+'@@'+cantidad);
			setCantidad(cantidad,id_r[2]);
			quickUpdateCart();
		});

		//reinsert item deleted from the cart
		undo.on('click', 'a', function(event){
			clearInterval(undoTimeoutId);
			event.preventDefault();
			cartList.find('.deleted').addClass('undo-deleted').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				$(this).off('webkitAnimationEnd oanimationend msAnimationEnd animationend').removeClass('deleted undo-deleted').removeAttr('style');
				quickUpdateCart();
			});
			undo.removeClass('visible');
		});
	}

	function toggleCart(bool) {
		var cartIsOpen = ( typeof bool === 'undefined' ) ? cartWrapper.hasClass('cart-open') : bool;
		
		if( cartIsOpen ) {
			cartWrapper.removeClass('cart-open');
			//reset undo
			clearInterval(undoTimeoutId);
			undo.removeClass('visible');
			cartList.find('.deleted').remove();

			setTimeout(function(){
				cartBody.scrollTop(0);
				//check if cart empty to hide it
				if( Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
			}, 500);
		} else {
			cartWrapper.addClass('cart-open');
		}
	}

	function addToCart(color,talla,precio,productId,nombre,url) {
		var cartIsEmpty = cartWrapper.hasClass('empty');
		//alert(cartIsEmpty);
		//alert(color+'-'+talla+'-'+precio+'-'+nombre);
		//update cart product list
		addProduct(color,talla,precio,nombre,productId,url);
		//update number of items 
		updateCartCount(cartIsEmpty);
		//update total price
		updateCartTotal(precio, true);
		//show cart
		cartWrapper.removeClass('empty');
	}

	function addProduct(color,talla,precio,nombre,productId) {
		//this is just a product placeholder
		//you should insert an item with the selected product info
		//replace productId, productName, price and url with your real product info
		//productId = productId + 1;
		var productAdded = $('<li class="product"><div class="product-image"><a href="#0"><img src="'+url+'" alt="placeholder"></a></div><div class="product-details"><h3 class="letra26pt-pc letra5pt-mv tipografiaHtres tregular"><a href="#0">'+ nombre +' '+color+', Talla '+ talla+'</a></h3><span class="price tipografiaHtres">'+ precio +'</span><div class="actions"><a href="#0" class="delete-item tipografiaHtres">Borrar</a><div class="quantity tipografiaHtres"><label for="cd-product-'+ productId +'">Cant</label><span class="select"><select id="cd-product-'+ productId +'" name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></span></div></div></div></li>');
		cartList.prepend(productAdded);
	}

	function removeProduct(product) {
		clearInterval(undoTimeoutId);
		cartList.find('.deleted').remove();
		
		var topPosition = product.offset().top - cartBody.children('ul').offset().top ,
			productQuantity = Number(product.find('.quantity').find('select').val()),
			productTotPrice = Number(product.find('.price').text().replace('$', '')) * productQuantity;
		
		product.css('top', topPosition+'px').addClass('deleted');

		//update items count + total price
		updateCartTotal(productTotPrice, false);
		updateCartCount(true, -productQuantity);
		undo.addClass('visible');

		//wait 8sec before completely remove the item
		undoTimeoutId = setTimeout(function(){
			undo.removeClass('visible');
			cartList.find('.deleted').remove();
		}, 8000);
	}

	function quickUpdateCart() {
		var quantity = 0;
		var price = 0;
		
		cartList.children('li:not(.deleted)').each(function(){
			var singleQuantity = Number($(this).find('select').val());
			quantity = quantity + singleQuantity;
			//alert(singleQuantity+' '+Number($(this).find('.price').text().replace('$', '')));
			price = price + singleQuantity*Number($(this).find('.price').text().replace('$', ''));
		});
		
		cartTotal.text(price.toFixed(0));
		cartCount.find('li').eq(0).text(quantity);
		cartCount.find('li').eq(1).text(quantity+1);
	}

	function updateCartCount(emptyCart, quantity) {
		if( typeof quantity === 'undefined' ) {			
			var actual = Number(cartCount.find('li').eq(0).text()) + 1;
			var next = actual + 1;			
			if( emptyCart ) {
				cartCount.find('li').eq(0).text(actual);
				cartCount.find('li').eq(1).text(next);
			} else {
				cartCount.addClass('update-count');
				cartCount.find('li').eq(0).text(actual);
				cartCount.find('li').eq(1).text(next);
			}
		} else {
			var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
			var next = actual + 1;
			
			cartCount.find('li').eq(0).text(actual);
			cartCount.find('li').eq(1).text(next);
		}
	}

	function updateCartTotal(price, bool) {
		bool ? cartTotal.text( (Number(cartTotal.text()) + Number(price)).toFixed(0) )  : cartTotal.text( (Number(cartTotal.text()) - Number(price)).toFixed(0) );
	}
	var setCantidad = function ( cantidad, id ) {
	var enviar = "id="+id+"&cantidad="+cantidad;
	var habilitados = 'hola';
	$.ajax({
		url: "http://concurvas.com/set-cantidad",
		headers: {'Access-Control-Allow-Origin': 'http://concurvas.com/set-cantidad'},
		type: "GET",
		async: false,
		data: enviar,
		success: function(data){
			habilitados = data;
		}						
	});	
};

});