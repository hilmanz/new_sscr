<?php /* Smarty version 2.6.13, created on 2016-09-13 20:46:55
         compiled from application/web//widgets/headerMember.html */ ?>
<div class="slideout-menu">
        	<h3><a href="#" class="slideout-menu-toggle">&times;</a></h3>
        	<ul>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/about">About</a></li>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/event">Event</a></li>
        		<li><a href="#">Trivia Quiz</a></li>
        		<li><a href="#">Mini Games</a></li>
                <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/leaderboard">Leaderboard</a></li>
        		<li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/berita">Berita &amp; Pengumuman</a></li>
                <li><a href="#">Hadiah</a></li>
                <li><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/profile">Profile</a></li>
        	</ul>
        </div>
<!--/.slideout-menu-->
        <header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
            <div class="container">
                <div class="menu-visible text-right">
					<?php if ($this->_tpl_vars['userdata']['img_avatar']): ?>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['userdata']['img_avatar']; ?>
" width="35px">
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/c6f6d06ded7e7c3a98679f39398e604947.jpg" width="35px">
					<?php endif; ?>
                    <div class="member-name-top"><a href="member_profileedit.html"><?php echo $this->_tpl_vars['userdata']['name']; ?>
</a></div>
                    <div class="member-point-top"><?php echo $this->_tpl_vars['userdata']['point']; ?>
</div> 
					<div>|</div>
                    <div class="member-point-top"><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
logout.php">LOG OUT</a></div> 
                    <a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
                <div class="text-right"></div>
            </div>
        </header>