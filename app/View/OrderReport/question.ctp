<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __($title)?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid view_info">
			<div class="span12 ">
				<div>
					<p style="font-size:16px">
						Provide an Orders Report to show how many ingredients need to be prepared by the user for each order. 
					</p>
					<table border='1'>
						<thead>
							<tr>
								<th colspan="2">Order 2</th>
							</tr>
							<tr>
								<th style="width:250px;text-align:left;padding-left:5px">Dish</th>
								<th style="width:100px;text-align:left;padding-left:5px">Quantity</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Fried Rice with Silver Fish</td>
								<td style="width:100px;text-align:left;padding-left:5px">1</td>
							</tr>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Sing Chew Fried Bee Hoon</td>
								<td style="width:100px;text-align:left;padding-left:5px">2</td>
							</tr>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Lemon Chicken</td>
								<td style="width:100px;text-align:left;padding-left:5px">3</td>
							</tr>
						</tbody>
					</table>
					<br>
					<table border='1'>
						<thead>
							<tr>
								<th colspan="2">Ingredient of Fried Rice with Silver Fish</th>
							</tr>
							<tr>
								<th style="width:250px;text-align:left;padding-left:5px">Name</th>
								<th style="width:100px;text-align:left;padding-left:5px">Value</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Ingredient A</td>
								<td style="width:100px;text-align:left;padding-left:5px">1.00</td>
							</tr>
						</tbody>
					</table>
					<br>
					<table border='1'>
						<thead>
							<tr>
								<th colspan="2">Ingredient of Sing Chew Fried Bee Hoon</th>
							</tr>
							<tr>
								<th style="width:250px;text-align:left;padding-left:5px">Name</th>
								<th style="width:100px;text-align:left;padding-left:5px">Value</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Ingredient A</td>
								<td style="width:100px;text-align:left;padding-left:5px">6.00</td>
							</tr>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Ingredient F</td>
								<td style="width:100px;text-align:left;padding-left:5px">7.00</td>
							</tr>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Ingredient H</td>
								<td style="width:100px;text-align:left;padding-left:5px">1.00</td>
							</tr>
						</tbody>
					</table>
					<br>
					<table border='1'>
						<thead>
							<tr>
								<th colspan="2">Ingredient of Lemon Chicken</th>
							</tr>
							<tr>
								<th style="width:250px;text-align:left;padding-left:5px">Name</th>
								<th style="width:100px;text-align:left;padding-left:5px">Value</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td style="width:250px;text-align:left;padding-left:5px">Ingredient D</td>
								<td style="width:100px;text-align:left;padding-left:5px">2.00</td>
							</tr>
						</tbody>
					</table>
					<br>

					<p style="font-size:16px">
						According to the reference data to write an array to print out the Order Report as the expected results as below
					</p>
					<br>

				</div>

				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">

						<li class="active"><a href="#tab_item" data-toggle="tab"><?php echo __('Expected Results - Orders Report')?>
						</a></li>
						<li class=""><a href="#tab_order" data-toggle="tab"><?php echo __('Reference Data - Order')?>
						</a></li>
						<li class=""><a href="#tab_portion" data-toggle="tab"><?php echo __('Reference Data - Portion of Dishes')?>
						</a></li>
					</ul>

					<div class="tab-content">
						
						<div class="tab-pane row-fluid active" id="tab_item">

							<div class="row-fluid">
								<table class="table table-bordered dataTable" id="table_orders">
									<thead>
										<tr>
											<th style="width:10%">S/N</th>
											<th colspan="2">Order Name</th>
										</tr>
									</thead>
									<tbody>
										<tr class="item_tr" style="background-color:#fff;">
											<td><span class="row-details row-details-close"></span></td>
											<td colspan="2">Order 1</td>
										</tr>
										<tr class="hide">
											<td></td>
											<td colspan="2">
												<table style="width:100%">
													<thead>
														<tr>
															<th style="border-left:none;width:50%">Ingredient Name</th>
															<th>Value</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td style="border-left:none;width:50%">Ingredient A</td>
															<td>1</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient B</td>
															<td>12</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient C</td>
															<td>3</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient E</td>
															<td>9</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient F</td>
															<td>5</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient G</td>
															<td>24</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient I</td>
															<td>22</td>
														</tr>
														
													</tbody>
												</table>
											</td>
										</tr>
										<tr class="item_tr" style="background-color:#fff;">
											<td><span class="row-details row-details-close"></span></td>
											<td colspan="2">Order 2</td>
										</tr>
										<tr class="hide">
											<td></td>
											<td colspan="2">
												<table style="width:100%">
													<thead>
														<tr>
															<th style="border-left:none;width:50%">Ingredient Name</th>
															<th>Value</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td style="border-left:none;width:50%">Ingredient A</td>
															<td>13</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient D</td>
															<td>6</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient F</td>
															<td>14</td>
														</tr>
														<tr>
															<td style="border-left:none;width:50%">Ingredient H</td>
															<td>2</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>

									</tbody>
								</table>
							</div>
							Continues ...
						</div>
						
						<div class="tab-pane row-fluid" id="tab_order">

							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<?php echo __('Orders')?>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid view_info">
										<div class="span12 ">
											<div class="row-fluid">
												<table class="table table-bordered" id="table_orders">
													<thead>
														<tr>
															<th style="width:10%">ID</th>
															<th>NAME</th>
															<th style="width:25%">Action (click to view order details)</th>		
														</tr>
													</thead>
													<tbody>
														<?php foreach($orders as $order):?>
														<tr>
															<td style="width:10%"><?php echo $order['Order']['id']?></td>
															<td><?php echo $order['Order']['name']?></td>
															<td style="width:20%"><?php echo $this->Html3->link('View Detail','/Order/view/'.$order['Order']['id'])?></td>
														</tr>	
														<?php endforeach;?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div class="tab-pane row-fluid" id="tab_portion">

							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<?php echo __('Portions of Dishes')?>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid view_info">
										<div class="span12 ">
											<div class="row-fluid">
												<table class="table table-bordered" id="table_portions">
													<thead>
														<tr>
															<th style="width:10%">ID</th>
															<th>NAME</th>
															<th style="width:25%">Action (click to view portion details)</th>		
														</tr>
													</thead>
													<tbody>
														<?php foreach($portions as $portion):?>
														<tr>
															<td style="width:10%"><?php echo $portion['Portion']['id']?></td>
															<td><?php echo $portion['Item']['name']?></td>
															<td style="width:20%"><?php echo $this->Html3->link('View Detail','/Portion/view/'.$portion['Portion']['id'])?></td>
														</tr>	
														<?php endforeach;?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>




<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	
	$("body").on('click','tbody tr.item_tr',function(){

	  	if($(this).next().hasClass("hide")) {
			$(this).next().removeClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-close").addClass("row-details-open");
	 	}else{
	   		$(this).next().addClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-open").addClass("row-details-close");
	 	}

	  return false;
	 });
	
})
</script>
<?php $this->end()?>