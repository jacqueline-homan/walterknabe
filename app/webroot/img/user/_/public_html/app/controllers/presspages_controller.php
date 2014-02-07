<?
class PresspagesController extends AppController {

	var $name = 'Presspages';
	var $uses = array('Presspage');
	var $pressfolder = 'img/press/';



	function index($presscover_id) {
		$this->Presspage->recursive = 0;
		$page = $this->Presspage->findAll('presscover_id = '.$presscover_id,null,'displayorder');
		$this->set('page',$page);
	}
	
	
	
	function d($presscover_id,$displayorder = 1) {
		$this->Presspage->recursive = 0;
		$page = $this->Presspage->find('presscover_id = '.$presscover_id.' and Presspage.displayorder = '.$displayorder);
		$this->Presspage->recursive = 0;
		$this->set('neighbours', $this->Presspage->findNeighbours('presscover_id = '.$presscover_id, 'Presspage.displayorder', $displayorder));
		$this->set('page',$page);
		$this->set('displayorder',$displayorder);
		$this->set('presscover_id',$presscover_id);
	}


	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->Presspage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$grab = $this->Presspage->read(null,$this->data['Presspage']['id']);
				$this->redirect('/presspages/d/'.$grab['Presspage']['presscover_id']); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Presspage->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/presspages/edit');
	}
	

	
	function adm_add($presscover_id) {
		if (!empty($this->data)) {
			$this->cleanUpFields();


			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
				$thumbname = $this->params['form']['imagesource']['name'];
				$fulldest = $this->uniqueName($this->pressfolder,$thumbname);	
				list($width, $height, $type, $attr) = getimagesize($this->params['form']['imagesource']['tmp_name']);
				if($width > 800) { $newwidth = 800; } else { $newwidth = $width; }				
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,$newwidth);
				$this->data['Presspage']['filepath'] = $fulldest;
			}


			$this->data['Presspage']['displayorder'] = $this->Presspage->maxDisplay($presscover_id) + 1;
			if ($this->Presspage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/presspages/d/'.$presscover_id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->data['Presspage']['presscover_id'] = $presscover_id;
		$this->set('formaction','/adm/presspages/add/'.$presscover_id);
		$this->render('adm_edit');
	}

	
	
	function adm_delete($id) {
		$grab = $this->Presspage->read(null,$id);
		$this->Presspage->delete($id);
		$this->redirect('/presspages/index/'.$grab['Presspage']['presscover_id']); exit();
	}
	

	
	function adm_reorder($presscover_id) {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Presspage->read(null, $id);
					$this->data['Presspage']['displayorder'] = $value;
					$this->Presspage->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/presspages/index/'.$presscover_id); exit();
			}
		}
		//$this->set('maxorder',$this->Presscover->maxDisplay());
		$this->set('links',$this->Presspage->findAll('presscover_id = '.$presscover_id,null,'displayorder'));	
		$this->set('formaction','/adm/presspages/reorder/'.presscover_id);
	}
 
 
	
}
?>