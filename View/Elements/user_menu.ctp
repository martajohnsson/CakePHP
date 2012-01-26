<div class="actions">
	<h3><?php echo __('User Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Snippets'), array('controller' => 'snippets', 'action' => 'index'));?></li>
        <li><?php echo $this->Html->link(__('Add Snippet'), array('controller' => 'snippets', 'action' => 'add'));?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>