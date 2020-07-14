<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));
		
			$portion =$this->Order->query("SELECT item_id,parts.name,portion_details.value FROM `portions` left join portion_details on portions.id=portion_details.portion_id left join parts on portion_details.part_id=parts.id
											where portions.valid = 1 order by parts.name");
			
			$order_reports =[];
			foreach($orders as $key=>$order){				
				$order_name = $order["Order"]["name"];
				$id = $order["Order"]["id"];
				$order_reports[$order_name] = []; // initialize the ordername
				foreach($order["OrderDetail"] as $key1=>$order_detail){
					
					$item_id = $order_detail["item_id"];
					$quantity = $order_detail["quantity"];
					
					$result = $this->searchForId($item_id,$portion);
					
					if(count($result)>0)
					{
						foreach($result as $key3=>$found){
							$part_name = $found["parts"]["name"];
							$portion_amount = $found["portion_details"]["value"];				
					
							if(array_key_exists($part_name,$order_reports[$order_name]))
								$order_reports[$order_name][$part_name] = $order_reports[$order_name][$part_name] + ((int)$quantity * (int)$portion_amount);
							else					
								$order_reports[$order_name][$part_name] = (int)$quantity * (int)$portion_amount;
						}
						
						
					}

						
				}
				ksort($order_reports[$order_name]);
			}			

			$this->set('order_reports',$order_reports);

			$this->set('title',__('Orders Report'));
		}		
		public function searchForId($id, $array) {
			$found = [];
			foreach ($array as $key => $val) {
				if ($val['portions']["item_id"] === $id) {
					$found[]= $val;
				}
			}
			return $found;
		 }
		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}