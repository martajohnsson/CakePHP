<?php echo $this->Form->create(null, array('type' => 'get', 'action' => 'index')); ?>

 <?php 
     $q = isset($this->params['named']['q']) ? $this->params['named']['q'] : null;
     echo $this->Form->input('q', array('label' => '', 'value' => $q, 'length' => 20));
 ?>

<?php echo $this->Form->end('Search Snippet'); ?>