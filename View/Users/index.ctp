<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
        <th><?php echo $this->Paginator->sort('username');?></th>
        <th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user): ?>
	<tr>
        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
        <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
        <?php endif; ?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
            
            <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
    			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
    			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
            <?php endif; ?>
            
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pageing'); ?> 
</div>
<?php echo $this->element('menu'); ?> 
