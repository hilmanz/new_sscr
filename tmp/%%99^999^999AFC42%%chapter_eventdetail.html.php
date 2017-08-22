<?php /* Smarty version 2.6.13, created on 2016-09-13 19:52:37
         compiled from application/web/apps/chapter_eventdetail.html */ ?>
<div id="content" role="main">
	<div class="centered-red-box">
		<section class="section" style="padding-top:50px">
			<div class="container">
				<header class="section-header no-border">
					<figure>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png">
					</figure>
				</header>
				<header class="section-header">
					<h1 class="headline super hairline">DETAIL<br>EVENT</h1>
				</header>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="well">
							<div class="grid-post swatch-black-white">
								<article class="post post-showinfo">
									<div class="post-media">
										<a class="feature-image magnific hover-animate" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_02.jpg" title="Thats a nice image">
											<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/c6f6d06ded7e7c3a98679f39398e604947.jpg">
											<i class="fa fa-search-plus"></i>
										</a>
									</div>
									<div class="post-head text-center">
										<h3 class="post-title">
											<a href="#">
												<?php echo $this->_tpl_vars['dataevent']['time_start']; ?>
 - <?php echo $this->_tpl_vars['dataevent']['time_end']; ?>

											</a>
										</h3>
										<small class="post-author text-normal">
											Waktu <?php echo $this->_tpl_vars['dataevent']['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataevent']['jam_akhir']; ?>

										</small>
										<small class="post-date">
											<a href="#"><?php echo $this->_tpl_vars['dataevent']['time_start']; ?>
</a>
										</small>
										<div class="post-icon flat-shadow flat-hex">
											<div class="hex hex-big">
												<i class="fa fa-camera"></i>
											</div>
										</div>
									</div>
									<div class="post-body">
										<h3 class="text-center color-red">
											<?php echo $this->_tpl_vars['dataevent']['name']; ?>
<br><?php echo $this->_tpl_vars['dataevent']['name_type']; ?>

										</h3>
										<p class="text-center">
											<center><?php echo $this->_tpl_vars['dataevent']['alamat']; ?>
</center>
										</p>
									</div>
									<div class="post-extras">
										<div class="text-center">
											<span class="post-tags">
											<i class="fa fa-tags"></i>

												<a href="#">
												  <?php echo $this->_tpl_vars['dataevent']['name_type']; ?>

												</a>

											</span>
										</div>
									</div>
								</article>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div><!-- /.centered-red-box -->