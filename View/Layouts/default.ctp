<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Projekt'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
        echo $this->Html->css('shCore');
        echo $this->Html->css('shThemeDefault');
        
		echo $scripts_for_layout;
        // include jquery and my javascript file
        echo $this->Html->script('jquery');
        echo $this->Html->script('sleetmute');
        echo $this->Html->script('shCore');
        echo $this->Html->script('shBrushPhp');
        echo $this->Html->script('shBrushJScript');
        echo $this->Html->script('shBrushXml');
	?>
    <script type="text/javascript">
        SyntaxHighlighter.defaults['smart-tabs'] = true;
        SyntaxHighlighter.all();
    </script>

    
</head>
<body>
	<div id="container">
		<div id="header">
			<?php //echo $this->Html->link(__('CakePHP: Projekt av Marta Johnsson'), 'http://exempel.com'); ?>
            
            <?php echo $this->Html->image('header.jpg', array('alt'=> __('CakePHP: Projekt av Marta Johnsson'), 'border' => '0'));?>
            
		</div>
		<div id="content">
        	<div style="text-align: right;">
		        <?php if ($logged_in): ?>
                    <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
                    <br />Welcome
                    <?php echo $this->Html->link($current_user['username'], array('controller'=>'users', 'action'=>'view', $current_user['id'])); ?>
		        <?php else: ?>
		            <?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>
		        <?php endif; ?>
		    </div>

			<?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo 'Marta Johnsson'?>
		</div>
	</div>
</body>
</html>