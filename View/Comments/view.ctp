<div class="comments view">
<h2><?php  echo __('Comment');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($comment['Comment']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Snippet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comment['Snippet']['title'], array('controller' => 'snippets', 'action' => 'view', $comment['Snippet']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
    <br />
    	<p><?php echo $this->Html->link(__('Edit Comment'), array('action' => 'edit', $comment['Comment']['id'])); ?> </p>
		<p><?php echo $this->Form->postLink(__('Delete Comment'), array('action' => 'delete', $comment['Comment']['id']), null, __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?> </p>
</div>
<?php echo $this->element('menu'); ?> 

	