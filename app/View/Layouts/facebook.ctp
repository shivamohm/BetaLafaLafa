<?php echo $this->Facebook->html(); ?>
<head>
	<?php echo $this->Html->charset(); ?>
	
	 <?php if(isset($description_for_layout)){ ?>
                 <meta name = "description" content="<?php echo $description_for_layout;?>" />
    <?php } ?>

    <?php if(isset($keywords_for_layout)){ ?>
                  <meta name = "keywords" content="<?php echo $keywords_for_layout;?>" />
    <?php } ?>


	<title>
		<?php #echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this -> Html -> css('cake.generic') . "\n";
		echo $this -> Html -> css('style') . "\n";
		echo $this -> Html -> css(array('admin_content')) . "\n";
		        
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		echo $this -> Html -> script('jquery.min') . "\n";
		echo $this -> Html -> script('jquery.validate.min') . "\n";
		
		
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
<?php echo $this->Facebook->init(); ?> 
</html>

