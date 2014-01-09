<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'LafaLafa');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this -> Html -> css('cake.generic') . "\n";
		echo $this -> Html -> css('style') . "\n";
		
		#echo $this -> Html -> css('content') . "\n";
		       
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this -> Html -> script('jquery.min') . "\n";
		
	?>
</head>
<body>
	
	<div id="container">
		<div id="header">
			<h1><?php #echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
			<?php echo $this -> Html -> link($this -> Html -> image('brix-logo.gif', array('alt' => 'Brix','height'=> '59px','width'=>'179px','border' => '0')), '/pages/', array('escape' => false, 'id'=>'logo'));?>
			<section class="user-login-wrp">
					<?php #echo $this->UserAuth->getUserId(); ?>
			</section>
		</div>
				
		<div class="actions">
			<h3>Related actions</h3>
			<ul>
			<?php echo $this->fetch('sidebar'); ?>
			</ul>
		</div>
		<div id="content">
		
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php /* echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);*/?>
				&copy; 2014 <strong>LafaLafa.com</strong>
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
