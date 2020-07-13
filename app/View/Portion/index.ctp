<div class="row-fluid">
	<table class="table table-bordered" id="table_portions">
		<thead>
			<tr>
				<th style="width:10%">ID</th>
				<th>NAME</th>
				<th style="width:20%">Action (click to view portion details)</th>		
			</tr>
		</thead>
		<tbody>
			<?php foreach($portions as $portion):?>
			<tr>
				<td style="width:10%"><?php echo $portion['Portion']['id']?></td>
				<td><?php echo $portion['Portion']['name']?></td>
				<td style="width:20%"><?php echo $this->Html->link('View Detail','/Portion/view/'.$portion['Portion']['id'],array('target'=>'_blank'))?></td>
			</tr>	
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	$("#table_portions").dataTable({

	});
})
</script>
<?php $this->end()?>