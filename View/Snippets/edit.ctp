<div class="snippets form">
<?php echo $this->Form->create('Snippet');?>
	<fieldset>
		<legend><?php echo __('Edit Snippet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('description');
		echo $this->Form->input('language_id');
		echo $this->Form->input('user_id', array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?> 
