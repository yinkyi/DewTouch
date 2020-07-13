<?php
App::uses('Folder', 'Utility');
	class InitController extends AppController{
		
		public function index(){	
			$files = $this->_getFiles(true, false);
		
			foreach ($files as $file) {
					
				$success = false;			
					
				if (strpos($file['filename'], 'sql')) {
					$sql = array();
					$content = file_get_contents(dirname(APP) . DS . 'sql' . DS . $file['filename']);
			
// 					$db = new DATABASE_CONFIG();
					$dbname = 'default';
					
					App::uses('ConnectionManager', 'Model');
					$dataSource = ConnectionManager::getDataSource($dbname);
				
					$config = $dataSource->config;
			
					$cmd = 'which mysql';
					exec($cmd, $output);
					$cmd = 'mysql -h' . $config['host'] . ' -u' . $config['login'] . ' -p' . $config['password'] . ' ' . $config['database'] . ' < ' . dirname(APP) . DS . 'sql' . DS . $file['filename'] . ' 2>&1';
					if (empty($output)) {
						$cmd = '/Applications/MAMP/Library/bin/' . $cmd;
					}
					$output = null;
					exec($cmd, $output);
					if (empty($output)) {
						$success = true;
					}
				} else {
					eval($file['contents']);
					$success = true;
				}
					
				if($success){
					
				}else{
					
					break;
				}
					
			}
			
			$this->setSuccess();
			$this->redirect('/');
		}
		
		
		
		
		protected function _getFiles($versioned = true, $rsort = true) {
			$this->path = dirname(APP) . DS . 'sql';
			
			$files = array();
			
			$folder = new Folder($this->path);
			$found = $folder->find('.*', true);
		
			foreach ($found as $file) {
		
				$objFile = new File($this->path . DS . $file);
				$files[] = array('filename' => $file, 'contents' => $objFile->read());
			}
		
			if ($rsort) {
				rsort($files);
			}
		
			return $files;
		}
		
	}