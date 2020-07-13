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
echo $this->Form->create('FileUpload');
echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file'));
echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
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