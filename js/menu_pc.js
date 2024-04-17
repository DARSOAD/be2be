jQuery(document).ready(function($) {
    const tarjetas = document.querySelectorAll('.tarjetaClientes');

    tarjetas.forEach(tarjeta => {
        const parrafo = tarjeta.querySelector('.contenidoCliente p');
        const tituloH1 = tarjeta.querySelector('.contenidoCliente h1');
        const contenidoCompleto = tarjeta.querySelector('.contenidoCliente .contenidoCompleto');
        const imagen = tarjeta.querySelector('.imagenCliente img');
        const originalSrc = imagen.getAttribute('src');
        const originalSrcset = imagen.getAttribute('srcset');

        tarjeta.addEventListener('mouseover', () => {
            tarjeta.style.borderColor = 'gold';
            imagen.setAttribute('src', 'https://a1securitynyc.com/wp-content/themes/a1security/imagenes/iconos/LOGO_ESCUDO.jpg');
            imagen.setAttribute('srcset', 'https://a1securitynyc.com/wp-content/themes/a1security/imagenes/iconos/LOGO_ESCUDO.jpg 350w, https://a1securitynyc.com/wp-content/themes/a1security/imagenes/iconos/LOGO_ESCUDO.jpg 300w');
            tituloH1.style.display  = 'none';
            parrafo.style.display  = 'none';
            contenidoCompleto.style.display  = 'block';
        });

        tarjeta.addEventListener('mouseout', () => {
            tarjeta.style.borderColor = '#000';
            imagen.setAttribute('src', originalSrc);
            imagen.setAttribute('srcset', originalSrcset);
            tituloH1.style.display  = 'block'; 
            parrafo.style.display  = 'block'; 
            contenidoCompleto.style.display  = 'none'; 
            

        });
    });




    function morphDropdown(element) {
        this.element = element;
        this.mainNavigation = this.element.find('.main-nav');
        this.mainNavigationItems = this.mainNavigation.find('.has-dropdown');
        this.dropdownList = this.element.find('.dropdown-list');
        this.dropdownWrappers = this.dropdownList.find('.dropdown');
        this.dropdownItems = this.dropdownList.find('.content');
        this.dropdownBg = this.dropdownList.find('.bg-layer');
        this.mq = this.checkMq();
        this.bindEvents();
        this.none = this.mainNavigation.find('.none');
    }
    morphDropdown.prototype.checkMq = function() {
        var self = this;
        return window.getComputedStyle(self.element.get(0), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "").split(', ');
    };
    morphDropdown.prototype.bindEvents = function() {
        var self = this;
        this.mainNavigationItems.mouseenter(function(event) {
            self.showDropdown($(this));
        }).mouseleave(function() {
            setTimeout(function() {
                if (self.mainNavigation.find('.has-dropdown:hover').length == 0 && self.element.find('.dropdown-list:hover').length == 0) self.hideDropdown();
            }, 50);
        });
        this.dropdownList.mouseleave(function() {
            setTimeout(function() {
                (self.mainNavigation.find('.has-dropdown:hover').length == 0 && self.element.find('.dropdown-list:hover').length == 0) && self.hideDropdown();
            }, 50);
        });
        this.mainNavigationItems.on('touchstart', function(event) {
            var selectedDropdown = self.dropdownList.find('#' + $(this).data('content'));
            if (!self.element.hasClass('is-dropdown-visible') || !selectedDropdown.hasClass('active')) {
                event.preventDefault();
                self.showDropdown($(this));
            }
        });
        this.element.on('click', '.nav-trigger', function(event) {
            event.preventDefault();
            self.element.toggleClass('nav-open');
        });
    };
    morphDropdown.prototype.showDropdown = function(item) {
        this.mq = this.checkMq();
        if (this.mq == 'desktop') {
            var self = this;
            var selectedDropdown = this.dropdownList.find('#' + item.data('content')),
                selectedDropdownHeight = selectedDropdown.innerHeight(),
                selectedDropdownWidth = selectedDropdown.children('.content').innerWidth();
			//alert('Window: '+window.innerWidth+'Offset: '+item.offset().left+' Width: '+item.innerWidth()+' Children width: '+selectedDropdownWidth);
            var selectedDropdownLeft = item.offset().left + (item.innerWidth() / 2) - (selectedDropdownWidth / 2);
            this.updateDropdown(selectedDropdown, parseInt(selectedDropdownHeight), selectedDropdownWidth, parseInt(selectedDropdownLeft));
            this.element.find('.active').removeClass('active');
            selectedDropdown.addClass('active').removeClass('move-left move-right').prevAll().addClass('move-left').end().nextAll().addClass('move-right');
            item.addClass('active');
            if (!this.element.hasClass('is-dropdown-visible')) {
                setTimeout(function() {
                    self.element.addClass('is-dropdown-visible');
                }, 10);
            }
        }
    };
    morphDropdown.prototype.updateDropdown = function(dropdownItem, height, width, left) {
		if(left<0){left=left+(left*(-2));}
        this.dropdownList.css({
            '-moz-transform': 'translateX(' + left + 'px)',
            '-webkit-transform': 'translateX(' + left + 'px)',
            '-ms-transform': 'translateX(' + left + 'px)',
            '-o-transform': 'translateX(' + left + 'px)',
            'transform': 'translateX(' + left + 'px)',
            'width': width + 'px',
            'height': height + 'px'
        });
        this.dropdownBg.css({
            '-moz-transform': 'scaleX(' + width + ') scaleY(' + height + ')',
            '-webkit-transform': 'scaleX(' + width + ') scaleY(' + height + ')',
            '-ms-transform': 'scaleX(' + width + ') scaleY(' + height + ')',
            '-o-transform': 'scaleX(' + width + ') scaleY(' + height + ')',
            'transform': 'scaleX(' + width + ') scaleY(' + height + ')'
        });
    };
    morphDropdown.prototype.hideDropdown = function() {
        this.mq = this.checkMq();
        if (this.mq == 'desktop') {
            this.element.removeClass('is-dropdown-visible').find('.active').removeClass('active').end().find('.move-left').removeClass('move-left').end().find('.move-right').removeClass('move-right');
        }
    };
    morphDropdown.prototype.resetDropdown = function() {
        this.mq = this.checkMq();
        if (this.mq == 'mobile') {
            this.dropdownList.removeAttr('style');
        }
    };
    var morphDropdowns = [];
    if ($('.cd-morph-dropdown').length > 0) {
        $('.cd-morph-dropdown').each(function() {
            morphDropdowns.push(new morphDropdown($(this)));
        });
        var resizing = false;
        updateDropdownPosition();
        $(window).on('resize', function() {
            if (!resizing) {
                resizing = true;
                (!window.requestAnimationFrame) ? setTimeout(updateDropdownPosition, 300): window.requestAnimationFrame(updateDropdownPosition);
            }
        });

        function updateDropdownPosition() {
            morphDropdowns.forEach(function(element) {
                element.resetDropdown();
            });
            resizing = false;
        };
    }
});