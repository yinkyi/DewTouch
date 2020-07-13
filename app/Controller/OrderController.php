<?php
	class OrderController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);
			
			$this->set('title',__('List Orders'));
		}

		public function view($id){

			if($id != null){

				$this->loadModel('OrderDetail');
				$order_details = $this->OrderDetail->find('all',array('conditions'=>array('OrderDetail.valid'=>1,'OrderDetail.order_id'=>$id)));
				
				// debug($order_details);exit;

				$this->set('order_details',$order_details);

				$this->set('title',__('View Order Detail'));

			}

		}
		
	}