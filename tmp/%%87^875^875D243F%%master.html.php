<?php /* Smarty version 2.6.13, created on 2016-11-18 16:23:04
         compiled from application/web//master.html */ ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="ie6"> <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="ie7"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US"> <!--<![endif]-->

<head>
<?php echo $this->_tpl_vars['meta']; ?>

</head>
<?php if ($this->_tpl_vars['pages'] == 'chapter' || $this->_tpl_vars['pages'] == 'login'): ?>
 <!-- master chapter -->
	<?php if ($this->_tpl_vars['act'] == 'about' || $this->_tpl_vars['act'] == 'login' || $this->_tpl_vars['act'] == 'home' || $this->_tpl_vars['act'] == 'syarat' || $this->_tpl_vars['act'] == 'carabermain' || $this->_tpl_vars['act'] == 'forgot_password'): ?>
		<body class="chapter-league-home">	
	<?php else: ?>  
		<body class="chapter-league-inner"> 	
	<?php endif;  elseif ($this->_tpl_vars['pages'] == 'member'): ?>
<!-- master member -->
	<?php if ($this->_tpl_vars['act'] == 'about' || $this->_tpl_vars['act'] == 'login' || $this->_tpl_vars['act'] == 'home' || $this->_tpl_vars['act'] == 'syarat'): ?>
		<body class="chapter-league-home">
	<?php elseif ($this->_tpl_vars['act'] == 'carabermain'): ?>
		<body class="member-league-inner">
	<?php else: ?>  
		<body class="chapter-league-inner"> 	
	<?php endif;  elseif ($this->_tpl_vars['pages'] == 'campus'): ?>
<!-- master campus -->
	<?php if ($this->_tpl_vars['act'] == 'about'): ?>
		<body class="chapter-league-home">	
	<?php else: ?>
	<body class="campus-league-home">	
	<?php endif;  elseif ($this->_tpl_vars['pages'] == 'puzzle'): ?>	
	<body onload="init();">
<?php else: ?>
	<body class="landing">
<?php endif; ?>
		<?php echo $this->_tpl_vars['header']; ?>
			
		<?php echo $this->_tpl_vars['mainContent']; ?>
   	
		<?php echo $this->_tpl_vars['footer']; ?>
	
 <a class="go-top hex-alt" href="javascript:void(0)">
            <i class="fa fa-angle-up"></i>
        </a>

        <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/packages.min.js"></script>
        <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/theme.js"></script>	

    </body>
</html>