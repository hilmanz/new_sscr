<?php /* Smarty version 2.6.13, created on 2016-09-16 18:44:53
         compiled from application/web//apps/chapter_profile.html */ ?>

            <div id="content" role="main">
                <div class="centered-red-box">
                    <section class="section swatch-white-black" style="padding-top:50px">
                        <div class="container">
                            <header class="section-header no-border">
                                <figure>
                                    <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/home"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png"></a>
                                </figure>
                            </header>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-left-col">
                                        <div class="kota">KOTA</div>
                                        <div class="nama-kota"><?php echo $this->_tpl_vars['userdata']['citinya']; ?>
</div>
                                        <div class="head-chapter"><?php echo $this->_tpl_vars['userdata']['name_chapter']; ?>
</div>
                                        <div class="nama-chapter"><?php echo $this->_tpl_vars['userdata']['name']; ?>
</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-col">
                                        <h2 class="profile-head"><?php echo $this->_tpl_vars['userdata']['name']; ?>
</h2>
                                        <div class="profile-body">
											<?php if ($this->_tpl_vars['memberprofile']['img_avatar']): ?>
													<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['userdata']['img_avatar']; ?>
">
												<?php else: ?>
													<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/c6f6d06ded7e7c3a98679f39398e604947.jpg">
												<?php endif; ?>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile-right-col">
                                        <div class="profile-point">POIN</div>
                                        <div class="profile-point-point"><?php echo $this->_tpl_vars['userdata']['point']; ?>
</div>
                                        <p>Social Media</p>


                                        <div class="member-socmed">
                                            <i class="fa fa-facebook-square"></i>
                                            <p><?php echo $this->_tpl_vars['userdata']['facebook']; ?>
</p>
                                        </div>
                                        <div class="member-socmed">
                                            <i class="fa fa-twitter-square"></i>
                                            <p><?php echo $this->_tpl_vars['userdata']['twitter']; ?>
</p>
                                        </div>
                                        <div class="member-socmed">
                                            <i class="fa fa-edit" style="color:#ffffff !important;"></i>
                                            <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/editchapter/<?php echo $this->_tpl_vars['userdata']['id']; ?>
/<?php echo $this->_tpl_vars['userdata']['name_chapter']; ?>
" style="color:#fff !important">Edit Profile</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <section class="section profile-member-row">
                                <div class="container">
                                    <header class="section-header padding-top">
                                        <h1 class="headline super hairline">MEMBER</h1>
                                    </header>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="box-rect box-medium">
                                                        <div class="box-dummy"></div>
                                                        <span class="box-inner">
                                                            <img alt="" class="img-circle" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-profile-lihat-member.png">
                                                        </span>
                                                    </div>
                                                    <h4 class="text-center margin-bottom">
                                                        <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/memberlist">LIHAT MEMBER</a>
                                                    </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-rect box-medium">
                                                        <div class="box-dummy"></div>
                                                        <span class="box-inner">
                                                            <img alt="" class="img-circle" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-profile-add-member.png">
                                                        </span>
                                                    </div>
                                                    <h4 class="text-center margin-bottom">
                                                        <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/membertambah">TAMBAH MEMBER</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <header class="section-header" style="margin-top:50px">
                                        <h1 class="headline super hairline">EVENT</h1>
                                    </header>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="box-rect box-medium">
                                                        <div class="box-dummy"></div>
                                                        <span class="box-inner">
                                                            <img alt="" class="img-circle" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-profile-lihat-event.png">
                                                        </span>
                                                    </div>
                                                    <h4 class="text-center margin-bottom">
                                                        <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/event">LIHAT EVENT</a>
                                                    </h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="box-rect box-medium">
                                                        <div class="box-dummy"></div>
                                                        <span class="box-inner">
                                                            <img alt="" class="img-circle" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-profile-add-event.png">
                                                        </span>
                                                    </div>
                                                    <h4 class="text-center margin-bottom">
                                                        <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/eventtambah">TAMBAH EVENT</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div><!-- /.centered-red-box -->