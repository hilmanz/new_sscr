<?php /* Smarty version 2.6.13, created on 2016-11-18 16:23:04
         compiled from application/web//header.html */ ?>
<?php if ($this->_tpl_vars['pages'] == 'login' || $this->_tpl_vars['pages'] == 'puzzle'): ?>
	<?php if ($this->_tpl_vars['act'] == 'community'): ?>
		<div class="slideout-menu">
			<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
			<ul>
				<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/about">About</a></li>	
				<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/leaderboard">Leaderboard</a></li>
				<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/berita">Berita &amp; Pengumuman</a></li>		
			</ul>
		</div>

		<!--/.slideout-menu-->   
		<header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
			<div class="container">
				<div class="menu-visible text-right">			
					<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
				</div>
			</div>
		</header>
	<?php else: ?>
		<div class="slideout-menu">
        	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
        	<ul>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/about">About</a></li>        		
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/leaderboard">Leaderboard</a></li>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/berita">Berita &amp; Pengumuman</a></li>               
        	</ul>
        </div>
        <!--/.slideout-menu-->
		<header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
			<div class="container">
				<div class="menu-visible text-right">			
					<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
				</div>
			</div>
		</header>
	<?php endif;  endif; ?>

<?php if ($this->_tpl_vars['pages'] == 'chapter'): ?>
<!-- header chapter -->
<div class="slideout-menu">
	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/about">About</a></li>	
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/leaderboard">Leaderboard</a></li>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/berita">Berita &amp; Pengumuman</a></li>			
        <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
login/community">Login</a></li>
	</ul>
</div>
        <!--/.slideout-menu--> 
        <!--/.slideout-menu-->   
<header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
	<div class="container">
		<div class="menu-visible text-right">			
			<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</header>		
<?php endif; ?>


<?php if ($this->_tpl_vars['pages'] == 'campus'): ?>
<!-- master campus -->
<div class="slideout-menu">
	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/about">About</a></li>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/leaderboard">Leaderboard</a></li>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/berita">Berita &amp; Pengumuman</a></li>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
login/campus">Login</a></li>
	</ul>
</div>

<!--/.slideout-menu-->
<header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
	<div class="container">
		<div class="menu-visible text-right">			
			<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</header>	
<?php endif; ?>