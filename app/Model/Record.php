<?php
	class Record extends AppModel{
		public $hasMany = array('RecordItem');
	}