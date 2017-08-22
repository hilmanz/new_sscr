<?php /* Smarty version 2.6.13, created on 2016-09-13 19:49:46
         compiled from application/web//apps/chapter_profileedit.html */ ?>
<div id="content" role="main">
	<div class="centered-red-box">
		<section class="section swatch-white-black" style="padding-top:50px">
			<div class="container">
				<header class="section-header no-border">
					<figure>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png">
					</figure>
				</header>

				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-col">
							<h2 class="profile-head">EDIT CHAPTER</h2>
							<div class="profile-body">
								<div class="profile-big-head padding-top">
									<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/profile/edit-profile-00.png">
								</div>
								<p class="padding-top">Maksimal file 2 MB (.jpg, .jpeg, .png)</p>
								<form id="" class="contact-form padding-top">
									<div class="form-group text-center">
										<button class="btn btn-primary btn-icon btn-icon-right" type="submit">
											UNGGAH
											<div class="hex-alt">
												<i class="fa fa-upload"></i>
											</div>
										</button>
									</div>
								</form>
								<!-- <button class="btn_unggah" type="submit">UNGGAH</button> -->
							</div>
						</div>
						<form id="frmeditmember" class="contact-form padding-top frmeditchapter" method="post" action="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/proseseditchapter" enctype="application/x-www-form-urlencoded">
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="name_chapter" placeholder="Nama Chapter *" type="text" value="<?php echo $this->_tpl_vars['profile']['name_chapter']; ?>
" required/>
								<i class="fa fa-users"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="email" placeholder="Email Chapter *" type="email" value="<?php echo $this->_tpl_vars['profile']['email']; ?>
" required>
								<i class="fa fa-envelope"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="ktp_sim" placeholder="No KTP *" type="text" value="<?php echo $this->_tpl_vars['profile']['ktp_sim']; ?>
" required>
								<i class="fa fa-credit-card"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="facebook" placeholder="www.facebook.com/" type="text" value="<?php echo $this->_tpl_vars['profile']['facebook']; ?>
" required>
								<i class="fa fa-facebook"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="twitter" placeholder="www.twitter.com/" type="text" value="<?php echo $this->_tpl_vars['profile']['twitter']; ?>
" required>
								<i class="fa fa-twitter"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="password" placeholder="Password *" type="password" value="<?php echo $this->_tpl_vars['password']; ?>
" required>
								<i class="fa fa-lock"></i>
							</div>
							<div class="form-group form-icon-group">
								<input class="form-control" id="" name="repass" placeholder="Konfirmasi Password *" type="password" value="<?php echo $this->_tpl_vars['password']; ?>
" required>
								<i class="fa fa-lock"></i>
							</div>

							<div class="form-group text-center">
								<input type="hidden" name="submit" value="1"></input>
								<button class="btn btn-primary btn-icon btn-icon-right" type="submit">
									SIMPAN
									<div class="hex-alt">
										<i class="fa fa-save"></i>
									</div>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div><!-- /.centered-red-box -->
