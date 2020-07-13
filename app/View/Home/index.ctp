<div class="row-fluid">
	<div style="float:right">
		<?php echo $this->Html->link('Init DB','/Init',array('class'=>'btn green'))?>
	</div>
	<h1><?php echo $title?></h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 40px">#</th>
				<th>Question</th>
				<th>Author</th>
				<th>Scope</th>
				<th>Duration</th>
				<th style="width: 90px">Difficulty</th>
				<th style="width: 70px">Detail</th>
				<th style="width: 70px">Link</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Listing Record page too slow, try to optimize it.</td>
				<td>MH</td>
				<td><span class="label">CakePHP</span> <span class="label">JS</span> <span class="label">MySQL</span></td>
				<td>2</td>
				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
				</td>
				<td></td>
				<td><?php echo $this->Html->link('Click Me','/Record')?></td>
			</tr>
			
			<tr>
				<td><?php echo __('2')?></td>
				<td><?php echo __('Change Display Format From Popup to Mouse over')?></td>
				<td><?php echo __('HL')?></td>
				<td><span class="label"><?php echo __('CakePHP')?></span> <span class="label"><?php echo __('JS')?></span></td>
				<td><?php echo __('2.28')?></td>
				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<span style="background-color:#fafafa;width: 14px;height: 16px;display: inline-block;margin-left: -10px;/* padding: 1px; */vertical-align: bottom;"></span>
				</td>
				<td><?php echo $this->Html->link('View Detail','/Format/q1_detail')?></td>
				<td><?php echo $this->Html->link('Click Me','/Format/q1')?></td>
			</tr>
			
			<tr>
				<td>3</td>
				<td>Advanced Input Field</td>
				<td>XX</td>
				<td><span class="label">JS</span></td>
				<td>2.11</td>

				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<span style="background-color:#fafafa;width: 14px;height: 16px;display: inline-block;margin-left: -10px;/* padding: 1px; */vertical-align: bottom;"></span>
					
				</td>
				<td><?php //echo $this->Html->link('View Detail','/Format/q1_detail')?></td>
				<td><?php echo $this->Html->link('Click Me','/Js/q1')?></td>
			</tr>
			
			<tr>
				<td>4</td>
				<td>Complete the File Upload feature</td>
				<td>KC</td>
				<td><span class="label">MySQL</span> <span class="label">PHP</span></td>
				<td>1.61</td>
				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
				</td>
				<td></td>
				<td><?php echo $this->Html->link('Click Me','/FileUpload')?></td>
			</tr>
			
			<tr>
				<td>5</td>
				<td>Multidimensional Array</td>
				<td>YS</td>
				<td><span class="label">PHP</span></td>
				<td>1.78</td>
				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
				</td>
				<td><?php echo $this->Html3->link('View Detail','/OrderReport/question',array('data-modal-full-width'=>true,))?></td>
				<td><?php echo $this->Html->link('Click Me','/OrderReport')?></td>
			</tr>
			
			<tr>
				<td><?php echo __('6')?></td>
				<td><?php echo __('Migration of data to multiple DB table')?></td>
				<td><?php echo __('HL')?></td>
				<td><span class="label"><?php echo __('CakePHP')?></span></td>
				<td><?php echo __('')?></td>
				<td>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					<?php echo $this->Html->image('rating.png',array('style'=>'width: 15px'))?>
					
				</td>
				<td><?php echo $this->Html3->link('View Detail','/Migration/q1_instruction')?></td>
				<td><?php //echo $this->Html->link('Click Me','/Migration/q1')?></td>
			</tr>
		</tbody>
	</table>

</div>