<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
        echo $this->Form->input('password_confirmation', array('type'=>'password'));
    ?>
        <?php if ($current_user['role'] == 'admin'): ?>
		  <?php echo $this->Form->input('role', array('default' => 'admin or user')); ?>
		<?php endif; ?>
		
	
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<?php echo $this->element('menu'); ?> 