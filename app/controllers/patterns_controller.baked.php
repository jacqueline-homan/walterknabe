<?php
class PatternsController extends AppController {

	var $name = 'Patterns';
	var $helpers = array('Html', 'Form' );

	function index() {
		$this->Pattern->recursive = 0;
		$this->set('patterns', $this->Pattern->findAll());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Pattern.');
			$this->redirect('/patterns/index');
		}
		$this->set('pattern', $this->Pattern->read(null, $id));
	}

	function add() {
		if (empty($this->data)) {
			$this->set('tags', $this->Pattern->Tag->generateList());
			$this->set('selectedTags', null);
			$this->render();
		} else {
			$this->cleanUpFields();
			if ($this->Pattern->save($this->data)) {
				$this->Session->setFlash('The Pattern has been saved');
				$this->redirect('/patterns/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Pattern->Tag->generateList());
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
		}
	}

	function edit($id = null) {
		if (empty($this->data)) {
			if (!$id) {
				$this->Session->setFlash('Invalid id for Pattern');
				$this->redirect('/patterns/index');
			}
			$this->data = $this->Pattern->read(null, $id);
			$this->set('tags', $this->Pattern->Tag->generateList());
			if (empty($this->data['Tag'])) { $this->data['Tag'] = null; }
			$this->set('selectedTags', $this->_selectedArray($this->data['Tag']));
		} else {
			$this->cleanUpFields();
			if ($this->Pattern->save($this->data)) {
				$this->Session->setFlash('The Pattern has been saved');
				$this->redirect('/patterns/index');
			} else {
				$this->Session->setFlash('Please correct errors below.');
				$this->set('tags', $this->Pattern->Tag->generateList());
				if (empty($this->data['Tag']['Tag'])) { $this->data['Tag']['Tag'] = null; }
				$this->set('selectedTags', $this->data['Tag']['Tag']);
			}
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Pattern');
			$this->redirect('/patterns/index');
		}
		if ($this->Pattern->del($id)) {
			$this->Session->setFlash('The Pattern deleted: id '.$id.'');
			$this->redirect('/patterns/index');
		}
	}

}
?>