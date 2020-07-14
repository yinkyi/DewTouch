<div class="alert  ">
<button class="close" data-dismiss="alert"></button>
Question: Advanced Input Field</div>

<p>
1. Make the Description, Quantity, Unit price field as text at first. When user clicks the text, it changes to input field for use to edit. Refer to the following video.

</p>


<p>
2. When user clicks the add button at left top of table, it wil auto insert a new row into the table with empty value. Pay attention to the input field name. For example the quantity field

<?php echo htmlentities('<input name="data[1][quantity]" class="">')?> ,  you have to change the data[1][quantity] to other name such as data[2][quantity] or data["any other not used number"][quantity]

</p>



<div class="alert alert-success">
<button class="close" data-dismiss="alert"></button>
The table you start with</div>

	<table id="sale_table" class="table table-striped table-bordered table-hover">
	<thead>
	<th><span id="add_item_button" class="btn mini green addbutton" onclick="addToObj=false">
												<i class="icon-plus"></i></span></th>
	<th>Description</th>
	<th>Quantity</th>
	<th>Unit Price</th>
	</thead>

	<tbody>
		<!-- <tr> -->
		<!-- <td><textarea name="data[1][description]" class="m-wrap  description required" rows="2" ></textarea></td>
		<td><input name="data[1][quantity]" class=""></td>
		<td><input name="data[1][unit_price]"  class=""></td> -->

		<!-- </tr> -->
		<tr>
			<td></td>
			<td id="data[1][description]" class="pt-3-half" contenteditable="true">Test Description</td>
			<td id="data[1][quantity]" class="pt-3-half" contenteditable="true">2</td>
			<td id="data[1][unit_price]" class="pt-3-half" contenteditable="true">1000</td>
		</tr>

	</tbody>

	</table>
	

<p></p>
<div class="alert alert-info ">
<button class="close" data-dismiss="alert"></button>
Video Instruction</div>

<p style="text-align:left;">
<video width="78%"   controls>
  <source src="/video/q3_2.mov">
Your browser does not support the video tag.
</video>
</p>

<?php 
 echo $this->Html->script('/metronic_new/plugins/jquery-1.10.2.min'); ?>
<?php $this->start('script_own');?>
<script>
$(document).ready(function(){
	const $tableID = $('#sale_table');
	
	$("#add_item_button").click(function(){//alert($tableID.find('tbody tr').length);
		    var $row_id = $tableID.find('tbody tr').length+1;
			const newTr = '<tr>'+
	              '<td></td>'+
	              '<td id="data['+$row_id+'][description]" placeholder="Type Description..." class="pt-3-half" contenteditable="true"></td>'+
				  '<td id="data['+$row_id+'][quantity]" placeholder="quantity(1-9 digit)..."  class="pt-3-half" contenteditable="true"></td>'+
				  '<td id="data['+$row_id+'][unit_price]" placeholder="unit price(1-9 digit)..." class="pt-3-half" contenteditable="true"></td>'+
				   '</tr>';
			$("#sale_table tbody").append(newTr);

	});
	$('#sale_table').on('keydown','tr td',function(e){
		let $id = $(this).attr('id');
		var charCode = e.keyCode;
		if($id.includes("quantity"))
			{
				let $is_num =isNumberKey(charCode);
				  if(!$is_num) event.preventDefault();
			
			}
		else if($id.includes("unit_price"))
			{
				var textOfTd =  $(this).text();
				textOfTd = textOfTd.replace(/[^0-9\.]/g,'');
				if(textOfTd != "") {
					valArr = textOfTd.split('.');
					valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
					textOfTd = valArr.join('.');
				}
				console.log(textOfTd);
			}
			
	});
	$('#sale_table').on('focusout','tr td',function(e){
			event.preventDefault();
			let $id = $(this).attr('id');
			if($id.includes("unit_price"))
			{
				var textOfTd =  $(this).text();
				textOfTd = textOfTd.replace(/[^0-9\.]/g,'');
				if(textOfTd != "") {
					valArr = textOfTd.split('.');
					valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
					textOfTd = valArr.join('.');
				}
				$(this).text(textOfTd);
			}
	});

	function isNumberKey(charCode) {
		var result = false; 
		try {
				if ((charCode >= 48 && charCode <= 57) || (charCode >= 96 && charCode <= 105) || (charCode == 9)) {
					result = true;
			}
		}
		catch(err) {
			//console.log(err);
		}
		return result;
	}
		
});
</script>
<?php $this->end();?>
<style>
table {
  width: 100%;
  border-spacing: 0;
  border-collapse: collapse;
}
table td {  
}
table td,
table th {
  border: 1px solid #dadada;
  padding: 5px;
}
table thead th {
  text-align: left;
}
table thead th:nth-child(1){
  width: 5%;
}
table thead th:nth-child(2){
  width: 55%;
}
table thead th:nth-child(3),
table thead th:nth-child(4){
  width: 20%;
}
 
td {
  word-break: break-all;
}
[contenteditable][placeholder]:empty:before {
	content: attr(placeholder);
	position: absolute;
	color: gray;
	background-color: transparent;
}
.pt-3-half {
padding-top: 1.4rem;
}
</style>
