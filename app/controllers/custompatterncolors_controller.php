<?
class CustompatterncolorsController extends AppController {

	var $name = 'Custompatterncolors';
	var $uses = array('Custompatterncolor');
	var $patternfolder = 'img/patterns/custom/';


	function g() {
		$background = $this->Session->read('background');
		$this->set('prevbackground',$background);
		$pattern = $this->Session->read('pattern');
		$this->set('prevpattern',$pattern);

		$custompattern_id = $pattern['Custompattern']['id'];
		$this->Custompatterncolor->recursive = 0;
		$page = $this->Custompatterncolor->findAll('custompattern_id = '.$custompattern_id,null,'`Custompatterncolor`.name');
		$this->set('page',$page);		
	}

	
	
	function pick($id) {
		$this->Custompatterncolor->recursive = 0;
		$pick = $this->Custompatterncolor->read(null,$id);
		$this->Session->write('color',$pick);
		$this->redirect('/custompatterncolors/view'); exit();
	}
	
	
	function view() {
		$background = $this->Session->read('background');
		$this->set('background',$background);
		$pattern = $this->Session->read('pattern');
		$this->set('pattern',$pattern);
		$color = $this->Session->read('color');
		$this->set('color',$color);
	}



/*	function d($id,$tagtype_id = null) {
		$pattern = $this->Pattern->read(null,$id);
		$this->set('pattern', $pattern);
		$this->set('material', $pattern['Pattern']['material']);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		$this->set('tagtypes',$tagtypes);
	}
	

	function g($material) {
		$this->Pattern->recursive = 0;
		$page = $this->Pattern->findAllByMaterial($material);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		//$this->pageTitle .= ' :: '.$page['Dpage']['pagetitle'];
		$this->set('page',$page);
		$this->set('tagtypes',$tagtypes);
		$this->set('material',$material);
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
	
	

	function adm_index($custompattern_id) {
		$custompattern = $this->Custompatterncolor->Custompattern->read(null,$custompattern_id);
		$this->set('custompattern',$custompattern);
		
		$this->Custompatterncolor->recursive = 0;
		$page = $this->Custompatterncolor->findAll('custompattern_id = '.$custompattern_id);
		$this->set('page',$page);
		$this->set('custompattern_id',$custompattern_id);
	}
	
	
	function adm_edit($custompattern_id, $id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custompatterncolor']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custompatterncolor']['thumbpath'] = $fulldest;
			}

			if ($this->Custompatterncolor->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/adm/custompatterncolors/index/'.$custompattern_id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Custompatterncolor->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/custompatterncolors/edit/'.$custompattern_id);
	}
	
	
	function adm_add($custompattern_id) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Custompatterncolor']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeTransparentGif($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Custompatterncolor']['thumbpath'] = $fulldest;
			}
			$this->data['Custompatterncolor']['custompattern_id'] = $custompattern_id;

	
			if ($this->Custompatterncolor->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = $this->Custompatterncolor->getLastInsertId();
				$this->redirect('/adm/custompatterncolors/index/'.$custompattern_id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/custompatterncolors/add/'.$custompattern_id);
		$this->render('adm_edit');
	}


	function adm_delete($custompattern_id, $id) {
		$this->Custompatterncolor->delete($id);
		$this->redirect('/adm/custompatterncolors/index/'.$custompattern_id); exit();
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
	
	
	
	
	

 
 
	
}
?>