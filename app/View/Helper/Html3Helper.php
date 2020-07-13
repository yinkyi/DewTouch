<?php
App::uses('AppHelper', 'View/Helper');
class Html3Helper extends AppHelper{
	public $helpers = array('Html','Form');
	
	public function link($name,$url,$extra = array()){
		$extra['data-modal-href'] = Router::url($url);
		return $this->Html->link($name,'javascript:;',$extra);
	}
	
}

