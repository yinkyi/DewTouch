$.Modal = {};
$.Modal.closeAll = function(e){
	if($.Modal.current){
		$.Modal.current.modal('hide');
		setTimeout(function(){ $.Modal.closeAll(e); },10);
	}else{
		if(typeof e == 'function'){
			e();
		}
	}
}
$.Modal.previous = [];
$.Modal.alert = function(title,message,callback){
	if($.Modal.current) {
		$.Modal.previous.push($.Modal.current);
	}
	var modal_content = $.Modal.current = $("<div id='modal_sample_"+($.Modal.previous.length+1)+"' class='modal hide fade' tabindex='-1'  aria-labelledby='myModalLabel2' role='dialog' aria-hidden='true'>");
	
	if(title){
		var header = $("<div class='modal-header'>").append("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>").append('<h3 id="myModalLabel2">'+title+'</h3>');
		modal_content.append(header);
	}
	
	var body = $("<div class='modal-body'>");
	modal_content.append(body);
	
	var footer = $("<div class='modal-footer'>").append('<button data-dismiss="modal" class="btn green">OK</button>');
	modal_content.append(footer);
	modal_content.find('.modal-body').html(message);
	//modal_content.appendTo("body");
	
	//$("#modal_sample_"+($.Modal.previous.length+1)+" .modal-body").html(message);
	var modal = modal_content.modal();
	
	if(typeof callback == 'function'){
		modal.on('hidden',callback);
	}
	modal.on('hidden',function(e){
		if($(e.target).hasClass('modal')){
			var a = $.Modal.previous.pop();
			if(a){
				$.Modal.current = a;
			}else{
				$.Modal.current = null;
			}
		}
		
	});
	
	/*
	modal.on('hidden',function(e){
		if(e.target === this){
			setTimeout(function(){
				modal.remove();
			},1000);
		}
	});
	*/
}
$.Modal.popup = function(title,message,fullwidth){
	if($.Modal.current) {
		$.Modal.previous.push($.Modal.current);
	}
	if(typeof fullwidth == 'undefined') fullwidth = false;
	
	if(fullwidth){
		var modal_content = $.Modal.current = $("<div class='modal container hide fade' tabindex='-1' role='dialog' aria-hidden='true'>");
	}else{
		var modal_content = $.Modal.current = $("<div class='modal hide fade' tabindex='-1' role='dialog' aria-hidden='true'>");
	}
	
	
	if(title){
		var header = $("<div class='modal-header'>").append("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>").append('<h3>'+title+'</h3>');
		modal_content.append(header);
	}
	
	var body = $("<div class='modal-body'>");
	modal_content.append(body);
	
	modal_content.find('.modal-body').html(message);
	//modal_content.appendTo("body");
	
	//$("#modal_sample_"+($.Modal.previous.length+1)+" .modal-body").html(message);
	var modal = modal_content.modal();
	
	
	modal.on('hidden',function(e){
		if($(e.target).hasClass('modal')){
			var a = $.Modal.previous.pop();
			if(a){
				$.Modal.current = a;
			}else{
				$.Modal.current = null;
			}
		}
		
	});
	
	return modal;
	
	/*
	modal.on('hidden',function(e){
		if(e.target === this){
			setTimeout(function(){
				modal.remove();
			},1000);
		}
	});
	*/
}
$.Modal.confirm = function(title,message,confirm,decline){
	if($.Modal.current) {
		$.Modal.previous.push($.Modal.current);
	}
	var modal_content = $.Modal.current = $("<div id='modal_sample_"+($.Modal.previous.length+1)+"' class='modal hide fade' tabindex='-1'  aria-labelledby='myModalLabel2' role='dialog' aria-hidden='true'>");
	
	var body = $("<div class='modal-body'>");
	
	if(title){
		var header = $("<div class='modal-header'>").append("<button type='button' class='close' data-dismiss='modal' aria-hidden='true'></button>").append('<h3 id="myModalLabel2">'+title+'</h3>');
		modal_content.append(header);
	}
	
	modal_content.append(body);
	
	var footer = $("<div class='modal-footer'>").append('<button class="btn decline">No</button><button class="btn green confirm">Yes</button>');
	modal_content.append(footer);
	modal_content.find('.modal-body').html(message);
	//modal_content.appendTo("body");
	
	//$("#modal_sample_"+($.Modal.previous.length+1)+" .modal-body").html(message);
	var modal = modal_content.modal();
	
	if(typeof confirm == 'function'){
		modal.find('button.confirm').on('click',function(){
			confirm();
			modal.unbind('hide',decline);
			modal.modal('hide');
		});
	}
	if(typeof decline == 'function'){
		modal.find('button.decline').on('click',function(){
			decline();
			modal.unbind('hide',decline);
			modal.modal('hide');
		});
		
		modal.on('hide',decline);
	}
	
	
	modal.on('hidden',function(e){
		
		if($(e.target).hasClass('modal')){
			var a = $.Modal.previous.pop();
			if(a){
				$.Modal.current = a;
			}else{
				$.Modal.current = null;
			}
		}
		
	});
	/*
	modal.on('hidden',function(e){
		if(e.target === this){
			setTimeout(function(){
				modal.remove();
			},1000);
		}
	});
	*/
}

$.fn.validateintable = function(opt){
	var defaults = {
			onkeyup: false, 
			errorElement: 'span', //default input error message container
			errorClass: 'help-inline', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",
			messages: { // custom messages for radio buttons and checkboxes
				
			},
			
			errorPlacement: function (error, element) { // render error placement for each input type
				element.parent().find('.error-message').remove();
				//if(element.attr("name")=="data[Rental][est_date_in]" || element.attr("name")=="data[Rental][date_out]"){
				//if(!element.parent().hasClass('controls')){
					//error.appendTo(element.parents('.controls'));
				//}else{
					error.insertAfter(element); // for other inputs, just perform default behavoir
				//}
				//$(element).closest('.error-message').remove();
			},
			
			invalidHandler: function (event, validator) { //display error alert on form submit   
				$(window).trigger('resize');
				App.scrollTo($(validator.errorList[0].element).parents('.control-group'),-50);
				$(validator.errorList[0].element).focus();
			},
			
			highlight: function (element) { // hightlight error inputs
				$(element)
				.closest('.help-inline').remove(); // display OK icon
				
				$(element)
				.closest('td').removeClass('success').addClass('error'); // set error class to the control group
				
				$(window).trigger('resize')
			},
			
			unhighlight: function (element) { // revert the change dony by hightlight
				$(element)
				.closest('td').removeClass('error'); // set error class to the control group
				$(window).trigger('resize')
			},
			
			success: function (label) {
				label
				.addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
				.closest('td').removeClass('error').addClass('success').find('.error-message').remove(); // set success class to the control group
				$(window).trigger('resize')
			},
			
			submitHandler: function (form) {
				App.blockUI('body');
				form.submit();
			}
			
	};
	
	for(var i in opt){
		defaults[i] = opt[i];
	}
	
	return $(this).validate(defaults);
};
$.fn.validate3 = function(opt){
	var defaults = {
			onkeyup: false, 
			errorElement: 'span', //default input error message container
			errorClass: 'help-inline', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			ignore: "",
			messages: { // custom messages for radio buttons and checkboxes
				
			},
			
			errorPlacement: function (error, element) { // render error placement for each input type
				element.parent().find('.error-message').remove();
				//if(element.attr("name")=="data[Rental][est_date_in]" || element.attr("name")=="data[Rental][date_out]"){
				if(!element.parent().hasClass('controls')){
					error.appendTo(element.parents('.controls'));
				}else{
					error.insertAfter(element); // for other inputs, just perform default behavoir
				}
				//$(element).closest('.error-message').remove();
				
			},
			
			invalidHandler: function (event, validator) { //display error alert on form submit   
				$(window).trigger('resize');
				App.scrollTo($(validator.errorList[0].element).parents('.control-group'),-50);
				$(validator.errorList[0].element).focus();
			},
			
			highlight: function (element) { // hightlight error inputs
				$(element)
				.closest('.help-inline').remove(); // display OK icon
				
				$(element)
				.closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
				$(window).trigger('resize')
			},
			
			unhighlight: function (element) { // revert the change dony by hightlight
				$(element)
				.closest('.control-group').removeClass('error'); // set error class to the control group
				$(window).trigger('resize')
			},
			
			success: function (label) {
				label
				//.addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
				.closest('.control-group').removeClass('error').addClass('success').find('.error-message').remove(); // set success class to the control group
				label.remove();
				
				$(window).trigger('resize')
			},
			
			submitHandler: function (form) {
				App.blockUI('body');
				form.submit();
			}
			
	};
	
	for(var i in opt){
		defaults[i] = opt[i];
	}
	
	return $(this).validate(defaults);
};
$.fn.validate2 = function(opt){
	var defaults = {
		onkeyup: false, 
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        messages: { // custom messages for radio buttons and checkboxes
           
        },

        errorPlacement: function (error, element) { // render error placement for each input type
        	element.parent().find('.error-message').remove();
        	//if(element.attr("name")=="data[Rental][est_date_in]" || element.attr("name")=="data[Rental][date_out]"){
        	if(!element.parent().hasClass('controls')){
				error.appendTo(element.parents('.controls'));
        	}else{
            	error.insertAfter(element); // for other inputs, just perform default behavoir
        	}
            //$(element).closest('.error-message').remove();
        },

        invalidHandler: function (event, validator) { //display error alert on form submit   
        	$(window).trigger('resize');
        	App.scrollTo($(validator.errorList[0].element).parents('.control-group'),-50);
        	var error_element = validator.errorList[0].element;
        	setTimeout(function(){
        		$(error_element).focus();
        	},100);
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.help-inline').remove(); // display OK icon
               
            $(element)
                .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
            $(window).trigger('resize')
        },

        unhighlight: function (element) { // revert the change dony by hightlight
            $(element)
                .closest('.control-group').removeClass('error'); // set error class to the control group
            $(window).trigger('resize')
        },

        success: function (label) {
                label
                 //   .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                .closest('.control-group').removeClass('error').addClass('success').find('.error-message').remove(); // set success class to the control group
                label.remove();
            $(window).trigger('resize')
        },

        submitHandler: function (form) {
        	App.blockUI('body');
            form.submit();
        }

    };
	
	for(var i in opt){
		defaults[i] = opt[i];
	}
	
	return $(this).validate(defaults);
};


$.fn.dataTableExt.afnSortData['dom-checkbox'] = function  ( oSettings, iColumn )
{
    return $.map( oSettings.oApi._fnGetTrNodes(oSettings), function (tr, i) {
    	if($('td:eq('+iColumn+') input', tr).length > 0){
    		return $('td:eq('+iColumn+') input', tr).prop('checked') ? '1' : '0';
    	}else{
    		return '-1';
    	}
        
    } );
}


$.fn.dataTableExt.oSort['custom_datetime-asc'] = function(x,y){
	var a = $.fn.datetimepicker.DPGlobal;
	var xt = a.parseDate(x,a.parseFormat('dd/mm/yy hh:ii','standard'));
	var yt = a.parseDate(y,a.parseFormat('dd/mm/yy hh:ii','standard'));
	
	if(xt<yt) return -1;
	else if(xt>yt) return 1;
	else return 0;
}
$.fn.dataTableExt.oSort['custom_datetime-desc'] = function(x,y){
	var a = $.fn.datetimepicker.DPGlobal;
	var xt = a.parseDate(x,a.parseFormat('dd/mm/yy hh:ii','standard'));
	var yt = a.parseDate(y,a.parseFormat('dd/mm/yy hh:ii','standard'));
	
	if(xt<yt) return 1;
	else if(xt>yt) return -1;
	else return 0;
}

$.fn.dataTableExt.oSort['custom_date-asc'] = function(x,y){
	var xt = $.datepicker.parseDate('dd/mm/yy',x);
	var yt = $.datepicker.parseDate('dd/mm/yy',y);

	if(xt<yt) return -1;
	else if(xt>yt) return 1;
	else return 0;
}
$.fn.dataTableExt.oSort['custom_date-desc'] = function(x,y){
	var xt = $.datepicker.parseDate('dd/mm/yy',x);
	var yt = $.datepicker.parseDate('dd/mm/yy',y);

	if(xt<yt) return 1;
	else if(xt>yt) return -1;
	else return 0;
}
$.fn.dataTableExt.oSort['numeric-comma-asc']  = function(a,b) {
	var x = (a == "-") ? 0 : a.replace( /,/, "" );
	var y = (b == "-") ? 0 : b.replace( /,/, "" );
	x = parseFloat( x );
	y = parseFloat( y );
	return ((x < y) ? -1 : ((x > y) ?  1 : 0));
};

$.fn.dataTableExt.oSort['numeric-comma-desc'] = function(a,b) {
	var x = (a == "-") ? 0 : a.replace( /,/, "" );
	var y = (b == "-") ? 0 : b.replace( /,/, "" );
	x = parseFloat( x );
	y = parseFloat( y );
	return ((x < y) ?  1 : ((x > y) ? -1 : 0));
};

var handleTooltips = function () {
    if (App.isTouchDevice()) { // if touch device, some tooltips can be skipped in order to not conflict with click events
        jQuery('.tooltips:not(.no-tooltip-on-touch-device)').tooltip();
    } else {
        jQuery('.tooltips').tooltip();
    }
}

$.DataTable = function(id,ooColumn,aoColumnDefs,aoSorting){
	
	
	if(typeof(aoSorting) == 'undefined')
		aoSorting = [[0, "desc"]];
	
	var ret = $('#'+id).dataTable({
		"aLengthMenu": [
            [5, 20, 50, 100, 1000],
            [5, 20, 50, 100, 1000] // change per page values here
            ],
            'aoColumns':ooColumn,
            // set the initial value
            "iDisplayLength": 20,
            "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
            	"sLengthMenu": "_MENU_ per page",
            	"oPaginate": {
            		"sPrevious": "Prev",
            		"sNext": "Next"
            	}
            },
            "bStateSave":true,
            "aoColumnDefs": aoColumnDefs,
            "aaSorting": aoSorting,
	});
	
	jQuery('#'+id+'_wrapper .dataTables_filter input').addClass("m-wrap small"); // modify table search input
	jQuery('#'+id+'_wrapper .dataTables_length select').addClass("m-wrap small"); // modify table per page dropdown
	jQuery('#'+id+'_wrapper .dataTables_length select').select2(); // initialzie select2 dropdown
	
	return ret;	
}

jQuery.fn.dataTableExt.oApi.fnSetFilteringDelay = function (oSettings) {
	var _that = this;
	var _timeout = null;
	var _old = null;

	this.each(function (i) {
		$.fn.dataTableExt.iApiIndex = i;
		var $this = this, oTimerId = null, sPreviousSearch = null,
		anControl = $('input', _that.fnSettings().aanFeatures.f);

		anControl
		.unbind('keyup')
		.bind('keyup', function(e) {
			clearInterval(_timeout);

			if (e.keyCode == 13) {
				_that.fnFilter(anControl.val());
			} else {
				_timeout = setTimeout(function() { _that.fnFilter(anControl.val()) }, 1500);
			}

			_old = anControl.val();
		});

		return this;
	});
	return this;
}

$.fn.CustomDataTable = function(opts){
	var defaults = {
			"aLengthMenu": [
			                 [5, 20, 50, 100, 1000],
            [5, 20, 50, 100, 1000] // change per page values here
			                ],
			                // set the initial value
			                "iDisplayLength": 20,
			                "bStateSave":true,
			                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
			                "sPaginationType": "bootstrap",
			                
			                "oLanguage": {
			                	"sLengthMenu": "_MENU_ per page",
			                	"oPaginate": {
			                		"sPrevious": "Prev",
			                		"sNext": "Next"
			                	}
			                }
	};
	if(typeof opts == 'undefined'){
		opts = {};
	}
	var options = $.extend(defaults,opts);
	
	var ret = $(this).dataTable(options).fnSetFilteringDelay();
	
	ret.parents('.dataTables_wrapper').find('.dataTables_filter input').addClass("m-wrap small"); // modify table search input
	ret.parents('.dataTables_wrapper').find('.dataTables_length select').addClass("m-wrap small"); // modify table search input
	ret.parents('.dataTables_wrapper').find('.dataTables_length select').select2();
	
	return ret;
}
$.fn.CustomDataTableAjax = function(opts){
	var defaults = {
         "bProcessing": true,
         "bServerSide": true,
         "aaSorting": [[0, "desc"]],
     };
	if(typeof opts == 'undefined'){
		opts = {};
	}
	var options = $.extend(defaults,opts);
	
	var ret = $(this).CustomDataTable(options)
	
	return ret;
}

$.DataTableAjax = function(id,opts){
    return $("#"+id).CustomDataTableAjax(opts);
}



function fixRow(clone,i){
	clone.find(':radio').each(function(){
		var parent = $(this).parents('#uniform-'+$(this).attr('id'));
		parent.before($(this));
		
		parent.remove();
	});
	
	
	clone.find(':checkbox').each(function(){
		var parent = $(this).parents('#uniform-'+$(this).attr('id'));
		parent.before($(this));
		
		parent.remove();
	});
	
	var select2_ids = [];
	
	clone.find('.select2-container').each(function(){
		var id = $(this).attr('id').replace('s2id_','');
		select2_ids.push(id);
		$(this).remove();
	});
	
	$.each(select2_ids,function(index,value){ 
		clone.find("#"+value).select2('destroy').show();
	});
	
	clone.find('[name^="data["]').each(function(){
		if($(this).attr('name')){
			$(this).attr('name',$(this).attr('name').replace(/^(\D+)(\d+)(\D+)/,function(str,m1,m2,m3){
				if(typeof i=="undefined"){
					var newstr = (+m2+1)+"";
				}else{
					var newstr = i+1+"";
				}
				return m1+newstr+m3;
			}));
			
		}
		
		if($(this).attr('id')){
			$(this).attr('id',$(this).attr('id').replace(/^(\D+)(\d+)(\D+)/,function(str,m1,m2,m3){
				if(typeof i=="undefined"){
					var newstr = (+m2+1)+"";
				}else{
					var newstr = i+1+"";
				}
				return m1+newstr+m3;
			}));
		}
		
	});
	
	clone.find('[data-input-name^="data["]').each(function(){
		
		if($(this).data('input-name')){
			$(this).data('input-name',$(this).data('input-name').replace(/^(\D+)(\d+)(\D+)/,function(str,m1,m2,m3){
				if(typeof i=="undefined"){
					var newstr = (+m2+1)+"";
				}else{
					var newstr = i+1+"";
				}
				return m1+newstr+m3;
			}));
		}
		
	});
	clone.find('[data-input-name^="data["]').each(function(){

		if($(this).attr('data-input-name')){
			$(this).attr('data-input-name',$(this).attr('data-input-name').replace(/^(\D+)(\d+)(\D+)/,function(str,m1,m2,m3){
				if(typeof i=="undefined"){
					var newstr = (+m2+1)+"";
				}else{
					var newstr = i+1+"";
				}
				return m1+newstr+m3;
			}));
		}
	});
	
	
	
	clone.find('.error .help-inline').remove();
	clone.find('.success .help-inline').remove();

	clone.find('.error').removeClass('error');
	clone.find('.success').removeClass('success');

	return clone;
}