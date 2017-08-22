<?php /* Smarty version 2.6.13, created on 2016-09-09 13:20:47
         compiled from application/web/apps/chapter_memberlist.html */ ?>
<header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
	<div class="container">
		<div class="menu-visible text-right">
			<?php if ($this->_tpl_vars['userdata']['img_avatar']): ?>
				<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['userdata']['img_avatar']; ?>
" width="30px">
			<?php else: ?>
				<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-user-top.png">
			<?php endif; ?>
			<div class="member-name-top"><a href="chapter_profile.html"><?php echo $this->_tpl_vars['userdata']['name']; ?>
</a></div>
			<div class="member-point-top"><?php echo $this->_tpl_vars['userdata']['point']; ?>
</div>
			<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</header>
            <div id="content" role="main">
                <div class="centered-red-box">
                    <section class="section" style="padding-top:50px">
                        <div class="container">
                            <header class="section-header no-border">
                                <figure>
                                    <a href="chapter_home.html"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png"></a>
                                </figure>
                            </header>
                            <header class="section-header">
                                <h1 class="headline super hairline">MEMBER</h1>
                            </header>
                            <form id="" class="">
                                <div class="row">
                                    <!-- KIRI -->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 ><span class="color-red">NAMA</span> | POINT</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <h4><a href="chapter_membertambah.html"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-add-member-white.png"></a> <a href="chapter_membertambah.html">TAMBAH MEMBER</a></h4>
                                            </div>
                                        </div>
                                    </div><!-- col-md-4 KIRI-->

                                    <!-- TENGAH -->
                                    <div class="col-md-4">
                                        &nbsp;
                                    </div><!-- col-md-4 TENGAH-->

                                    <!-- KANAN-->
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" id="cari-nama-member" name="cari-nama-member" placeholder="Cari Nama/Email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input class="form-control" id="pilih-status" name="pilih-status" placeholder="Pilih Status" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </div>
                                    </div><!-- col-md-4 KANAN -->
                                </div>
                            </form>

                            <div class="well row">
                                <div class="col-md-8">
                                    <p>ID Member: <span class="color-red">Test Chapter-1911</span></p>
                                    <p>Status: <span class="color-red">Inactive</span></p>
                                    <p>Point: <span class="color-red">40</span></p>
                                    <p class="color-red">fauzi.rahman@kana.co.id</p>
                                    <div class="member-socmed">
                                        <i class="fa fa-facebook-square"></i>
                                        <p>fauzirahman45</p>
                                    </div>
                                    <div class="member-socmed">
                                        <i class="fa fa-twitter-square"></i>
                                        <p>fauzirahman45</p>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                    <div class="member-v-block">
                                        <div class="member-v-centered">
                                            <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-detail.png"></h2>
                                            <p class="small">DETAIL</p>
                                        </div>
                                    </div>
                                    <div class="member-v-block">
                                        <div class="member-v-centered">
                                            <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-hapus.png"></h2>
                                            <p class="small">HAPUS MEMBER</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well row">
                                        <div class="col-md-8">
                                            <p>ID Member: <span class="color-red">Test Chapter-1911</span></p>
                                            <p>Status: <span class="color-red">Inactive</span></p>
                                            <p>Point: <span class="color-red">40</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-detail.png"></h2>
                                                    <p class="small">DETAIL</p>
                                                </div>
                                            </div>
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-hapus.png"></h2>
                                                    <p class="small">HAPUS MEMBER</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well row">
                                        <div class="col-md-8">
                                            <p>ID Member: <span class="color-red">Test Chapter-1911</span></p>
                                            <p>Status: <span class="color-red">Inactive</span></p>
                                            <p>Point: <span class="color-red">40</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-detail.png"></h2>
                                                    <p class="small">DETAIL</p>
                                                </div>
                                            </div>
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-hapus.png"></h2>
                                                    <p class="small">HAPUS MEMBER</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well row">
                                        <div class="col-md-8">
                                            <p>ID Member: <span class="color-red">Test Chapter-1911</span></p>
                                            <p>Status: <span class="color-red">Inactive</span></p>
                                            <p>Point: <span class="color-red">40</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-detail.png"></h2>
                                                    <p class="small">DETAIL</p>
                                                </div>
                                            </div>
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-hapus.png"></h2>
                                                    <p class="small">HAPUS MEMBER</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well row">
                                        <div class="col-md-8">
                                            <p>ID Member: <span class="color-red">Test Chapter-1911</span></p>
                                            <p>Status: <span class="color-red">Inactive</span></p>
                                            <p>Point: <span class="color-red">40</span></p>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-detail.png"></h2>
                                                    <p class="small">DETAIL</p>
                                                </div>
                                            </div>
                                            <div class="member-v-block">
                                                <div class="member-v-centered">
                                                    <h2><img alt="" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-member-hapus.png"></h2>
                                                    <p class="small">HAPUS MEMBER</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div><!-- /.centered-red-box -->