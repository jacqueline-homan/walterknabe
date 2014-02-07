<?
class PhotosController extends AppController {

	var $name = 'Photos';
	var $uses = array('Photo','Tagtype');
	var $photofolder = 'img/user/';



	function all($id = null) {
		if($id == null) {
			$page = $this->Photo->find(null,'id');
			$id = $page['Photo']['id'];
		}
		$page = $this->Photo->read(null,$id);
		$this->set('neighbours', $this->Photo->findNeighbours(null,'id', $id));
		$this->set('page',$page);
	}


	function d($category = 'media',$displayorder = 1) {
		$page = $this->Photo->find('category = \''.$category.'\' and displayorder = '.$displayorder);
		$this->set('neighbours', $this->Photo->findNeighbours('category = \''.$category.'\'', 'displayorder', $displayorder));
		$this->set('page',$page);
		$this->set('displayorder',$displayorder);
		$this->set('category',$category);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		$this->set('tagtypes',$tagtypes);
	}
	



	function adm_index($category = 'media') {
		$page = $this->Photo->findAll('category = \''.$category.'\'',null,'displayorder');
		$this->set('page',$page);
		$this->set('category',$category);
	}

	
	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->photofolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Photo']['thumbpath'] = $fulldest;

				//full size image
				$fulldest = $this->uniqueName($this->photofolder,$this->params['form']['imagesource']['name']);	
				$success = move_uploaded_file($this->params['form']['imagesource']['tmp_name'], $fulldest);
				$this->data['Photo']['filepath'] = $fulldest;
			}

			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/photos/index/'.$this->data['Photo']['category']); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/photos/edit');
	}
	

	
	function adm_add($category = 'media') {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->photofolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Photo']['thumbpath'] = $fulldest;

				//full size image
				$fulldest = $this->uniqueName($this->photofolder,$this->params['form']['imagesource']['name']);	
				$success = move_uploaded_file($this->params['form']['imagesource']['tmp_name'], $fulldest);
				$this->data['Photo']['filepath'] = $fulldest;
			}

	
			$this->data['Photo']['displayorder'] = $this->Photo->maxDisplay($this->data['Photo']['category']) + 1;
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/photos/index/'.$this->data['Photo']['category']); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/photos/add');
		$this->data = array('Photo'=>array('category'=>$category));
		$this->render('adm_edit');
	}



	function adm_delete($id) {
		$page = $this->Photo->read(null, $id);
		$this->Photo->delete($id);
		$this->redirect('/adm/photos/index/'.$page['Photo']['category']); exit();
	}
	
	
	
	
	function adm_reorder($category = 'media') {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Photo->read(null, $id);
					$this->data['Photo']['displayorder'] = $value;
					$this->Photo->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/adm/photos/index/'.$this->data['Photo']['category']); exit();
			}
		}
		$this->set('links', $this->Photo->findAll('category = \''.$category.'\'',null,'displayorder'));
		$this->set('formaction','/adm/photos/reorder/'.$category);
	}
	
	
	
	
	

 
 
	
}
?>