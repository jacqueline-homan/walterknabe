<?php
class SettingsController extends AppController {

	var $name = 'Settings';
    var $uses = array('Setting','Pattern');
	var $userimages = 'img/user/';



	function adm_edit() {
        if(!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
        } else {
			$this->data = $this->Setting->read(null,1);
			$patterns = $this->Pattern->generateList(null, 'name', null, '{n}.Pattern.id', '{n}.Pattern.name');
			$this->set('patterns',$patterns);
		}		
	}


	
    function login() {
        if(!empty($this->data)) {
			$setting = $this->Setting->read(null,1);
           if(/*$this->data['Setting']['password'] == $setting['Setting']['password']*/ $this->data['Setting']['password'] == 'wkstudio') {
                $this->Session->write('user', $this->data);
                $this->redirect('/'); exit();
            } else {
                $this->Session->setFlash('Invalid password.');
            }
        }
    }


    function logout() {
        $this->Session->destroy();
        $this->redirect('/');
    }


	function adm_images() {
		$myDirectory = opendir(WWW_ROOT.'/img/user');
		while (false !== ($entryName = readdir($myDirectory))) {
			if ($entryName != "." && $entryName != "..") {
    	        $dirArray[] = $entryName;
    	    }
    	}
		closedir($myDirectory);
		natsort($dirArray);
		
		$this->set('images',$dirArray);
	}
	
	
	function adm_images_add() {
		if (!empty($this->params['form']) &&
				is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
			$imagename = str_replace(" ","_",$_FILES['imagesource']['name']);
			//insure unique filename
			$fulldest = $this->userimages.$imagename;
			$originaldest = $fulldest;
			for ($i=1; file_exists($fulldest); $i++) {
				$fulldest = str_replace(".","$i.",$originaldest);
			}
			$success = move_uploaded_file($_FILES['imagesource']['tmp_name'], $fulldest);
			$this->redirect('/adm/settings/images'); exit();
		}
	}
	
	
	function adm_images_delete($filename) {
		unlink($this->userimages.$filename);
		$this->redirect('/adm/settings/images'); exit();	
	}
		

}
?>
