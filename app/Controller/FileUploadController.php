<?php

class FileUploadController extends AppController {
	public function index() {
		$err_msg='';
		if($this->request["named"]){
			if($this->request["named"]["with_message"])
				$err_msg = $this->request["named"]["with_message"];			
		}
		$this->set('message', __($err_msg));
		$this->set('title', __('File Upload Answer'));
		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
	public function upload() {
		    $val_message = '';
			if($_FILES["data"]["name"]["FileUpload"]["csv"]){
				$filename = explode('.', $_FILES["data"]["name"]["FileUpload"]["csv"]);
				
				if($filename[1]=='csv'){	
					$handle = fopen($_FILES["data"]["tmp_name"]["FileUpload"]["csv"], "r");
				
					$data_header =[];
					$i = 0; // to mark header row
					while ($row = fgetcsv($handle)){	
						$data = array();			
						$item1 = $row[0];
						$item2 = $row[1];
						if($i === 0) //if first row
						{
							// get header
							$data_header = array(
								strtolower($item1),strtolower($item2)
							);						
						
						}
						else{//get data
								foreach ($data_header as $k=>$head) {
									
									$data['FileUpload'][$head]=(isset($row[$k])) ? $row[$k] : '';
								} 
							
								$this->FileUpload->create();
								$this->FileUpload->save($data);					
						}						
						
						$i++;
					}
			
					fclose($handle);
				}
				else{
					   $val_message = "Wrong uploaded file type.. please choose csv. ";
				}
			}
			else{
				   $val_message = "Please choose file";
			}
			$this->redirect(['controller' => 'FileUpload', 'action' => 'index',"with_message" =>$val_message]);
			//$this->render(FALSE);
		
	}
}