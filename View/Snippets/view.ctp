<div class="snippets view">
<h2><?php  echo __('Snippet');?></h2>
	<dl>
		<dt><?php echo __('Title'); ?></dt>
		<dd><?php echo h($snippet['Snippet']['title']); ?>&nbsp;</dd>
        
        <dt><?php echo __('Description'); ?></dt>
		<dd><?php echo h($snippet['Snippet']['description']); ?>&nbsp;</dd>
        
		<dt><?php echo __('Code'); ?></dt>
        <br />
        <p>
            <code><pre class= 'brush: php'><?php echo h($snippet['Snippet']['body']); ?></pre></code>
			&nbsp;
		</p>
        
		<dt><?php echo __('Added'); ?></dt>
		<dd><?php echo h($snippet['Snippet']['created']); ?>&nbsp;</dd>
        
		<dt><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($snippet['Snippet']['modified']); ?>&nbsp;</dd>
        

		<dt><?php echo __('Language'); ?></dt>
		<dd><?php echo $this->Html->link($snippet['Language']['name'], array('controller' => 'languages', 'action' => 'view', $snippet['Language']['id'])); ?>&nbsp;</dd>
        
		<dt><?php echo __('Added by'); ?></dt>
		<?php if ($logged_in == true): ?>
        <dd><?php echo $this->Html->link($snippet['User']['username'], array('controller' => 'users', 'action' => 'view', $snippet['User']['id'])); ?></dd>
        <?php else: ?>
        <dd><?php echo h($snippet['User']['username']); ?></dd>
        <?php endif; ?>
        
	</dl>
    <br /><br />
    <?php if ($current_user['id'] == $snippet['Snippet']['user_id'] || $current_user['role'] == 'admin'): ?>
    <?php echo $this->Html->link(__('Edit snippet'), array('controller' => 'snippets', 'action' => 'edit', $snippet['Snippet']['id'])); ?>
    <?php endif; ?>
    
    <br /><br /><br />
    
    <div class="related">
    	<h3><?php echo __('Comments');?></h3>
    	<?php if (!empty($snippet['Comment'])):?>
    	<table cellpadding = "0" cellspacing = "0">
    	<tr>
    		<th><?php echo __('Name'); ?></th>
    		<th><?php echo __('Content'); ?></th>
            <?php if ($current_user['role'] == 'admin'): ?>
    		<th class="actions"><?php echo __('Actions');?></th>
            <?php endif; ?>
    	</tr>
    	<?php
    		$i = 0;
    		foreach ($snippet['Comment'] as $comment): ?>
    		<tr>
    			<td><?php echo $comment['name'];?></td>
    			<td><?php echo $comment['content'];?></td>
    			<td class="actions">
                    <?php if ($current_user['role'] == 'admin'): ?>
                        <?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
    				    <?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
    				    <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), null, __('Are you sure you want to delete # %s?', $comment['id'])); ?>
                    <?php endif; ?>
                </td>
    		</tr>
    	<?php endforeach; ?>
    	</table>
        <?php endif; ?>
    </div>
    
</div>

<?php echo $this->element('menu'); ?> 


<?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'user'): ?>
    <div class="comments form">
        <?php echo $this->Form->create(null, array('url' => array('controller' => 'comments', 'action' => 'add')));?>
    	<fieldset>
    		<legend><?php echo __('Add Comment'); ?></legend>
    	<?php
    		echo $this->Form->input('Comment.name');
    		echo $this->Form->input('Comment.content');
            echo $this->Form->input('Comment.snippet_id', array('type'=>'hidden','value'=>$snippet['Snippet']['id']));
    	?>
    	</fieldset>
        <?php echo $this->Form->end(__('Submit'));?>
    </div>
<?php endif; ?>


