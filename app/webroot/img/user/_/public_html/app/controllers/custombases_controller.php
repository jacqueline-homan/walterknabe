<?
class CustombasesController extends AppController {

	var $name = 'Custombases';
	var $uses = array('Custombase');
	var $patternfolder = 'img/patterns/custom/';


	function g() {
		$this->Custombase->recursive = 0;
		$page = $this->Custombase->findAll(null,null,'displayorder');
		$this->set('page',$page);
	}
	
	
	function pick($id) {
		$this->Custombase->recursive = 0;
		$pick = $this->Custombase->read(null,$id);
		$this->Session->write('background',$pick);
		$this->redirect('/custompatterns/g'); exit();
	}


/*	function d($id,$tagtype_id = null) {
		$pattern = $this->Pattern->read(null,$id);
		$this->set('pattern', $pattern);
		$this->set('material', $pattern['Pattern']['material']);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		$this->set('tagtypes',$tagtypes);
	}
	


	function sorted($material,$tagtype_id) {
		$this->Tagtype->Tag->unbindModel(array('hasAndBelongsToMany' => array('Pattern')));
		$this->Tagtype->Tag->bindModel(
			array('hasAndBelongsToMany' => array(
					'Pattern' => array(
						'className' => 'Pattern',
						 'joinTable'    => 'patterns_tags',
						 'conditions'   => "material = '".$material."'",
						 'unique'       => true,
					)
				)
			)
		);
		$this->Tagtype->recursive = 2;
		$page = $this->Tagtype->findAllById($tagtype_id);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		$this->set('page',$page);
		$this->set('tagtypes',$tagtypes);
		$this->set('material',$material);
	}
*/
	
	

	function adm_index() {
		$this->Custombase->recursive = 0;
		$page = $this->Custombase->findAll(null,null,'displayorder');
		$this->set('page',$page);
	}
	
	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custombase']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custombase']['thumbpath'] = $fulldest;
			}

			if ($this->Custombase->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/custombases/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Custombase->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/custombases/edit');
	}
	
	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custombase']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custombase']['thumbpath'] = $fulldest;
			}

	
			if ($this->Custombase->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = $this->Custombase->getLastInsertId();
				$this->redirect('/adm/custombases/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/custombases/add');
		$this->render('adm_edit');
	}


	function adm_delete($id) {
		$this->Custombase->delete($id);
		$this->redirect('/adm/custombases/'); exit();
	}
	
	
	
/*	function adm_addproduct($galleryid) {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			$this->data['Dpage']['displayorder'] = $this->Dpage->maxDisplayChild($galleryid) + 1;
			$this->data['Dpage']['type'] = 'product';
			$this->data['Dpage']['parentid'] = $galleryid;
			if ($this->Dpage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = mysql_insert_id();
				$this->redirect('/dpages/v/'.$id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/dpages/addproduct/'.$galleryid);
		$this->render('adm_edit');
	}*/
	
	
	
	
/*	function adm_reorder($navgroup = null) {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->Dpage->read(null, $id);
					$this->data['Dpage']['displayorder'] = $value;
					$this->Dpage->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/'); exit();
			}
		}
		$this->set('maxorder',$this->Dpage->maxDisplay($navgroup));
		$this->set('links',$this->Dpage->findAllByNavgroup($navgroup,'id, linktext, displayorder','displayorder'));	
		$this->set('formaction','/adm/dpages/reorder');
	}
*/
	
	
	
	function adm_reorder() {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$readpattern = $this->Custombase->read(null, $id);
					$readpattern['Custombase']['displayorder'] = $value;
					$this->Custombase->save($readpattern);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/adm/custombases'); exit();
			}
		}
		$this->Custombase->recursive = 0;
		$tags = $this->Custombase->findAll(null,null,'displayorder');
		$this->set('links',$tags);
		$this->set('formaction','/adm/custombases/reorder');
	}
	
	
	

 
 
	
}
?>