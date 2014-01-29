<?
class PatternsController extends AppController {

	var $name = 'Patterns';
	var $uses = array('Pattern','Tagtype');
	var $patternfolder = 'img/patterns/';


	function d($id,$tagtype_id = null) {
		$pattern = $this->Pattern->read(null,$id);
		$this->set('pattern', $pattern);
		$this->set('material', $pattern['Pattern']['material']);
		$this->Tagtype->recursive = 0;
		$tagtypes = $this->Tagtype->findAll();
		$this->set('tagtypes',$tagtypes);
	}
	

	function g($material) {
		$this->Pattern->recursive = 0;
		$page = $this->Pattern->findAll('material = \''.$material.'\'',null,'displayorder');
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

	
	
	
	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Pattern']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Pattern']['thumbpath'] = $fulldest;
			}

			if ($this->Pattern->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/patterns/d/'.$this->data['Pattern']['id']); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pattern->read(null, $id);
			$this->set('page',$this->data);

			$qry = $this->Pattern->query('SELECT Tag.*, Tagtype.type, Tagtype.displayorder FROM tagtypes Tagtype left outer join tags Tag on Tagtype.id = Tag.tagtype_id ORDER BY Tagtype.displayorder, Tag.displayorder');
			foreach($qry as $row) {
				$tags[$row['Tag']['id']] = $row['Tagtype']['type'].': '.$row['Tag']['tag'];
			}
			$this->set('tags', $tags);
			
			if (empty($this->data['Tag'])) { $this->data['Tag'] = null; }
			$this->set('selectedTags', $this->_selectedArray($this->data['Tag']));
		}
		$this->set('formaction','/adm/patterns/edit');
	}
	
	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();

			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
					
				//create full size
				$fulldest = $this->uniqueName($this->patternfolder,$this->params['form']['imagesource']['name']);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,450);
				$this->data['Pattern']['filepath'] = $fulldest;

				//create thumbnail
				$thumbname = str_replace('.','.thumb.',$this->params['form']['imagesource']['name']);
				$fulldest = $this->uniqueName($this->patternfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['Pattern']['thumbpath'] = $fulldest;
			}

	
			if ($this->Pattern->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = $this->Pattern->getLastInsertId();
				$this->redirect('/patterns/d/'.$id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		
		$qry = $this->Pattern->query('SELECT Tag.*, Tagtype.type, Tagtype.displayorder FROM tagtypes Tagtype left outer join tags Tag on Tagtype.id = Tag.tagtype_id ORDER BY Tagtype.displayorder, Tag.displayorder');
		foreach($qry as $row) {
			$tags[$row['Tag']['id']] = $row['Tagtype']['type'].': '.$row['Tag']['tag'];
		}
		$this->set('tags', $tags);
		$this->set('selectedTags', null);
		$this->set('formaction','/adm/patterns/add');
		$this->render('adm_edit');
	}


	function adm_delete($id) {
		$this->Pattern->delete($id);
		$this->redirect('/'); exit();
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
	
	
	
	
	function adm_reorder($material = 'wallcovering') {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$readpattern = $this->Pattern->read(null, $id);
					$readpattern['Pattern']['displayorder'] = $value;
					$this->Pattern->save($readpattern);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/patterns/g/'.$this->data['Afterpost']['material']); exit();
			}
		}
		$this->Pattern->recursive = 0;
		$tags = $this->Pattern->findAll('material = \''.$material.'\'',null,'displayorder');
		$this->set('links',$tags);
		$this->set('material',$material);
		$this->set('formaction','/adm/patterns/reorder');
	}
	

 
 
	
}
?>