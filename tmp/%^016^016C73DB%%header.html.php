<?php /* Smarty version 2.6.13, created on 2016-09-16 10:59:08
         compiled from application/web//header.html */ ?>
<?php if ($this->_tpl_vars['pages'] == 'chapter'): ?>
<div class="slideout-menu">
	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/about">About</a></li>		
	</ul>
</div>
        <!--/.slideout-menu--> 		
<?php endif; ?>

<?php if ($this->_tpl_vars['pages'] == 'member'): ?>
<div class="slideout-menu">
        	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
        	<ul>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/about">About</a></li>        		
        	</ul>
        </div>
<!--/.slideout-menu-->

<?php endif; ?>

<?php if ($this->_tpl_vars['pages'] == 'campus'): ?>
<div class="slideout-menu">
        	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
        	<ul>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/about">About</a></li>
        		<li><a href="#">Trivia Quiz</a></li>
        		<li><a href="#">Mini Games </a></li>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/leaderboard">Leaderboard</a></li>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/berita">Berita &amp; Pengumuman</a></li>
                <li><a href="#">Hadiah</a></li>
                <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
campus/profile">Profile</a></li>
        	</ul>
        </div>
        <!--/.slideout-menu-->
<?php endif; ?>