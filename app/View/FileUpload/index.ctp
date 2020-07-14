<div class="row-fluid">
	<div class="alert alert-info">
		<h3>File Upload Question</h3>
	</div>

	<p>Complete the File Upload feature and import the attached <?php echo $this->Html->link('<i class="icon-share
"></i> CSV file', '/files/FileUpload.csv', array('escape' => false)); ?>. Imported data will be shown below.</p>
	<p><em>* score will be given for filetype/mimetype checks</em></p>

	<hr />

	<div class="alert">
		<h3>Import Form</h3>
	</div>
<?php
// echo $this->Form->create('FileUpload');
// echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file'));
// echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
// echo $this->Form->end();
	echo $this->Form->create('FileUpload' ,['type' => 'file','url' => ['controller'=>'FileUpload','action' => 'upload'],'id'=>'saveForm','class'=>'form-inline','role'=>'form']);
	//echo  $this->Form->create('FileUpload',array('controller'=>'FileUpload','action'=>'upload','id'=>'saveForm'));
	echo $this->Form->input('csv', ['type'=>'file','class' => 'form-control', 'label' => false, 'placeholder' => 'csv upload']);
	echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
	if (isset($message)): echo '<span style="color:red">'.$message.'</span>';
	endif;
	echo $this->Form->end();
?>

	<hr />

	<div class="alert alert-success">
		<h3>Data Imported</h3>
	</div>

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($file_uploads as $file_upload) :
?>
			<tr>
				<td><?php echo $file_upload['FileUpload']['id']; ?>
				<td><?php echo $file_upload['FileUpload']['name']; ?>
				<td><?php echo $file_upload['FileUpload']['email']; ?>
				<td><?php echo $file_upload['FileUpload']['created']; ?>
			</tr>
<?php
endforeach;
?>
		</tbody>
	</table>
</div>
<?php 
   		echo $this->Html->script('/metronic_new/plugins/jquery-1.10.2.min'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#saveForm').submit(function(){
			var formdatas = new FormData($('#saveForm')[0]);
			var formUrl = $(this).attr('action');
		
            $.ajax({
                type: 'POST',
                url: formUrl,
                data: formdatas,
                success: function(data,textStatus,xhr){
                        alert(data);
                },
                error: function(xhr,textStatus,error){
                        alert(textStatus);
                }
            });	
                
            return false;
        });
    });
</script>