<?php /* Smarty version 2.6.13, created on 2016-09-13 16:03:37
         compiled from application/web/apps/member_profileedit.html */ ?>

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
                                    <form id="" class="contact-form padding-top">
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="Nama *" type="text" value="<?php echo $this->_tpl_vars['editmember']['name']; ?>
" required/>
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="Email *" type="email" required>
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="No KTP *" type="email" required>
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="No HP *" type="number" required>
                                            <i class="fa fa-mobile-phone"></i>
                                        </div>

                                        <div class="form-group form-icon-group">
                                            <textarea rows="5" class="form-control" id="" name="" placeholder="Alamat" type="text" required></textarea>
                                            <i class="fa fa-map-marker"></i>
                                        </div>

                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="www.facebook.com/" type="email" required>
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="" name="" placeholder="www.twitter.com/" type="email" required>
                                            <i class="fa fa-twitter"></i>
                                        </div>

                                        <div class="form-group text-center">
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

               