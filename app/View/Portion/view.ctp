<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __('Portion Detail')?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid">
			<table class="table table-bordered" id="table_portion_details">
				<thead>
					<tr>
						<th style="width:10%">S/N</th>
						<th>Name</th>
						<th>Value</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 0;?>
					<?php foreach($portion_details as $portion_detail):?>
					<tr>
						<td style="width:10%"><?php echo ++$count?></td>
						<td><?php echo $portion_detail['Part']['name']?></td>
						<td style="width:40%"><?php echo $portion_detail['PortionDetail']['value']?></td>
					</tr>	
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){

})
</script>
<?php $this->end()?>