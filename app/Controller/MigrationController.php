<?php
    set_time_limit(300);
	App::import('Vendor', 'php-excel-reader/excel_reader2'); //import statement
	App::import('Vendor', 'php-excel-reader/SpreadsheetReader'); //import statement
	//require('php-excel-reader/SpreadsheetReader.php'); //import statement
	class MigrationController extends AppController{
		
		public function q1(){
			$this->set('title', __('File Upload Answer'));
			$this->setFlash('Question: Migration of data to multiple DB table');
			$this->loadModel('Member');
			$members = $this->Member->find('all');	
			$this->loadModel('Transaction');
			$transactions = $this->Transaction->find('all');	
			$this->loadModel('TransactionItem');
			$transaction_items = $this->TransactionItem->find('all');	
			$this->set(compact('members','transactions','transaction_items'));

// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
		public function q1_instruction(){

			$this->setFlash('Question: Migration of data to multiple DB table');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		public function upload() {
			
			$val_message = '';
			// $file_data = $this->request->data["MigrationData"]["xlsx"]["name"];
			// if($file_data){
			// 	$filename = explode('.', $file_data);
				
			// 	if($filename[1]=='xlsx'){	
					//$handle = fopen($this->request->data["MigrationData"]["xlsx"]["tmp_name"], "r");					
					$Reader = new SpreadsheetReader('files/migration_sample_1.xlsx');
					// $Sheets = $Reader -> Sheets();
					
					foreach ($Reader as $key=>$Row)
					{
						if($key>0) // IF NOT First row
						{
							//member
							$data = array();
							$member_name = $Row[2];
							$data['Member']["name"]=$member_name;
							$member_no = explode(' ',$Row[3]);
							$type=$member_no[0]?$member_no[0]:'';
							$no = $member_no[1]?$member_no[1]:'';
						    $data['Member']["type"]=$type;
							$data['Member']["no"]=$no;
							$company_name = $Row[5]?$Row[5]:NULL;
							$data['Member']["company"]=$company_name;

							$this->loadModel('Member');
							$m_exist=$this->Member->find('first', array(
								'conditions' => array('Member.name' => $member_name,"Member.type"=>$type,'Member.no' => $no,"Member.company"=>$company_name)
							));
							
							if($m_exist)
							{
								$data['Member']["id"]=(int) $m_exist["Member"]["id"];	
							}
							else{
								$this->Member->create();
							}							
								$m_result=$this->Member->save($data);
								$m_id=(int) $m_result["Member"]["id"];	
							
							//transaction						
							$data['Transaction']["member_id"]=$m_id;
							$data['Transaction']["member_name"]=$member_name;
							$data['Transaction']["member_paytype"]=$Row[4];
							$data['Transaction']["member_company"]=$company_name;
							$date = $Row[0]?date('Y-m-d',strtotime($Row[0])):NULL;
							$year = $Row[0]?date('Y',strtotime($Row[0])):NULL;
							$month =$Row[0]?date('m',strtotime($Row[0])):NULL;
							$data['Transaction']["date"]=$date;
							$data['Transaction']["year"]=$year;
							$data['Transaction']["month"]=$month;
							$data['Transaction']["ref_no"]=$Row[1];
							$data['Transaction']["receipt_no"]=$Row[8];
							$data['Transaction']["payment_method"]=$Row[6];
							$data['Transaction']["batch_no"]=$Row[7];
							$data['Transaction']["cheque_no"]=$Row[9]?$Row[9]:NULL;
							$data['Transaction']["payment_type"]=$payment_type;
							$payment_type = $Row[10];
							$data['Transaction']["payment_type"]=$payment_type;
							$renewal_year = $Row[11]?(int) $Row[11]:0;
							$data['Transaction']["renewal_year"]=$renewal_year;
							$price = $Row[12]?(double) $Row[12]:0;
							$data['Transaction']["subtotal"]=$price;
							$data['Transaction']["tax"]=$Row[13]?(double) $Row[13]:0;
							$data['Transaction']["total"]=$Row[14]?(double) $Row[14]:0;

							$this->loadModel('Transaction');
							$t_exist=$this->Transaction->find('first', array(
								'conditions' => array('Transaction.member_id' => $m_id)
							));
							if($t_exist)
							{
								$data['Transaction']["id"]=(int) $t_exist["Transaction"]["id"];
							}else{
								$this->Transaction->create();
							}								
								$t_result=$this->Transaction->save($data);
								$t_id=(int) $t_result["Transaction"]["id"];
													
							//Transaction Items	
							$data['TransactionItem']["transaction_id"]=$t_id;	
							$data['TransactionItem']["description"]="Being Payment for :".$payment_type.":".$renewal_year;
							$data['TransactionItem']["quantity"]=1.00;	
							$data['TransactionItem']["unit_price"]=$price;	
							$data['TransactionItem']["sum"]=$price*1;
							$data['TransactionItem']["table"]="Member";
							$data['TransactionItem']["table_id"]=1;
							//Transaction Items
							$this->loadModel('TransactionItem');
							$ti_exist=$this->TransactionItem->find('first', array(
								'conditions' => array('TransactionItem.transaction_id' => $t_id)
							));
							if($ti_exist)
							{
								$data['TransactionItem']["id"] = (int) $ti_exist["TransactionItem"]["id"];
							}
							else{
								$this->TransactionItem->create();
							}							
							$ti_result=$this->TransactionItem->save($data);


						}						
						
					}		
				
				
				//}
			// 	else{
			// 		   $val_message = "Wrong uploaded file type.. please choose csv. ";
			// 	}
			// }
			// else{
			// 	   $val_message = "Please choose file";
			// }
			return  "success";
			//$this->render(FALSE);
		
	}
		
}