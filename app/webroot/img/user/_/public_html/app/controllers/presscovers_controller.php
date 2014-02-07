<?
class PresscoversController extends AppController {

	var $name = 'Presscovers';
	var $uses = array('Presscover');
	var $pressfolder = 'img/press/';



	function index() {
		$this->Presscover->recursive = 0;
		$page = $this->Presscover->findAll(null,null,'displayorder');
		$this->set('page',$page);
	}


	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();


			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
				$thumbname = $this->params['form']['imagesource']['name'];
				$fulldest = $this->uniqueName($this->pressfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Presscover']['thumbpath'] = $fulldest;
			}


			if ($this->Presscover->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/presscovers/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Presscover->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/presscovers/edit');
	}
	

	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();


			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
				$thumbname = $this->params['form']['imagesource']['name'];
				$fulldest = $this->uniqueName($this->pressfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Presscover']['thumbpath'] = $fulldest;
			}


			$this->data['Presscover']['displayorder'] = $this->Presscover->maxDisplay() + 1;
			if ($this->Presscover->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/presscovers/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/presscovers/add/');
		$this->render('adm_edit');
	}

	
	
	function adm_delete($id) {
		$this->Presscover->delete($id);
		$this->redirect('/presscovers/'); exit();
	}
	

	
	function adm_reorder() {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Presscover->read(null, $id);
					$this->data['Presscover']['displayorder'] = $value;
					$this->Presscover->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/presscovers/'); exit();
			}
		}
		//$this->set('maxorder',$this->Presscover->maxDisplay());
		$this->set('links',$this->Presscover->findAll(null,null,'displayorder'));	
		$this->set('formaction','/adm/presscovers/reorder');
	}
 
 
	
}
?>