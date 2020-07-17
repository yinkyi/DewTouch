<?php
	class Record extends AppModel{
		var $recursive = -1;
		public $hasMany = array('RecordItem');
	}