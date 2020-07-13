<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1
Version: 1.3
Author: KeenThemes
Website: http://www.keenthemes.com/preview/?theme=metronic
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title><?php echo TITLESITE?> - <?php echo $title?></title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <?php 
   		echo $this->Html->css('/metronic_new/plugins/bootstrap/css/bootstrap.min');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap/css/bootstrap-responsive.min');
   		echo $this->Html->css('/metronic_new/plugins/font-awesome/css/font-awesome.min');
   		echo $this->Html->css('/metronic_new/css/style-metro');
   		echo $this->Html->css('/metronic_new/css/style.css?v=1');
   		echo $this->Html->css('/metronic_new/css/style-responsive');
   		echo $this->Html->css('/metronic_new/css/themes/light',null,array('id'=>'style_color'));
   		echo $this->Html->css('/metronic_new/plugins/uniform/css/uniform.default');
   ?>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL STYLES --> 
   <?php 
//    		echo $this->Html->css('/metronic_new/plugins/select2-3.4.0/select2');
   		echo $this->Html->css('/metronic_new/plugins/jquery-ui/jquery-ui-1.10.1.custom.min');
//    	echo $this->Html->css('/metronic_new/plugins/jquery-ui/jquery.ui.slider');
   		echo $this->Html->css('/metronic_new/plugins/select2-3.5.2/select2_metro');
   		echo $this->Html->css('/metronic_new/plugins/data-tables/DT_bootstrap');
   		echo $this->Html->css('/metronic_new/plugins/FixedHeader-2.1.0/css/dataTables.fixedHeader');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-fileupload/bootstrap-fileupload');
   		echo $this->Html->css('/metronic_new/plugins/gritter/css/jquery.gritter');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-datepicker/css/datepicker');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-datetimepicker/css/datetimepicker');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-daterangepicker/daterangepicker');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-timepicker/compiled/timepicker');
   		echo $this->Html->css('/metronic_new/plugins/fullcalendar-1.6.4/fullcalendar/fullcalendar');
   		echo $this->Html->css('/metronic_new/plugins/chosen-bootstrap/chosen/chosen');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons');
   		echo $this->Html->css('/metronic_new/plugins/jqvmap/jqvmap/jqvmap',null,array('media'=>'screen'));
   		echo $this->Html->css('/metronic_new/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart',null,array('media'=>'screen'));
   		echo $this->Html->css('/metronic_new/css/pages/profile');
   		echo $this->Html->css('/metronic_new/css/pages/search');
   		echo $this->Html->css('/metronic_new/plugins/bootstrap-modal/css/bootstrap-modal');
   		
   		echo $this->Html->css('/metronic_new/css/pages/invoice');
   		echo $this->Html->css('/metronic_new/css/print',null,array('media'=>'print'));
   		
   ?>
 
   </style>
</head>
<!-- BEGIN BODY -->
<body
	class="page-header-fixed page-sidebar-fixed <?php if(@$sidebar_close) echo 'page-sidebar-closed' ?>">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<?php echo $this->Html->link($this->Html->image('http://www.dewtouch.com/images/logo.png',array('style'=>'height: 40px')),'/',array('escape'=>false))?>
				
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container" style="padding: 50px;">
		<?php echo $this->Session->flash(); ?>
		<div><?php echo $this->fetch('content')?></div>
	</div>
	
	 <?php 
   		echo $this->Html->script('/metronic_new/plugins/jquery-1.10.2.min');
   		echo $this->Html->script('/metronic_new/plugins/jquery-migrate-1.2.1.min');
   ?>
    <?php 
   		echo $this->Html->script('/metronic_new/plugins/jquery-ui/jquery-ui-1.10.1.custom.min');
   		echo $this->Html->script('/metronic_new/plugins/bootstrap/js/bootstrap.min');
   		echo $this->Html->script('jquery.dataTables.js?v=2');
   		echo $this->Html->script('/metronic_new/plugins/data-tables/DT_bootstrap');
   		
   		echo $this->Html->script('/metronic_new/plugins/bootstrap-modal/js/bootstrap-modal');
   		echo $this->Html->script('/metronic_new/plugins/bootstrap-modal/js/bootstrap-modalmanager');
   		
   		echo $this->Html->script('/metronic_new/plugins/jquery.blockui.min');
   		
   		echo $this->Html->script('own');
   ?>
   
	<script>
	App = {};
	App.blockUI = function (el, centerY) {
    	var el = jQuery(el); 
    	el.block({
    		message: '<img src="metronic_new/img/ajax-loading.gif" align="">',
    		centerY: centerY != undefined ? centerY : true,
    				css: {
    					top: '10%',
    					border: 'none',
    					padding: '2px',
    					backgroundColor: 'none'
    				},
    				overlayCSS: {
    					backgroundColor: '#000',
    					opacity: 0.3,
    					cursor: 'wait'
    				}
    	});
    };
	App.unblockUI = function (el) {
        jQuery(el).unblock({
            onUnblock: function () {
                jQuery(el).removeAttr("style");
            }
        });
	}

    
	$(document).ready(function(){
		 $("body").on("click","[data-href] [href]",function(e){
				var href = $(this).attr('href');

				if(href.indexOf('#')==0 || href.indexOf('javascript:')==0){

				}else{
					e.stopPropagation();
				}
		});
			
 	  $('body').on('click','[data-href]',function(event){
     	  var target = $(event.target);
     	  if(target.data('toggle') || target.parent().data('toggle')){

     	  }else{

         	  if($(this).data('target')=="_blank")
         	  {

       			window.open($(this).data('href'),'_blank');
         	  }
         	  else
         	  {
         		location.href = $(this).data('href');
         	  }
 			
 			return false;
     	  }
 		});

			
 	  
 	
 	  
 	  $('body').on('click','[data-modal-href]',function(event){
     	  event.preventDefault();

				if($(this).hasClass("disabled"))
					return false;
     	  
     	  	App.blockUI('body');
 			var url = $(this).data('modal-href');
 			
 			var title = $(this).data('modal-title');
 			var full_width = $(this).data('modal-full-width');

 			
 			$.ajax(url).done(function(data){	
					//alert(data);
					if(full_width){
						$.Modal.popup(title,data,true);
					}else{
						$.Modal.popup(title,data);
					}
					
 			}).always(function(data){
 				App.unblockUI('body');
 			});

 			return false;
 		});


 	  $('body').on('click','[data-replaced-modal-href]',function(event){
     	  event.preventDefault();

     	  if($(this).hasClass("disabled"))
					return false;
     	  
     	  	App.blockUI('body');
 			var url = $(this).data('replaced-modal-href');
				var required = true;
				if(typeof $(this).data('replacement-required') != 'undefined'){
					required = $(this).data('replacement-required');
				}
 			
 			$replaced_element = $("#"+$(this).data('replacement-element-id'));

 			if(required && $replaced_element.val()=="")
 			{
     			
     			$.Modal.popup("<?php echo __('Error')?>",$(this).data('error-message'));
     			App.unblockUI('body');
     			return false;
 			}
				url = decodeURI(url);
 			url = url.replace("[replaced]",$replaced_element.val());
 			
 			var title = $(this).data('modal-title');


 			var full_width = $(this).data('modal-full-width');

 			
 			$.ajax(url).done(function(data){	
					//alert(data);
 				if(full_width){
						$.Modal.popup(title,data,true);
					}else{
						$.Modal.popup(title,data);
					}
 			}).always(function(data){
 				App.unblockUI('body');
 			});

 			return false;
 		});


 	  $('body').on('click','[data-replaced-attr-modal-href]',function(event){
     	  event.preventDefault();

     	  if($(this).hasClass("disabled"))
					return false;
     	  
     	  	App.blockUI('body');
 			var url = $(this).data('replaced-attr-modal-href');

 			$replaced_element = $("#"+$(this).data('replacement-element-id'));


 			$replaced_attr = $(this).data('replacement-attr');

 			if($replaced_element.attr($replaced_attr)=="")
 			{
     			
     			$.Modal.popup("<?php echo __('Error')?>",$(this).data('error-message'));
     			App.unblockUI('body');
     			return false;
 			}

 			url = url.replace("[replaced]",$replaced_element.attr($replaced_attr));
 			
 			var title = $(this).data('modal-title');

 			
 			$.ajax(url).done(function(data){	
					//alert(data);
					$.Modal.popup(title,data);
 			}).always(function(data){
 				App.unblockUI('body');
 			});

 			return false;
 		});
	});
	</script>
	<?php echo $this->fetch('script_own')?>
</body>
</html>
