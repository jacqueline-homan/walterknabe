<?
class SearchController extends AppController {

	var $name = 'Search';
	var $uses = array('Dpage','Pattern');
	var $searchexceptions = array('the','a','an','of','as','i','and','for','is','at','in','la');



	function results() {
		$this->pageTitle = 'Search Results :: '.$this->pageTitle;
		$this->Dpage->recursive = 0;
		$this->Pattern->recursive = 0;
		if (!empty($this->data) && trim($this->data['search']['string']) != '') {

			$clean = trim(strtolower($this->data['search']['string']));
			$clean = preg_replace('/[^0-9a-z -]/i','',$clean);
			$this->set('clean',$clean);
			$aWords = split(" ",$clean);

			//page matches
			$clause = '1 = 0';
			for($i=0;$i<count($aWords);$i++) {
				$w = $aWords[$i];
				if(!in_array($w,$this->searchexceptions)) {
					$clause .= " or pagetitle like '%".$w."%' or content like '%".$w."%' ";
				}
			}
			$pagematches = $this->Dpage->findAll($clause);
			$this->set('pagematches',$pagematches);
			
			//pattern matches
			$clause = '1 = 0';
			for($i=0;$i<count($aWords);$i++) {
				$w = $aWords[$i];
				if(!in_array($w,$this->searchexceptions)) {
					$clause .= " or name like '%".$w."%' or description like '%".$w."%' ";
				}
			}
			$patternmatches = $this->Pattern->findAll($clause);
			$this->set('patternmatches',$patternmatches);

			$this->render('results'); exit();
		}
		$this->redirect('/'); exit();
	}



	
}
?>