<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 */
class AppController extends Controller {
    
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'snippets', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'snippets', 'action'=>'index'),
            'authError'=>"You can't access that page",
            'authorize'=>array('Controller')
        )
    );
    
    public function isAuthorized($user) {
        return true;
    }
    
    public function beforeFilter() { 
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
    
    function searchConditions($params = null)
	{
	  $conditions = array();
	  if (isset($params['named']['q'])) 
	  {
	    $conditions['MATCH(Snippet.title, Snippet.body, Snippet.description) AGAINST(? IN BOOLEAN MODE)'] = $params['named']['q'];
	  }
	  return $conditions;
	}
    
    function _success($message)
	{
	   $this->Session->setFlash(__($message, null),'default', array('class' => 'flash-message-success'));
	}
    
    function _fail($message)
	{
	   $this->Session->setFlash(__($message, null),'default', array('class' => 'flash-message-failure'));
	}
    
    function _redirect($action, $data) {
        $this->redirect(array('action' => $action, $data));
    }
}
