<div class="actions">
	<h3><?php echo __('Admin Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Register new user'), array('controller' => 'users', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List All Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        
		<li><?php echo $this->Html->link(__('List All Snippets'), array('controller' => 'snippets', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Snippet'), array('controller' => 'snippets', 'action' => 'add')); ?></li>
        
		<li><?php echo $this->Html->link(__('List All Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>

		<li><?php echo $this->Html->link(__('List All Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
	</ul>
</div>