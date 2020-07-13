<?php

class Portion extends AppModel{

	var $belongsTo = array('Item');

	var $hasMany = array('PortionDetail' => array(
								'conditions' => array('PortionDetail.valid' => 1)
							)
						);

}