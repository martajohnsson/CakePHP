<div class="actions">
	<h3><?php echo __('Watcher Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'snippets', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Register as a user'), array('controller' => 'users', 'action' => 'add')); ?></li>
	</ul>
</div>