<?php /* Smarty version 2.6.13, created on 2016-09-13 20:26:01
         compiled from application/web//apps/member_profileedit.html */ ?>

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
											<h2 class="profile-head">EDIT MEMBER</h2>
											<div class="profile-body">
												<div class="profile-big-head padding-top">
													<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/profile/edit-profile-dummy.jpg">
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
										<form id="frmeditmember" class="contact-form padding-top frmeditmember" method="post" action="<?php echo $this->_tpl_vars['basedomain']; ?>
member/proseseditmember" enctype="application/x-www-form-urlencoded">
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="name_member" name="name_member" placeholder="Nama *" type="text" value="<?php echo $this->_tpl_vars['editmember']['name']; ?>
" required/>
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="username" name="username" placeholder="Email *" type="email" value="<?php echo $this->_tpl_vars['editmember']['username']; ?>
" required>
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="ktp_sim" name="ktp_sim" placeholder="No KTP *" type="number" value="<?php echo $this->_tpl_vars['editmember']['ktp_sim']; ?>
" required>
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="no_telp" name="no_telp" placeholder="No HP *" type="number" value="<?php echo $this->_tpl_vars['editmember']['no_tlp']; ?>
" required>
                                            <i class="fa fa-mobile-phone"></i>
                                        </div>

                                        <div class="form-group form-icon-group">
                                            <textarea rows="5" class="form-control" id="alamat" name="alamat" placeholder="Alamat" type="text" required><?php echo $this->_tpl_vars['editmember']['alamat']; ?>
</textarea>
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="fbanggota" name="fbanggota" placeholder="www.facebook.com/" type="text" value="<?php echo $this->_tpl_vars['editmember']['fb_id']; ?>
" required>
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="twitteranggota" name="twitteranggota" placeholder="www.twitter.com/" type="text" value="<?php echo $this->_tpl_vars['editmember']['twiiter_id']; ?>
" required>
                                            <i class="fa fa-twitter"></i>
                                        </div>

                                        <div class="form-group text-center">
										<input type="hidden" name="submit" value="1"></input>
                                            <input class="btn btn-primary btn-icon btn-icon-right submitevent" type="submit" value="simpan">
                                                <!--
												SIMPAN
                                                <div class="hex-alt">
                                                    <i class="fa fa-save"></i>
                                                </div>
												-->
                                            </input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div><!-- /.centered-red-box -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
		<?php echo '
		
			$(document).on(\'click\',\'.submitevent\',function(){
				
			$(\'#frmeditmember\').trigger(\'submit\');
			});
		'; ?>

</script>
               