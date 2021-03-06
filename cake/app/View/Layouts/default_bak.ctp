<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('mylayout');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery',array('inline' => false));
		echo $this->Html->script('my.js',array('inline' => false));
		echo $this->fetch('script');
	//	echo $scripts_for_layout;
		
	?>
<!-- Put this script tag to the <head> of your page -->


<!-- <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script> 
<script type="text/javascript"> 
 VK.init(
  {apiId: 3124572, onlyWidgets: true}
  );
</script> 
 -->
<!-- Put this div tag to the place, where Auth block will be -->

<!-- <script type="text/javascript">
VK.Widgets.Auth("vk_auth", {width: "200px", authUrl: '/cake/Users/login'});
VK.Observer.subscribe('auth.logout', function(response){
    alert("Logged Out!");
});
</script>
 -->
</head>
<body>
	<div id="container">
		<div id="header">
			
		</div>
		<div id="content">

			<?php echo $this->Session->flash();  ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php // echo $this->element('sql_dump'); 
	?>
</body>
</html>
