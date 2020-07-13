
<div id="message1">


<?php echo $this->Form->create('Type',array('url'=>'/Format/show_selection','id'=>'form_type','type'=>'file','class'=>'','method'=>'POST','autocomplete'=>'off','inputDefaults'=>array(
				
				'label'=>false,'div'=>false,'type'=>'text','required'=>false)))?>
	
<?php echo __("Hi, please choose a type below:")?>
<br><br>

<?php 
	$tooltip_type1="<div>
					<span style='display:inline-block'><ul><li>Description .......</li>
					<li>Description 2</li></ul></span>
					</div>";
	$tooltip_type2="<div>
					<span style='display:inline-block'><ul><li>Desc 1 .....</li>
					<li>Desc 2...</li></ul></span>
					</div>";	
	$options_new = array(
	// 'Type1' => __('<span class="showDialog" data-id="dialog_1" style="color:blue">Type1</span><div id="dialog_1" class="hide dialog" title="Type 1">
	// 		<span style="display:inline-block"><ul><li>Description .......</li>
	// 		<li>Description 2</li></ul></span>
	// 		</div>'),
	// 'Type2' => __('<span class="showDialog" data-id="dialog_2" style="color:blue">Type2</span><div id="dialog_2" class="hide dialog" title="Type 2">
	// 		<span style="display:inline-block"><ul><li>Desc 1 .....</li>
	// 		<li>Desc 2...</li></ul></span>
		// 		</div>')
	'Type1' => __('<span rel="tooltip" data-id="opt_1" data-placement="right" data-html="true" title ="'.$tooltip_type1.'" style="color:blue">Type1</span>'),
	'Type2' => __('<span rel="tooltip" data-id="opt_2"  data-placement="right" data-html="true" title ="'.$tooltip_type2.'" style="color:blue">Type2</span>')
	);?>

<?php echo $this->Form->input('type', array('legend'=>false, 'type' => 'radio', 'options'=>$options_new,'before'=>'<label class="radio line notcheck">','after'=>'</label>' ,'separator'=>'</label><label class="radio line notcheck">'));?>
<?php //echo $this->Html->link('Save', array('controller'=>'Format','action'=>'show_selection','type'=>'test'), array('class' => 'button btn_save')); ?>
<?php //echo $this->Html->link('Save',array(''), array('class' => 'btn_save')); ?>
<?php echo $this->Form->button('Submit'); ?>
<?php echo $this->Form->end();?>

</div>

<style>
.btn_save {
    color: #6e6e6e;
    font: bold 12px Helvetica, Arial, sans-serif;
    text-decoration: none;
    padding: 7px 12px;
    position: relative;
    display: inline-block;
    text-shadow: 0 1px 0 #fff;
    -webkit-transition: border-color .218s;
    -moz-transition: border .218s;
    -o-transition: border-color .218s;
    transition: border-color .218s;
    background: #f3f3f3;
    background: -webkit-gradient(linear,0% 40%,0% 70%,from(#F5F5F5),to(#F1F1F1));
    background: -moz-linear-gradient(linear,0% 40%,0% 70%,from(#F5F5F5),to(#F1F1F1));
    border: solid 1px #dcdcdc;
    border-radius: 2px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    margin-right: 20px;
    cursor:pointer;
}
.showDialog:hover{
	text-decoration: underline;
}

#message1 .radio{
	vertical-align: top;
	font-size: 13px;
}

.control-label{
	font-weight: bold;
}

.wrap {
	white-space: pre-wrap;
}

</style>

<?php $this->start('script_own')?>
<script>

$(document).ready(function(){
	$(".dialog").dialog({
		autoOpen: false,
		width: '500px',
		modal: true,
		dialogClass: 'ui-dialog-blue'
	});

	 $('[rel="tooltip"]').tooltip('toggle')
     $('[rel="tooltip"]').tooltip('hide');  
	$(".showDialog").click(function(){debugger; var id = $(this).data('id'); $("#"+id).dialog('open'); });


})


</script>
<?php $this->end()?>