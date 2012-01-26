
<div class="snippets index">
    <?php echo $this->element('form_search'); ?>
    <br /><br /><br />

	<h2><?php echo __('Snippets');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('language_id');?></th>
            <th><?php echo $this->Paginator->sort('author');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($snippets as $snippet): ?>
	<tr>
		<td><?php echo h($snippet['Snippet']['title']); ?>&nbsp;</td>
		<td><?php echo h($snippet['Snippet']['description']); ?>&nbsp;</td>
        <td><?php echo $this->Html->link($snippet['Language']['name'], array('controller' => 'languages', 'action' => 'view', $snippet['Language']['id'])); ?></td>
        <?php if ($logged_in == true): ?>
            <td><?php echo $this->Html->link($snippet['User']['username'], array('controller' => 'users', 'action' => 'view', $snippet['User']['id'])); ?></td>
            <?php else: ?>
            <td><?php echo h($snippet['User']['username']); ?></td>
        <?php endif; ?>
        
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $snippet['Snippet']['id'])); ?>
            
            <?php if ($current_user['id'] == $snippet['Snippet']['user_id'] || $current_user['role'] == 'admin'): ?>
    			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $snippet['Snippet']['id'])); ?>
    			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $snippet['Snippet']['id']), null, __('Are you sure you want to delete # %s?', $snippet['Snippet']['id'])); ?>
		    <?php endif; ?>
            
        </td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pageing'); ?> 
</div>
<?php echo $this->element('menu'); ?> 



