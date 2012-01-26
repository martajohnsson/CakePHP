<div class="languages index">
	<h2><?php echo __('Languages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($languages as $language): ?>
	<tr>
		<td><?php echo h($language['Language']['id']); ?>&nbsp;</td>
		<td><?php echo h($language['Language']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $language['Language']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $language['Language']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $language['Language']['id']), null, __('Are you sure you want to delete # %s?', $language['Language']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pageing'); ?> 
</div>
<?php echo $this->element('menu'); ?> 
