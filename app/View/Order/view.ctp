<div class="portlet box green">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __('Order Detail')?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid view_info">
			<div class="span12 ">
				<div class="row-fluid">
					<table class="table table-bordered" id="table_order_details">
						<thead>
							<tr>
								<th style="width:10%">S/N</th>
								<th>Name</th>
								<th>Quantity</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 0;?>
							<?php foreach($order_details as $order_detail):?>
							<tr>
								<td style="width:10%"><?php echo ++$count?></td>
								<td><?php echo $order_detail['Item']['name']?></td>
								<td style="width:40%"><?php echo $order_detail['OrderDetail']['quantity']?></td>
							</tr>	
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
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