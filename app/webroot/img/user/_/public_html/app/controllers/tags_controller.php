<?
class TagsController extends AppController {

	var $name = 'Tags';
	var $uses = array('Tag','Tagtype');



	function adm_index() {
		$this->Tagtype->recursive = 1;
		$tags = $this->Tagtype->findAll(null,null,'displayorder');
		$this->set('tags',$tags);
	}


	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/tags/index/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tag->read(null, $id);
			$this->set('page',$this->data);
			$types = $this->Tagtype->generateList(null, 'displayorder', null, '{n}.Tagtype.id', '{n}.Tagtype.type');
			$this->set('types',$types);
		}
		$this->set('formaction','/adm/tags/edit');
	}
	

	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			$tagtype_id = $this->data['Tag']['tagtype_id'];
			$this->data['Tag']['displayorder'] = $this->Tag->maxDisplay($tagtype_id) + 1;
			if ($this->Tag->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/tags/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$types = $this->Tagtype->generateList(null, 'displayorder', null, '{n}.Tagtype.id', '{n}.Tagtype.type');
		$this->set('types',$types);
		$this->set('formaction','/adm/tags/add');
		$this->render('adm_edit');
	}

	
	
	function adm_delete($id) {
		$this->Tag->delete($id);
		$this->redirect('/adm/tags/index/'); exit();
	}
	

	
	function adm_reorder() {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Tag->read(null, $id);
					$this->data['Tag']['displayorder'] = $value;
					$this->Tag->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/adm/tags/'); exit();
			}
		}
		$this->Tagtype->recursive = 1;
		$tags = $this->Tagtype->findAll(null,null,'displayorder');
		$this->set('links',$tags);
		$this->set('formaction','/adm/tags/reorder');
	}
 
 
	
}
?>