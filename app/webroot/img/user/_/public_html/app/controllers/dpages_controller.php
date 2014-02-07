<?
class DpagesController extends AppController {

	var $name = 'Dpages';
	var $uses = array('Dpage','Setting');
	var $components = array('Email');



	function home() {
		$this->isHome = 1;
		$this->set('pattern',$this->Setting->read(null,1));
	}


	function home2() {
		$this->isHome = 1;
		$this->set('pattern',$this->Setting->read(null,1));
	}


	function home3() {
		$this->isHome = 1;
		$this->set('pattern',$this->Setting->read(null,1));
	}


	function v($id,$image_id = null) {
		$page = $this->Dpage->read(null, $id);
		$this->pageTitle .= ' :: '.$page['Dpage']['pagetitle'];
		$this->set('page',$page);
		$this->set('id',$id);
		/*if($page['Dpage']['type'] == 'gallery') {
			foreach($page['Child'] as $key => $product) {
				$page['Child'][$key]['thumbpath'] = $this->Dpage->firstProductThumb($product['id']);
			}
			$this->set('page',$page);
			$this->render('gallery');
		}
		if($page['Dpage']['type'] == 'product') {
			if($image_id == null && count($page['Image']) > 0) { $image_id = $page['Image'][0]['id']; }
			$this->set('image_id',$image_id);
			$this->render('product');
		}*/
	}



	function contact() {
		if(!empty($this->data)) {
			$setting = $this->Setting->read(null,1);
			$to = $setting['Setting']['email'];
			$subject = "walterknabe.com Contact Form: from ".$this->data['Contact']['name'];

			$from = $this->data['Contact']['email'];
			$name = $this->data['Contact']['name'];

			$message = $this->data['Contact']['message'];
			
			$this->Email->email($to, $from, $name, $subject, $message);
			
			$this->redirect('/dpages/v/6'); exit();
		}
		$this->Session->setFlash('You have arrived at this page in error.');
	}


	
	function adm_edit($id = null) {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			if ($this->Dpage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/dpages/v/'.$this->data['Dpage']['id']); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dpage->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/dpages/edit');
	}
	
	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			$this->data['Dpage']['displayorder'] = $this->Dpage->maxDisplay() + 1;
			if ($this->Dpage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = mysql_insert_id();
				$this->redirect('/dpages/v/'.$id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/dpages/add');
		$this->render('adm_edit');
	}


	function adm_delete($id) {
		$this->Dpage->delete($id);
		$this->redirect('/'); exit();
	}
	
	/*
	function adm_addgallery() {
		if (!empty($this->data)) {
			$this->cleanUpFields();
			$this->data['Dpage']['displayorder'] = $this->Dpage->maxDisplay('B') + 1;
			$this->data['Dpage']['type'] = 'gallery';
			$this->data['Dpage']['navgroup'] = 'B';
			if ($this->Dpage->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$id = mysql_insert_id();
				$this->redirect('/dpages/v/'.$id); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/dpages/addgallery');
		$this->render('adm_edit');
	}
	
	
	function adm_addproduct($galleryid) {
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
	}
	
	*/
	
	
	
	function adm_reorder($navgroup = null) {
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
		//$this->set('maxorder',$this->Dpage->maxDisplay($navgroup));
		$this->set('links',$this->Dpage->findAll('displayorder > 0','id, linktext, displayorder','displayorder'));	
		$this->set('formaction','/adm/dpages/reorder');
	}
	
	/*
	function adm_reorderproducts($galleryid) {
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
				$this->redirect('/dpages/v/'.$galleryid); exit();
			}
		}
		$this->set('maxorder',$this->Dpage->maxDisplayChild($galleryid));
		$this->set('links',$this->Dpage->findAllByParentid($galleryid,'id, linktext, displayorder','displayorder'));	
		$this->set('formaction','/adm/dpages/reorderproducts/'.$galleryid);
		$this->render('adm_reorder');
	}
	
	*/
	
	
	
	

 
 
	
}
?>