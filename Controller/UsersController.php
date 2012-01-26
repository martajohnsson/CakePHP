<?php
require_once('constants.php');
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    
    public $name = 'Users';
	
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow(ADD);
	}
	
    //vi kollar vad user kan och inte kan
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
	
	public function login() {
	    if ($this->request->is(POST)) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());   
	        } else {
	            $this->_fail(USER_INCORRECT);
	        }
	    }
	}
	
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			$this->_fail(USER_DSNT_EXIST);
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is(POST)) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->_success(USER_ADDED);
				$this->_redirect(LOGIN);
                 //$this->redirect(array('action' => 'login'));
			} else {
				$this->_fail(USER_ADD_FAIL);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			$this->_fail(USER_DSNT_EXIST);
		}
		if ($this->request->is(POST) || $this->request->is(PUT)) {
			if ($this->User->save($this->request->data)) {
				$this->_success(USER_ADDED);
				$this->_redirect(INDEX);
			} else {
				$this->_fail(USER_ADD_FAIL);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			$this->_fail(USER_DSNT_EXIST);
		}
		if ($this->Auth->User(ID) == $id) {
            $this->_success(USER_DELETED);
            $this->User->delete();
            $this->logout();
            $this->_redirect(INDEX);
		}
        else if($this->Auth->user(ROLE) == ADMIN) {
            if ($this->User->delete()) {
                $this->_success(USER_DEL_BY_ADDMIN);
                $this->_redirect(INDEX);
            }
        }
        if (!$this->User->delete()) {
			$this->_fail(USER_DELETE_FAIL);
		}
	}
}
