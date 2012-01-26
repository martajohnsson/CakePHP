<?php
require_once('constants.php');
App::uses('AppController', 'Controller');
/**
 * Languages Controller
 *
 * @property Language $Language
 */
class LanguagesController extends AppController {


    public function beforeFilter() {
	    parent::beforeFilter();
        $this->Auth->allow(VIEW);
	}
	
	public function isAuthorized($user) {
	    if ($user[ROLE] == ADMIN) {
	        return true;
	    }
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Language->recursive = 0;
		$this->set('languages', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			$this->_fail(LANG_DSNT_EXIST);
		}
		$this->set('language', $this->Language->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is(POST)) {
			$this->Language->create();
			if ($this->Language->save($this->request->data)) {
				$this->_success(LANG_ADDED);
				$this->_redirect(INDEX);
			} else {
				$this->_fail(LANG_ADD_FAIL);
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			$this->_fail(LANG_DSNT_EXIST);
		}
		if ($this->request->is(POST) || $this->request->is(PUT)) {
			if ($this->Language->save($this->request->data)) {
				$this->_success(LANG_ADDED);
				$this->_redirect(INDEX);
			} else {
				$this->_fail(LANG_ADD_FAIL);
			}
		} else {
			$this->request->data = $this->Language->read(null, $id);
		}
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
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			$this->_fail(LANG_DSNT_EXIST);
		}
		if ($this->Language->delete()) {
			$this->_success(LANG_DELETED);
			$this->_redirect(INDEX);
		}
		$this->_fail(LANG_DELETE_FAIL);
		$this->_redirect(INDEX);
	}
}
