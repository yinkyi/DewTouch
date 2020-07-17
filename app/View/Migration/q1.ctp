<div class="row-fluid">
	<div class="alert alert-info">
		<h3>Migration Multiple DB Data Question</h3>
	</div>

	<hr />

	<div class="alert">
		<h3>Migration Form</h3>
	</div>
<?php
    echo $this->Form->create('MigrationData');
    echo "<div><span style='color:orange'>Please, put customer's migration file under wwwroot/files with name migration_sample_1.xlsx.</span></div>";//$this->Form->input('xlsx', ['type'=>'file','class' => 'form-control', 'label' => false, 'placeholder' => 'file upload']);
    
?>

<button type="button" id="btn_upload" class="btn btn-primary"><i class="fa fa-spinner fa-spin" id="icon_upload" style="display:none"></i>Click To Migrate Data</button>
<?php
	echo $this->Form->end();
?>

	<hr />

	<div class="alert alert-success">
		<h3>Migration Members</h3>
	</div>
    <table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Type</th>
				<th>No</th>
				<th>Name</th>
                <th>company</th>
                <th>created</th>
			</tr>
		</thead>
		<tbody>
            <?php
            foreach ($members as $member) :
            ?>
                        <tr>
                            <td><?php echo $member['Member']['id']; ?>
                            <td><?php echo $member['Member']['type']; ?>
                            <td><?php echo $member['Member']['no']; ?>
                            <td><?php echo $member['Member']['name']; ?>
                            <td><?php echo $member['Member']['company']; ?>
                            <td><?php echo $member['Member']['created']; ?>
                        </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
	<div class="alert alert-success">
		<h3>Migration Transactions</h3>
	</div>
    <table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Member ID</th>
				<th>Member Name</th>
				<th>Member Pay Type</th>
                <th>Company</th>
                <th>Date</th>
                <th>Year</th>
                <th>Month</th>
                <th>Ref No</th>
                <th>Receipt No</th>
                <th>Payment method</th>
                <th>Batch No</th>
                <th>cheque No</th>
                <th>Payment Type</th>
                <th>Renewal Year</th>
                <th>Remark</th>
                <th>Sub Total</th>
                <th>Tax</th>
                <th>Total</th>
                <th>created</th>
			</tr>
		</thead>
		<tbody>
            <?php
            foreach ($transactions as $transaction) :
            ?>
                        <tr>
                            <td><?php echo $transaction['Transaction']['id']; ?>
                            <td><?php echo $transaction['Transaction']['member_id']; ?>
                            <td><?php echo $transaction['Transaction']['member_name']; ?>
                            <td><?php echo $transaction['Transaction']['member_paytype']; ?>
                            <td><?php echo $transaction['Transaction']['member_company']; ?>
                            <td><?php echo $transaction['Transaction']['date']; ?>
                            <td><?php echo $transaction['Transaction']['year']; ?>
                            <td><?php echo $transaction['Transaction']['month']; ?>
                            <td><?php echo $transaction['Transaction']['ref_no']; ?>
                            <td><?php echo $transaction['Transaction']['receipt_no']; ?>
                            <td><?php echo $transaction['Transaction']['payment_method']; ?>
                            <td><?php echo $transaction['Transaction']['batch_no']; ?>
                            <td><?php echo $transaction['Transaction']['cheque_no']; ?>
                            <td><?php echo $transaction['Transaction']['payment_type']; ?>
                            <td><?php echo $transaction['Transaction']['renewal_year']; ?>
                            <td><?php echo $transaction['Transaction']['remarks']; ?>
                            <td><?php echo $transaction['Transaction']['subtotal']; ?>
                            <td><?php echo $transaction['Transaction']['tax']; ?>
                            <td><?php echo $transaction['Transaction']['total']; ?>
                            <td><?php echo $transaction['Transaction']['created']; ?>
                        </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <div class="alert alert-success">
		<h3>Migration Transaction Items</h3>
	</div>
    <table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Transaction Id</th>
				<th>Description</th>
				<th>Quality</th>
                <th>Unit Price</th>
                <th>UOM</th>
                <th>SUM</th>
                 <th>Created</th>
			</tr>
		</thead>
		<tbody>
            <?php
            foreach ($transaction_items as $transaction_item) :
            ?>
                        <tr>
                            <td><?php echo $transaction_item['TransactionItem']['id']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['transaction_id']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['description']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['quantity']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['unit_price']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['uom']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['sum']; ?>
                            <td><?php echo $transaction_item['TransactionItem']['created']; ?>
                        </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php 
   		echo $this->Html->script('/metronic_new/plugins/jquery-1.10.2.min'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn_upload').click(function(){//alert("hi");
            var icon = document.getElementById("icon_upload"); 
            icon.style.display = 'inline-block';
            
           // var formdatas = new FormData($('#saveForm')[0]);
            $.ajax({
                type: 'POST',
                url: 'upload',
                //data: formdatas,
                success: function(data,textStatus,xhr){
                      console.log(data,textStatus,xhr);
                      icon.style.display = 'none';
                      location.reload('q1');
                },
                error: function(xhr,textStatus,error){alert("Error In Migration!!");
                        console.log(textStatus);
                }   
            });	
        });
    });
</script>