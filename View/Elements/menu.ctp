<?php if ($current_user['role'] == 'admin'): ?>
    <?php echo $this->element('admin_menu'); ?> 
    <?php elseif($current_user['role'] == 'user'): ?>
    <?php echo $this->element('user_menu'); ?>
    <?php else: ?>
    <?php echo $this->element('watcher_menu'); ?>    
<?php endif; ?>
