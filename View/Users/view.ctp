<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member since'); ?></dt>
		<dd>
            <?php $startTime = substr(h($user['User']['created']), 0, strlen(h($user['User']['created']))-9);?>
            <?php echo $startTime; ?>
			&nbsp;
		</dd>
	</dl>
    
    <?php if ($current_user['id'] == $user['User']['id'] || $current_user['role'] == 'admin'): ?>
	<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
    <?php endif; ?>
    <br /><br /><br />
    
    <div class="related">
    	<h3><?php echo __('Users Snippets');?></h3>
    	<?php if (!empty($user['Snippet'])):?>
    	<table cellpadding = "0" cellspacing = "0">
    	<tr>
    		<th><?php echo __('Title'); ?></th>
    		<th><?php echo __('Description'); ?></th>
    		<th class="actions"><?php echo __('Actions');?></th>
    	</tr>
    	<?php
    		$i = 0;
    		foreach ($user['Snippet'] as $snippet): ?>
    		<tr>
    			<td><?php echo $snippet['title'];?></td>
    			<td><?php echo $snippet['description'];?></td>
    			<td class="actions">
    				<?php echo $this->Html->link(__('View'), array('controller' => 'snippets', 'action' => 'view', $snippet['id'])); ?>
                    <?php if ($current_user['id'] == $snippet['user_id'] || $current_user['role'] == 'admin'): ?>
    				    <?php echo $this->Html->link(__('Edit'), array('controller' => 'snippets', 'action' => 'edit', $snippet['id'])); ?>
			        <?php endif; ?>
                </td>
    		</tr>
    	<?php endforeach; ?>
    	</table>
    <?php endif; ?>
    </div>
    
</div>
<?php echo $this->element('menu'); ?> 
