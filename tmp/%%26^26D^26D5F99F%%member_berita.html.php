<?php /* Smarty version 2.6.13, created on 2016-09-13 18:21:36
         compiled from application/web/apps/member_berita.html */ ?>
		 <header id="masthead" class="header navbar navbar-sticky swatch-black-white navbar-stuck">
            <div class="container">
                <div class="menu-visible text-right">
                    <?php if ($this->_tpl_vars['userdata']['img_avatar']): ?>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/profile/<?php echo $this->_tpl_vars['userdata']['img_avatar']; ?>
" width="35px">
					<?php else: ?>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/design/custom-icons/ico-user-top.png">
					<?php endif; ?>
					<div class="member-name-top"><a href="member_profileedit.html"><?php echo $this->_tpl_vars['userdata']['name']; ?>
</a></div>
                    <div class="member-point-top"><?php echo $this->_tpl_vars['userdata']['point']; ?>
</div> 
					<div>|</div>
					<div class="member-point-top"><a href="logout.php">LOG OUT</a></div>
                    <a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i></a>
                </div>
                <div class="text-right"></div>
            </div>
        </header>
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
                                <h1 class="headline super hairline">BERITA DAN<br>PENGUMUMAN</h1>
                            </header>

                            <div class="well">
                                <div class="row padding-bottom padding-top">
                                    <div class="col-md-10 col-md-offset-1">
                                        <article class="post post-showinfo">
                                            <div class="post-media overlay">
                                                <a class="feature-image magnific hover-animate" href="assets/images/news/nobar.png" title="Thats a nice image">
                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/nobar.png">
                                                    <i class="fa fa-search-plus"></i>
                                                </a>
                                            </div>
                                            <div class="post-head small-screen-center">
                                                <h2 class="post-title">
                                                  <a href="#">
                                                    Nature is lethal but it doesn&#x27;t hold a candle to man.
                                                  </a>
                                                </h2>
                                                <!-- <small class="post-author">
                                                  <a href="#">Manos Proistak,</a>
                                                </small> -->
                                                <small class="post-date">
                                                  <a href="#">12 August 2014</a>
                                                </small>
                                            </div>
                                            <div class="post-body">
                                                <p>
                                                    You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don&#x27;t know exactly when we turned on each
                                                    other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I&#x27;m breaking now. We said we&#x27;d say it was the snow that killed the other two, but it wasn&#x27;t.
                                                    Nature is lethal but it doesn&#x27;t hold a candle to man.
                                                </p>
                                                <p>
                                                    Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put
                                                    quarters in it? No? Well, that&#x27;s what you see at a toy store. And you must think you&#x27;re in a toy store, because you&#x27;re here shopping for an infant named Jeb.Like you, I used to think the world was
                                                    this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded.
                                                    That&#x27;s Cesar&#x27;s world, and if you&#x27;re not willing to play by his rules, then you&#x27;re gonna have to pay the price.
                                                </p>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                                <h3 class="padding-top">BERITA DAN PENGUMUMAN LAINNYA</h3>

                                <div class="carousel slide" id="news2">
                                    <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#news2" class="active"></li>
                                        <li data-slide-to="1" data-target="#news2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific hover-animate" href="assets/images/news/news_01.jpg" title="Thats a nice image">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_01.jpg">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific hover-animate" href="assets/images/news/news_02.jpg" title="Thats a nice image">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_02.jpg">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        Bootstrap is Really Important
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <div id="slider-flex5" class="flexslider text-left feature-slider" data-flex-speed="7000" data-flex-animation="slide" data-flex-controls="hide" data-flex-directions="show" data-flex-controlsalign="center" data-flex-captionhorizontal="" data-flex-captionvertical=""
                                                                data-flex-controlsposition="" data-flex-directions-type="">
                                                                    <ul class="slides">
                                                                        <li>
                                                                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_03.jpg" alt="some image">
                                                                        </li>
                                                                        <li>
                                                                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_08.jpg" alt="some image">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        It is cool &amp; responsive
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <div id="slider-flex5" class="flexslider text-left feature-slider" data-flex-speed="7000" data-flex-animation="slide" data-flex-controls="hide" data-flex-directions="show" data-flex-controlsalign="center" data-flex-captionhorizontal="" data-flex-captionvertical=""
                                                                data-flex-controlsposition="" data-flex-directions-type="">
                                                                    <ul class="slides">
                                                                        <li>
                                                                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_04.jpg" alt="some image">
                                                                        </li>
                                                                        <li>
                                                                            <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_05.jpg" alt="some image">
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        It is cool &amp; responsive
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific-youtube hover-animate" href="https://www.youtube.com/watch?v=cxIA9BKBC4o" title="Thats a nice image">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_00.jpg">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        Bootstrap is Really Important
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific-youtube hover-animate" href="https://www.youtube.com/watch?v=WR9vJzJgF8s" title="Thats a nice image">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_04.jpg">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        Everybody loves it
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    Selasa 02.Agustus.2016
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific hover-animate" href="assets/images/news/news_07.jpg" title="Thats a nice image">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_07.jpg">
                                                                    <i class="fa fa-search-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        It is so cheap
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                    12 August 2014
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="grid-post swatch-black-white">
                                                        <article class="post post-showinfo">
                                                            <div class="post-media">
                                                                <a class="feature-image magnific-vimeo hover-animate" href="https://www.youtube.com/watch?v=hnEiUpCNBfo" title="Let&#x27;s talk about it">
                                                                    <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/news/news_08.jpg">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                            <div class="post-head text-center">
                                                                <h3 class="post-title">
                                                                    <a href="#">
                                                                        Everybody loves it
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div class="post-extras">
                                                                <span class="post-date">
                                                                  12 August 2014
                                                                </span>
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div><!-- /.well -->
                        </div>
                    </section>
                </div><!-- /.centered-red-box -->


               