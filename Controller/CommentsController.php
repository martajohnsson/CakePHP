<?php
App::uses('AppController', 'Controller');
require_once('constants.php');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {
    
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
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
            $this->_fail(INVALID_COMMENT);
            $this->redirect(INDEX);
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is(POST)) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->_success(COMMENT_ADDED);
                $this->redirect(array('controller' =>'snippets',VIEW));
			} else {
				$this->_fail(COMMENT_ADD_FAIL);
			}
		}
		$snippets = $this->Comment->Snippet->find(LIST_ITEM);
		$this->set(compact('snippets'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			$this->_fail(INVALID_COMMENT);
            $this->redirect(INDEX);
		}
		if ($this->request->is(POST) || $this->request->is(PUT)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__(COMMENT_ADDED));
				$this->redirect(array('controller' =>'snippets',VIEW));
			} else {
				$this->_fail(COMMENT_ADD_FAIL);
			}
		} else {
			$this->request->data = $this->Comment->read(null, $id);
		}
		$snippets = $this->Comment->Snippet->find(LIST_ITEM);
		$this->set(compact('snippets'));
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
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			 $this->_fail(INVALID_COMMENT);
             $this->_redirect(INDEX);
		}
		if ($this->Comment->delete()) {
			$this->_success(COMMENT_DELETED);
			$this->_redirect(INDEX);
		}
		$this->_fail(COMMENT_DELETE_FAIL);
		$this->_redirect(INDEX);
	}
}
