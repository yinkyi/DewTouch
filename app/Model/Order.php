<?php
	class Order extends AppModel{
		
		var $hasMany = array('OrderDetail' => array(
									'conditions' => array('OrderDetail.valid' => 1)
								)
							);

	}