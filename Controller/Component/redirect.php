<?php

class RedirectComponent extends Object {
  
  var $controller = null;
  var $components = array('Session');
  var $settings = array();

    function startup()
  {

  }
    function beforeRender()
  {

  }
    function shutdown()
  {
    
  }

  function initialize(&$controller)
  {
    $this->controller = $controller;
    $this->settings = array_merge(array('success' => 'success', 'warning' => 'warning'));
  }
  function urlToNamed()
  {
    $urlArray = $this->controller->params['url'];
    unset($urlArray['url']);
    if (!empty($urlArray)) 
    {
      $this->controller->redirect($urlArray, null, true);
    }
  } 
}