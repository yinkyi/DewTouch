<div class="row-fluid">
	<table class="table table-bordered" id="table_orders">
		<thead>
			<tr>
				<th style="width:10%">ID</th>
				<th>NAME</th>
				<th style="width:20%">Action (click to view order details)</th>		
			</tr>
		</thead>
		<tbody>
			<?php foreach($orders as $order):?>
			<tr>
				<td style="width:10%"><?php echo $order['Order']['id']?></td>
				<td><?php echo $order['Order']['name']?></td>
				<td style="width:20%"><?php echo $this->Html->link('View Detail','/Order/view/'.$order['Order']['id'],array('target'=>'_blank'))?></td>
			</tr>	
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_orders").dataTable({

	});
})
</script>
<?php $this->end()?>