<?php
	class PortionController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));

			// debug($portions);exit;

			$this->set('portions',$portions);
			
			$this->set('title',__('List Orders'));
		}

		public function view($id){

			if($id != null){

				$this->loadModel('PortionDetail');
				$portion_details = $this->PortionDetail->find('all',array('conditions'=>array('PortionDetail.valid'=>1,'PortionDetail.portion_id'=>$id)));
				
				// debug($portion_details);exit;

				$this->set('portion_details',$portion_details);

				$this->set('title',__('View Portion Detail'));

			}

		}

}
