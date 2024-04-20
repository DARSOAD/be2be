jQuery(document).ready(function($){
	function ProductBuilder( element ) {
		this.element = element;
		this.stepsWrapper = this.element.children('.cd-builder-steps');
		this.steps = this.element.find('.builder-step');
		//store some specific bulider steps
		this.models = this.element.find('[data-selection="models"]'); 
		this.summary;
		this.tallas;
		this.optionsLists = this.element.find('.options-list');
		//bottom summary 
		this.fixedSummary = this.element.find('.cd-builder-footer');
		this.modelPreview = this.element.find('.selected-product').find('img');
		this.totPriceWrapper = this.element.find('.tot-price').find('b');
		//builder navigations
		this.mainNavigation = this.element.find('.cd-builder-main-nav');
		this.secondaryNavigation = this.element.find('.cd-builder-secondary-nav');
		this.smry = this.element.find('.summary-list');
		//used to check if the builder content has been loaded properly
		this.loaded = true;
		// bind builder events
		this.bindEvents();
	}

	ProductBuilder.prototype.bindEvents = function() {
		var self = this;
		//detect click on the left navigation
		this.mainNavigation.on('click', 'li:not(.active)', function(event){
			event.preventDefault();
			self.loaded && self.newContentSelected($(this).index());
		});

		//detect click on bottom fixed navigation
		this.secondaryNavigation.on('click', '.nav-item li:not(.buy)', function(event){ 
			event.preventDefault();
			var stepNumber = ( $(this).parents('.next').length > 0 ) ? $(this).index() + 1 : $(this).index() - 1;
			self.loaded && self.newContentSelected(stepNumber);
		});
		//detect click on one element in an options list (e.g, models, accessories)
		this.optionsLists.on('click', '.js-option', function(event){
			self.updateListOptions($(this));
		});
		//detect clicks on customizer controls (e.g., colors ...)
		this.stepsWrapper.on('click', '.cd-product-customizer a', function(event){
			event.preventDefault();
			self.customizeModel($(this));
		});
		//detect clicks on customizer controls (e.g., colors ...)
		this.stepsWrapper.on('click', '.cd-product-customizer a.colores', function(event){
			var clr = $('.cd-product-customizer').children('.selected').children('a').attr('data-color');
			var id = $('#colores').children('.cd-step-content').children('header').children('h1').attr('id');	
			var url = $('.cd-product-previews').children('.selected').children('img').attr('src');
			self.habilitarTallas(id,clr,url);			
		});
	};

	ProductBuilder.prototype.newContentSelected = function(nextStep) {
		//first - check if a model has been selected - user can navigate through the builder
		if( this.fixedSummary.hasClass('disabled') ) {
			//no model has been selected - show alert
			this.fixedSummary.addClass('show-alert');
		} else {
			//model has been selected so show new content 
			//first check if the color step has been completed - in this case update the product bottom preview
			if( this.steps.filter('.active').is('[data-selection="colors"]') ) {
				//in this case, color has been changed - update the preview image

				var imageSelected = this.steps.filter('.active').find('.cd-product-previews').children('.selected').children('img').attr('src');
				this.modelPreview.attr('src', imageSelected);
			}
			//if Summary is the selected step (new step to be revealed) -> update summary content
			if( nextStep + 1 >= this.steps.length ) {
				this.createSummary();
			}
			
			this.showNewContent(nextStep);
			this.updatePrimaryNav(nextStep);
			this.updateSecondaryNav(nextStep);
		}
	}

	ProductBuilder.prototype.showNewContent = function(nextStep) {
		var actualStep = this.steps.filter('.active').index() + 1;
		if( actualStep < nextStep + 1 ) {
			//go to next section
			this.steps.eq(actualStep-1).removeClass('active back').addClass('move-left');
			this.steps.eq(nextStep).addClass('active').removeClass('move-left back');
		} else {
			//go to previous section
			this.steps.eq(actualStep-1).removeClass('active back move-left');
			this.steps.eq(nextStep).addClass('active back').removeClass('move-left');
		}
	}

	ProductBuilder.prototype.updatePrimaryNav = function(nextStep) {
		this.mainNavigation.find('li').eq(nextStep).addClass('active').siblings('.active').removeClass('active');
	}

	ProductBuilder.prototype.updateSecondaryNav = function(nextStep) {
		( nextStep == 0 ) ? this.fixedSummary.addClass('step-1') : this.fixedSummary.removeClass('step-1');

		this.secondaryNavigation.find('.nav-item.next').find('li').eq(nextStep).addClass('visible').removeClass('visited').prevAll().removeClass('visited').addClass('visited').end().nextAll().removeClass('visible visited');
		this.secondaryNavigation.find('.nav-item.prev').find('li').eq(nextStep).addClass('visible').removeClass('visited').prevAll().removeClass('visited').addClass('visited').end().nextAll().removeClass('visible visited');
	}

	ProductBuilder.prototype.createSummary = function() {	
		var self = this;
		
		this.steps.each(function(){		
			//this function may need to be updated according to your builder steps and summary
			var step = $(this);
			self.summary.find('.summary-cantidad').find('.qty').attr('onchange', 'setCantidad(this.value,this.name)');
			if( $(this).data('selection') == 'colors' ) {
				//create the Color summary
				var colorSelected = $(this).find('.cd-product-customizer').find('.selected'),
					color = colorSelected.children('a').data('color'),
					colorName = colorSelected.data('content'),
					imageSelected = $(this).find('.cd-product-previews').find('.selected img').attr('src');			
			} else if( $(this).data('selection') == 'tallas' ) {
				var tallaSelected = $(this).find('.cd-product-customizer').find('.selected'),
					talla = tallaSelected.children('a').data('talla'),
					tallaName = tallaSelected.data('content'),
					imageSelected = $(this).find('.cd-product-previews').find('.selected img').attr('src');	
			}
		});
	}

	ProductBuilder.prototype.updateListOptions = function(listItem) {
		var self = this;
		
		if( listItem.hasClass('js-radio') ) {
			//this means only one option can be selected (e.g., models) - so check if there's another option selected and deselect it
			var alreadySelectedOption = listItem.siblings('.selected'),
				price = (alreadySelectedOption.length > 0 ) ? -Number(alreadySelectedOption.data('price')) : 0;

			//if the option was already selected and you are deselecting it - price is the price of the option just clicked
			( listItem.hasClass('selected') ) 
				? price = -Number(listItem.data('price'))
				: price = Number(listItem.data('price')) + price;

			//now deselect all the other options
			alreadySelectedOption.removeClass('selected');
			//toggle the option just selected
			listItem.toggleClass('selected');
			//update totalPrice - only if the step is not the Models step
			
			//(listItem.parents('[data-selection="models"]').length == 0) && self.updatePrice(price);
		} else {
			//more than one options can be selected - just need to add/remove the one just clicked
			var price = ( listItem.hasClass('selected') ) ? -Number(listItem.data('price')) : Number(listItem.data('price'));
			//toggle the option just selected
			listItem.toggleClass('selected');
			//update totalPrice
			//self.updatePrice(price);
		}
		
		if( listItem.parents('[data-selection="models"]').length > 0 ) {
			//since a model has been selected/deselected, you need to update the builder content
			self.updateModelContent(listItem);
		}
	};

	ProductBuilder.prototype.updateModelContent = function(model) {
		var self = this;
		if( model.hasClass('selected') ) {
			var modelType = model.data('model'),
				modelImage = model.find('img').attr('src');

			//need to update the product image in the bottom fixed navigation
			this.modelPreview.attr('src', modelImage);

			//need to update the content of the builder according to the selected product
			//first - remove the contet which refers to a different model
			this.models.siblings('li').remove();
			//second - load the new content
			
		    self.loaded = true;
		    model.addClass('loaded');
		        	//activate top and bottom navigations
		    self.fixedSummary.add(self.mainNavigation).removeClass('disabled show-alert');
		        	//update properties of the object
			var htmll = self.nuevoHtml(modelType);
			self.models.after(htmll);
			self.steps = self.element.find('.builder-step');
			self.summary = self.element.find('[data-selection="summary"]');
					//detect click on one element in an options list
			self.optionsLists.off('click', '.js-option');
			self.optionsLists = self.element.find('.options-list');
			self.optionsLists.on('click', '.js-option', function(event){
			self.updateListOptions($(this));
			});
			self.element.find('.first-load').removeClass('first-load');				
			//update price (no adding/removing)
			this.totPriceWrapper.text(model.data('price'));
			/*var clr = $('.cd-product-customizer').children('.selected').children('a').attr('data-color');
			var id = $('#colores').children('.cd-step-content').children('header').children('h1').attr('id');				
			self.habilitarTallas(id,clr);*/
		} else {
			//no model has been selected
			this.fixedSummary.add(this.mainNavigation).addClass('disabled');
			//update price
			var precioInicial = precioCarro();	
			//alert(precioInicial);
			this.totPriceWrapper.text(precioInicial);

			this.models.find('.loaded').removeClass('loaded');
		}
	};

	ProductBuilder.prototype.customizeModel = function(target) {
		var parent = target.parent('li');
			index = parent.index()-2;
		//alert(index);
		//update final price
		var price = ( parent.hasClass('selected') )
			? 0
			: Number(parent.data('price')) - parent.siblings('.selected').data('price');
		
		//this.updatePrice(price);
		target.parent('li').addClass('selected').siblings().removeClass('selected').parents('.cd-product-customizer').siblings('.cd-product-previews').children('.selected').removeClass('selected').end().children('li').eq(index).addClass('selected');
	};

	ProductBuilder.prototype.updatePrice = function(price) {
		var actualPrice = Number(this.totPriceWrapper.text()) + price;
		this.totPriceWrapper.text(actualPrice);
	};
	ProductBuilder.prototype.nuevoHtml = function(id) {
		var enviar = "id="+id+"&funcion=cool";
		var datosHtml = 'hola';
		$.ajax({
			url: "https://concurvas.com/controlador",
			headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/controlador'},
			type: "POST",
			async: false,
			data: enviar,
			success: function(data){
				datosHtml = data;
			}						
		});
		//alert(datosHtml);
		return datosHtml;		
	};
	ProductBuilder.prototype.habilitarTallas = function(id,color,url) {
		var todasTallas = ['s','m','l','xl','u'];
		$("a[data-talla]").removeClass('not-active');
		var enviar = "id="+id+"&color="+color+"&funcion=coolTallas";
		var habilitados = 'hola';
		$.ajax({
			url: "https://concurvas.com/controlador",
			headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/controlador'},
			type: "POST",
			async: false,
			data: enviar,
			success: function(data){
				habilitados = data;
			}						
		});
		var deshabilitar = habilitados.split('-');
		var contador = 0;
		var cant = $('#misTallas').find('.cd-step-content').attr("id");
		var cantidad = parseInt(cant);
		var datoshtml = " ";
		var micontador = 0;
		while(cantidad>0){
			if(micontador==0){
			datoshtml = datoshtml.concat('<li class="selected"><img src="', url,'" alt="Product Preview" class="product-preview"></li>');}
			else{				
			datoshtml = datoshtml.concat('<li><img src="', url,'" alt="Product Preview" class="product-preview"></li>');
			}
			micontador++;
			cantidad--;
		}
		$("#poneraqui").text("");
		$("#poneraqui").html(datoshtml);
		//alert(datoshtml);
		while(contador < deshabilitar.length-1){
			$("a[data-talla='" + deshabilitar[contador] +"']").addClass('not-active');
			contador++;
			//datoshtml = datoshtml.concat(contador);
		}				
		//alert(contador);
		$("a[data-talla]").parent('li').removeClass('selected');
		var contador = -1;
		var contador2 = 0;
		while(contador < todasTallas.length){
			contador++;
			while(contador2 < deshabilitar.length-1){
				if(todasTallas[contador] === deshabilitar[contador2]){
					$("a[data-talla='" + todasTallas[contador] +"']").parent('li').removeClass('selected');
					contador2 = deshabilitar.length+1;
				}else{contador2++;}				
			}
			if(contador2===deshabilitar.length-1){
				$("a[data-talla='" + todasTallas[contador] +"']").parent('li').addClass('selected');
				contador = todasTallas.length+1;
			}
			contador2 = 0;
		}
		
		//return habilitados;		
	};
	if( $('.cd-product-builder').length > 0 ) {
		$('.cd-product-builder').each(function(){
			//create a productBuilder object for each .cd-product-builder
			new ProductBuilder($(this));
		});
	}	
});
var descripcion = function(){
	var descripcion = '0';
	$.ajax({
		url: "https://concurvas.com/descripcion",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/descripcion'},
		type: "GET",
		async: false,
		success: function(data){
			descripcion = data;
		}						
	});
	alert(descripcion);
	return descripcion; 
};
var setCantidad = function ( cantidad, id ) {
	var id_1 = id.split('[');
    var id_2 = id_1[1].split(']');
    var id_real = id_2[0];
	var enviar = "id="+id_real+"&cantidad="+cantidad;
	var habilitados = 'hola';
	$.ajax({
		url: "https://concurvas.com/set-cantidad",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/set-cantidad'},
		type: "GET",
		async: false,
		data: enviar,
		success: function(data){
			habilitados = data;
		}						
	});
	var actualPrice = precioCarro();
	$('.tot-price').find('b').text(actualPrice);
	$("[name='amount']").val(actualPrice);
	//var descri = descripcion();
	//$("[name='description']").val(descri);
};
$('#elResumen').click(function() {
		var id = $('.models-list').find('.selected').data('model');
		//alert(id);
		var color = $('#colores').find('.cd-product-customizer').find('.selected').find('a').data('color');
		//alert(color);
		var talla = $('#misTallas').find('.cd-product-customizer').find('.selected').find('a').data('talla');
		//alert(talla);
		var htmll = agregarResumen(id,color,talla,1);
		//alert('este es mi resumen');
  		//var htmll = nuevoResumen();
		//alert(htmll);
		var tallas = $('[data-selection="tallas"]');
		tallas.after(htmll);		
		$('.qty').attr('onchange', 'setCantidad(this.value,this.name)');
		var precio = $('.models-list').find('.selected').data('price');
		var actualPrice = Number($('#preciocarro').text()) + precio;
		$('.tot-price').find('b').text(actualPrice);
		$("[name='amount']").val(actualPrice);
		//var descri = descripcion();
		//$("[name='description']").val(descri);
	spiner();
		
});
var agregarProducto = function(id,color,talla,cantidad){
	var enviar = "id="+id+"&color="+color+"&talla="+talla+"&cantidad="+cantidad;
	var habilitados = 'hola';
	$.ajax({
		url: "https://concurvas.com/agregar",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/agregar'},
		type: "GET",
		async: false,
		data: enviar,
		success: function(data){
			habilitados = data;
		}						
	});
};
var agregarResumen = function(id,color,talla,cantidad){
	var enviar = "id="+id+"&color="+color+"&talla="+talla+"&cantidad="+cantidad+"&funcion=agregarResumen";
	var datosHtml = 'hola';
	$.ajax({
		url: "https://concurvas.com/agregarresumen",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/agregarresumen'},
		type: "GET",
		async: false,
		data: enviar,
		success: function(data){
			datosHtml = data;
		}						
	});
	//alert(datosHtml);
	return datosHtml;		
};
var nuevoResumen = function() {
		var enviar = "funcion=coolResumen";
		var datosHtml = 'hola';
		$.ajax({
			url: "https://concurvas.com/controlador",
			headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/controlador'},
			type: "POST",
			async: false,
			data: enviar,
			success: function(data){
				datosHtml = data;
			}						
		});
		//alert(datosHtml);
		return datosHtml;		
};
$('#lasTallas').click(function(){$('li').remove("#remover");});
var removerCarrito = function(id){
	var id_se=id.substr(0, id.length-2);
	var id_set = "cart["+id_se+"][qty]";
	setCantidad(0,id_set);
	var actualPrice = precioCarro();
	$('.tot-price').find('b').text(actualPrice);
	$("[name='amount']").val(actualPrice);
	//var descri = descripcion();
	//$("[name='description']").val(descri);
	$('#'+id).remove();
};
var precioCarro = function(){
	var precio = '0';
	$.ajax({
		url: "https://concurvas.com/precio-total",
		headers: {'Access-Control-Allow-Origin': 'https://concurvas.com/precio-total'},
		type: "GET",
		async: false,
		success: function(data){
			precio = data;
		}						
	});
	return precio; 
};
var spiner = function(){
	 "use strict"
	 
	 var spacePressed = false
    var originalVal = $.fn.val
    $.fn.val = function (value) {
        if (arguments.length >= 1) {
            if (this[0] && this[0]["bootstrap-input-spinner"] && this[0].setValue) {
                this[0].setValue(value)
            }
        }
        return originalVal.apply(this, arguments)
    }

    $.fn.InputSpinner = $.fn.inputSpinner = function (options) {

        var config = {
            decrementButton: "<strong>-</strong>", // button text
            incrementButton: "<strong>+</strong>", // ..
            groupClass: "", // css class of the input-group (sizing with input-group-sm, input-group-lg)
            buttonsClass: "btn-outline-secondary",
            buttonsWidth: "2.5rem",
            textAlign: "center",
            autoDelay: 500, // ms holding before auto value change
            autoInterval: 100, // speed of auto value change
            boostThreshold: 10, // boost after these steps
            boostMultiplier: "auto", // you can also set a constant number as multiplier
            locale: null // the locale for number rendering; if null, the browsers language is used
        }
        for (var option in options) {
            config[option] = options[option]
        }

        var html = '<div class="input-group ' + config.groupClass + '">' +
            '<div class="input-group-prepend">' +
            '<button class="btn btn-decrement ' + config.buttonsClass + '" type="button">' + config.decrementButton + '</button>' +
            '</div>' +
            '<input type="text" style="text-align: ' + config.textAlign + '" class="form-control"/>' +
            '<div class="input-group-append">' +
            '<button class="btn btn-increment ' + config.buttonsClass + '" type="button">' + config.incrementButton + '</button>' +
            '</div>' +
            '</div>'

        var locale = config.locale || navigator.language || "en-US"

        this.each(function () {
            var $original = $(this)
            $original[0]["bootstrap-input-spinner"] = true
            $original.hide()

            var autoDelayHandler = null
            var autoIntervalHandler = null
            var autoMultiplier = config.boostMultiplier === "auto"
            var boostMultiplier = autoMultiplier ? 1 : config.boostMultiplier

            var $inputGroup = $(html)
            var $buttonDecrement = $inputGroup.find(".btn-decrement")
            var $buttonIncrement = $inputGroup.find(".btn-increment")
            var $input = $inputGroup.find("input")

            var min = parseFloat($original.prop("min")) || 0
            var max = isNaN($original.prop("max")) || $original.prop("max") === "" ? Infinity : parseFloat($original.prop("max"))
            var step = parseFloat($original.prop("step")) || 1
            var stepMax = parseInt($original.attr("data-step-max")) || 0
            var decimals = parseInt($original.attr("data-decimals")) || 0

            var numberFormat = new Intl.NumberFormat(locale, {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals
            })
            var value = parseFloat($original[0].value)
            var boostStepsCount = 0

            var prefix = $original.attr("data-prefix") || ""
            var suffix = $original.attr("data-suffix") || ""

            if (prefix) {
                var prefixElement = $('<span class="input-group-text">' + prefix + '</span>')
                $inputGroup.find(".input-group-prepend").append(prefixElement)
            }
            if (suffix) {
                var suffixElement = $('<span class="input-group-text">' + suffix + '</span>')
                $inputGroup.find(".input-group-append").prepend(suffixElement)
            }

            $original[0].setValue = function (newValue) {
                setValue(newValue)
            }

            var observer = new MutationObserver(function () {
                copyAttributes()
            })
            observer.observe($original[0], {attributes: true})
            copyAttributes()

            $original.after($inputGroup)

            setValue(value)

            $input.on("paste input change focusout", function (event) {
                var newValue = $input[0].value
                var focusOut = event.type === "focusout"
                if (!(locale === "en-US" || locale === "en-GB" || locale === "th-TH")) {
                    newValue = newValue.replace(/[. ]/g, '').replace(/,/g, '.')
                }
                setValue(newValue, focusOut)
                dispatchEvent($original, event.type)
            })

            onPointerDown($buttonDecrement[0], function () {
                stepHandling(-step)
            })
            onPointerDown($buttonIncrement[0], function () {
                stepHandling(step)
            })
            onPointerUp(document.body, function () {
                resetTimer()
            })

            function setValue(newValue, updateInput) {
                if(updateInput === undefined) {
                    updateInput = true
                }
                if (isNaN(newValue) || newValue === "") {
                    $original[0].value = ""
                    if (updateInput) {
                        $input[0].value = ""
                    }
                    value = 0
                } else {
                    newValue = parseFloat(newValue)
                    newValue = Math.min(Math.max(newValue, min), max)
                    newValue = Math.round(newValue * Math.pow(10, decimals)) / Math.pow(10, decimals)
                    $original[0].value = newValue
                    if (updateInput) {
                        $input[0].value = numberFormat.format(newValue)
                    }
                    value = newValue
                }
            }

            function dispatchEvent($element, type) {
                if (type) {
                    setTimeout(function () {
                        var event;
                        if(typeof(Event) === 'function') {
                            event = new Event(type, {bubbles: true})
                        } else { // IE
                            event = document.createEvent('Event');
                            event.initEvent(type, true, true);
                        }
                        $element[0].dispatchEvent(event)
                    })
                }
            }

            function stepHandling(step) {
                if(!$input[0].disabled) {
                    calcStep(step)
                    resetTimer()
                    autoDelayHandler = setTimeout(function () {
                        autoIntervalHandler = setInterval(function () {
                            if (boostStepsCount > config.boostThreshold) {
                                if (autoMultiplier) {
                                    calcStep(step * parseInt(boostMultiplier, 10))
                                    if(boostMultiplier < 100000000) {
                                        boostMultiplier = boostMultiplier * 1.1
                                    }
                                    if (stepMax) {
                                        boostMultiplier = Math.min(stepMax, boostMultiplier)
                                    }
                                } else {
                                    calcStep(step * boostMultiplier)
                                }
                            } else {
                                calcStep(step)
                            }
                            boostStepsCount++
                        }, config.autoInterval)
                    }, config.autoDelay)
                }
            }

            function calcStep(step) {
                if (isNaN(value)) {
                    value = 0
                }
                setValue(Math.round(value / step) * step + step)
                dispatchEvent($original, "input")
                dispatchEvent($original, "change")
            }

            function resetTimer() {
                boostStepsCount = 0
                boostMultiplier = boostMultiplier = autoMultiplier ? 1 : config.boostMultiplier
                clearTimeout(autoDelayHandler)
                clearTimeout(autoIntervalHandler)
            }

            function copyAttributes() {
                $input.prop("required", $original.prop("required"))
                $input.prop("placeholder", $original.prop("placeholder"))
                var disabled = $original.prop("disabled")
                $input.prop("disabled", disabled)
                $buttonIncrement.prop("disabled", disabled)
                $buttonDecrement.prop("disabled", disabled)
                $input.prop("class", "form-control " + $original.prop("class"))
                $inputGroup.prop("class", "input-group " + $original.prop("class") + " " + config.groupClass)
            }

        })

    }

    function onPointerUp(element, callback) {
        element.addEventListener("mouseup", function (e) {
            callback(e)
        })
        element.addEventListener("touchend", function (e) {
            callback(e)
        })
        element.addEventListener("keyup", function (e) {
            if (e.keyCode === 32) {
                spacePressed = false
                callback(e)
            }
        })
    }

    function onPointerDown(element, callback) {
        element.addEventListener("mousedown", function (e) {
            e.preventDefault()
            callback(e)
        })
        element.addEventListener("touchstart", function (e) {
            if(e.cancelable) {
                e.preventDefault()
            }
            callback(e)
        })
        element.addEventListener("keydown", function (e) {
            if (e.keyCode === 32 && !spacePressed) {
                spacePressed = true
                callback(e)
            }
        })
    }
	$("input[type='number']").inputSpinner();
    $("input.small").inputSpinner({groupClass: "input-group-sm"});
    $("input.large").inputSpinner({groupClass: "input-group-lg"});
};