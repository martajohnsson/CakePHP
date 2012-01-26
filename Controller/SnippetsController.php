<?php
App::uses('AppController', 'Controller');
require_once('constants.php');
/**
 * Snippets Controller
 *
 * @property Snippet $Snippet
 */
class SnippetsController extends AppController {
    
    public $components = array('Redirect');
    
    //# Request actions
//	function languages()
//	{
//	  $this->Snippet->Language->recursive = 0;
//	  return $this->Snippet->Language->find(ALL);
//	}
    
    public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow(INDEX, VIEW);
	}
	
	public function isAuthorized($user) {
	    if ($user[ROLE] == ADMIN) {
	        return true;
	    }
	    if (in_array($this->action, array(EDIT, DELETE_ITEM))) {
	        if ($user[ID] != $this->request->params[PASS][0]) {
	            return false;
	        }
	    }
	    return true;
	}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		
        $this->Redirect->urlToNamed();
        $conditions = $this->searchConditions($this->params);
        $this->set(SIDE_TITLE, 'Start View');
		$this->Snippet->recursive = 0;
        $this->set(SNIPPETS_VIEW,$this->paginate('Snippet',$conditions));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Snippet->id = $id;
		if (!$this->Snippet->exists()) {
                $this->_fail(SNIPPET_IS_MISSING);
                $this->redirect(INDEX);
		}
		$this->set(SNIPPET_VIEW, $this->Snippet->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is(POST)) {
			$this->Snippet->create();
			if ($this->Snippet->save($this->request->data)) {
				$this->_success(SNIPPET_ADDED);
                $this->_redirect(VIEW,$this->Snippet->id);
			} else {
				$this->_fail(SNIPPET_ADD_FAIL);
			}
		}
        $this->_setVar();
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Snippet->id = $id;
		if (!$this->Snippet->exists()) {
                $this->_fail(SNIPPET_IS_MISSING);
                $this->redirect(INDEX);
		}
		if ($this->request->is(POST) || $this->request->is(PUT)) {
			if ($this->Snippet->save($this->request->data)) {
				$this->_success(CHANCHED);
				$this->_redirect(VIEW,$this->Snippet->id);
			} else {
				$this->_fail(CHANGE_FAIL);
			}
		} else {
			$this->request->data = $this->Snippet->read(null, $id);
		}
        $this->_setVar();
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is(POST)) {
			throw new MethodNotAllowedException();
		}
		$this->Snippet->id = $id;
		if (!$this->Snippet->exists()) {
                $this->_fail(SNIPPET_IS_MISSING);
                $this->redirect(INDEX);
		}
		if ($this->Snippet->delete()) {
			$this->_success(SNIPPET_DELETED);
			$this->_redirect(INDEX);
		}
		$this->_fail(SNIPPET_DELETE_FAIL);
		$this->_redirect(INDEX);
	}
    
    protected function _setVar() {
        $languages = $this->Snippet->Language->find(LIST_ITEM);
		$users = $this->Snippet->User->find(LIST_ITEM);
		$this->set(compact(LANG, USERS));
    }
}
