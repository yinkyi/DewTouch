<?php

class FileUploadController extends AppController {
	public function index() {
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}