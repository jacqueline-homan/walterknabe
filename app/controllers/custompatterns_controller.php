<?
class CustompatternsController extends AppController {

	var $name = 'Custompatterns';
	var $uses = array('Custompattern');
	var $patternfolder = 'img/patterns/custom/';


	function g() {
		$this->Custompattern->recursive = 0;
		$page = $this->Custompattern->findAll(null,null,'displayorder');
		$this->set('page',$page);
		
		$background = $this->Session->read('background');
		$this->set('background',$background);
	}
	
	
	function pick($id) {
		$this->Custompattern->recursive = 0;
		$pick = $this->Custompattern->read(null,$id);
		$this->Session->write('pattern',$pick);
		$this->redirect('/custompatterncolors/g'); exit();
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
		$this->Custompattern->recursive = 0;
		$page = $this->Custompattern->findAll(null,null,'displayorder');
		$this->set('page',$page);
	}
	
	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custompattern']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custompattern']['thumbpath'] = $fulldest;
			}

			if ($this->Custompattern->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/custompatterns/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Custompattern->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/custompatterns/edit');
	}
	
	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custompattern']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custompattern']['thumbpath'] = $fulldest;
			}

	
			if ($this->Custompattern->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = $this->Custompattern->getLastInsertId();
				$this->redirect('/adm/custompatterns/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/custompatterns/add');
		$this->render('adm_edit');
	}


	function adm_delete($id) {
		$this->Custompattern->delete($id);
		$this->redirect('/adm/custompatterns/'); exit();
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
					$readpattern = $this->Custompattern->read(null, $id);
					$readpattern['Custompattern']['displayorder'] = $value;
					$this->Custompattern->save($readpattern);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/adm/custompatterns'); exit();
			}
		}
		$this->Custompattern->recursive = 0;
		$tags = $this->Custompattern->findAll(null,null,'displayorder');
		$this->set('links',$tags);
		$this->set('formaction','/adm/custompatterns/reorder');
	}
	
	
	

 
 
	
}
?>