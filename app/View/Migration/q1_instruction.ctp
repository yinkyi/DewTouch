<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __('Instruction')?>
		</div>
	</div>
	<div class="portlet-body">
			
		<div class="row-fluid view_info">
			<div class="span12 ">
				<?php echo __("Note 1 : You being ask to do data migration for the file given by customer. The file is ")?>
				<?php echo $this->Html->link('<i class="icon-share"></i> Excel file', '/files/migration_sample_1.xlsx', array('escape' => false)); ?>
				
				<br/>
				<br/>
				<?php echo __("Note 2: You are requested to migrate the data in the file to 3 DB, Member DB, Transaction DB, and Transaction Item DB.")?>
				
				<br/>
				<br/>
				<?php echo __("Note 3: Score will be given based on accuration of data especially date, total, and itemise; there is a sample based on 1st line of the excel data. Please design your own MVC.")?>
			
			</div>
			
		</div>
		
		
		
	</div>
	
</div>


<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	

	
})
</script>
<?php $this->end()?>