<div class="languages view">
<h2><?php  echo __('Language');?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($language['Language']['name']); ?>
			&nbsp;
		</dd>
	</dl>
    <br /><br />
    <div class="related">
    	<h3><?php echo __('Related Snippets');?></h3>
    	<?php if (!empty($language['Snippet'])):?>
    	<table cellpadding = "0" cellspacing = "0">
    	<tr>
    		<th><?php echo __('Title'); ?></th>
    		<th><?php echo __('Description'); ?></th>
    		<th class="actions"><?php echo __('Actions');?></th>
    	</tr>
    	<?php
    		$i = 0;
    		foreach ($language['Snippet'] as $snippet): ?>
    		<tr>
    			<td><?php echo $snippet['title'];?></td>
    			<td><?php echo $snippet['description'];?></td>
    			<td class="actions">
    				<?php echo $this->Html->link(__('View'), array('controller' => 'snippets', 'action' => 'view', $snippet['id'])); ?>
                    
                    <?php if ($current_user['id'] == $snippet['user_id'] || $current_user['role'] == 'admin'): ?>
    				    <?php echo $this->Html->link(__('Edit'), array('controller' => 'snippets', 'action' => 'edit', $snippet['id'])); ?>
    				    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'snippets', 'action' => 'delete', $snippet['id']), null, __('Are you sure you want to delete # %s?', $snippet['id'])); ?>
    			    <?php endif; ?>
                    
                </td>
    		</tr>
    	<?php endforeach; ?>
    	</table>
    <?php endif; ?>
    </div>
</div>
<?php echo $this->element('menu'); ?> 



