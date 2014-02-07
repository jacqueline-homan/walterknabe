<?
class TagtypesController extends AppController {

	var $name = 'Tagtypes';
	var $uses = array('Tagtype');



	function adm_index() {
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll(null,null,'displayorder');
		$this->set('tagtypes',$tagtypes);
	}


	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->Tagtype->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/tagtypes/index/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tagtype->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/tagtypes/edit');
	}
	

	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			$this->data['Tagtype']['displayorder'] = $this->Tagtype->maxDisplay() + 1;
			if ($this->Tagtype->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/tagtypes/index/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/tagtypes/add');
		$this->render('adm_edit');
	}

	
	
	function adm_delete($id) {
		$this->Tagtype->delete($id);
		$this->redirect('/adm/tagtypes/index/'); exit();
	}
	

	
	function adm_reorder() {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Tagtype->read(null, $id);
					$this->data['Tagtype']['displayorder'] = $value;
					$this->Tagtype->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/adm/tagtypes/index/'); exit();
			}
		}
		$this->set('maxorder',$this->Tagtype->maxDisplay());
		$this->set('links',$this->Tagtype->findAll(null,null,'displayorder'));	
		$this->set('formaction','/adm/tagtypes/reorder');
	}
 
 
	
}
?>