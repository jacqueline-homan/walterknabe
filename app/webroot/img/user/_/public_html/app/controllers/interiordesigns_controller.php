<?
class InteriorDesignsController extends AppController {

	var $name = 'InteriorDesigns';
	var $uses = array('InteriorDesign');
	var $designfolder = 'img/designs/';



	function index() {
		$this->InteriorDesign->recursive = 0;
		$page = $this->InteriorDesign->findAll(null,null,'displayorder');
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
				$this->data['InteriorDesign']['thumbpath'] = $fulldest;
			}


			if ($this->InteriorDesign->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/interiordesigns/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->InteriorDesign->read(null, $id);
			$this->set('page',$this->data);
		}
		$this->set('formaction','/adm/interiordesigns/edit');
	}
	

	
	function adm_add() {
		if (!empty($this->data)) {
			$this->cleanUpFields();


			if (!empty($this->params['form']) &&
					is_uploaded_file($this->params['form']['imagesource']['tmp_name'])) {
				$thumbname = $this->params['form']['imagesource']['name'];
				$fulldest = $this->uniqueName($this->pressfolder,$thumbname);	
				$this->resizeImage($this->params['form']['imagesource']['tmp_name'],$fulldest,125);
				$this->data['InteriorDesign']['thumbpath'] = $fulldest;
			}


			$this->data['InteriorDesign']['displayorder'] = $this->InteriorDesign->maxDisplay() + 1;
			if ($this->InteriorDesign->save($this->data)) {
				$this->Session->setFlash('The changes saved');
				$this->redirect('/interiordesign/'); exit();
			} else {
				$this->Session->setFlash('The changes could not be saved. Please, try again.');
			}
		}
		$this->set('formaction','/adm/interiordesigns/add/');
		$this->render('adm_edit');
	}

	
	
	function adm_delete($id) {
		$this->InteriorDesign->delete($id);
		$this->redirect('/interiordesign/'); exit();
	}
	

	
	function adm_reorder() {
		if(!empty($_REQUEST)) {
			$updated = false;
			foreach($_REQUEST as $key=>$value) {
				if(substr($key,0,strlen("displayorder_")) == "displayorder_") {
					$id = str_replace("displayorder_","",$key);
					$this->data = $this->InteriorDesign->read(null, $id);
					$this->data['InteriorDesign']['displayorder'] = $value;
					$this->InteriorDesign->save($this->data);
					$updated = true;
				}	
			}
			if($updated) {
				$this->Session->setFlash('Changes saved');
				$this->redirect('/interiordesigns/'); exit();
			}
		}
		//$this->set('maxorder',$this->InteriorDesign->maxDisplay());
		$this->set('links',$this->InteriorDesign->findAll(null,null,'displayorder'));	
		$this->set('formaction','/adm/interiordesigns/reorder');
	}
 
 
	
}
?>