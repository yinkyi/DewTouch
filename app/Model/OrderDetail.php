<?php
	class OrderDetail extends AppModel{
		
		var $belongsTo = array('Item','Order');

	}