<?php /* Smarty version 2.6.13, created on 2016-11-18 16:22:10
         compiled from application/web/apps/chapter_berita_grid.html */ ?>

        <div id="content" role="main">
            <div class="centered-red-box">

                <section class="section" style="padding-top:50px">
                    <div class="container">
                        <header class="section-header no-border">
                            <figure>
                                <a href="chapter_home.html"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png" class="sscr-wfm-logo"></a>
                            </figure>
                        </header>
                        <header class="section-header">
                            <h1 class="headline super hairline">BERITA DAN<br>PENGUMUMAN</h1>
                        </header>

                        <div class="well">
                            <div class="row padding-bottom padding-top">
                                <div class="col-md-10 col-md-offset-1">
                                <!-- NEWS GRID -->
                        <ul class="list-unstyled isotope no-transition pagilist">
							
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['listcontentartikel']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>							
                            <li class="col-md-4 post-item filter-images isotope-item">
                                <div class="grid-post swatch-red-white">
                                    <article class="post post-showinfo">
                                        <div class="post-media overlay">
                                            <a class="feature-image magnific hover-animate" href="assets/images/news/news_00.jpg" title="Thats a nice image">
                                                <img alt="some image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/news/<?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['img']; ?>
">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                        </div>
                                        <div class="post-head small-screen-center">
                                            <h2 class="post-title">
                                              <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/detailberita/<?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['id']; ?>
">
                                                <?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['title']; ?>

                                              </a>
                                            </h2>
                                            <small class="post-date">
                                              <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/detailberita/<?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['id']; ?>
"> <?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['waktu']; ?>
</a>
                                            </small>
                                        </div>
                                        <div class="post-body">
                                            <p>
                                                <?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['contentisi']; ?>

                                            </p>
                                            <a class="more-link" href="<?php echo $this->_tpl_vars['basedomain']; ?>
member/detailberita/<?php echo $this->_tpl_vars['listcontentartikel'][$this->_sections['i']['index']]['id']; ?>
">
                                              Read More
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            </li>
							<?php endfor; endif; ?>
						</ul>                       
                       
                                <!-- END NEWS GRID -->
                                </div>
								

                                <!-- PAGINATION -->
                                <div class="text-center post-showinfo">
                                    <!--ul class="post-navigation pagination">
                                        <li class="disabled">
                                            <a href="#">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <span href="#">1</span>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a href="#">3</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-primary" href="#">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul-->
									<div id="paging_of_chapter_list" class="paging">
            
								</div>
                                </div>
                                <!-- END PAGINATION -->                                
                            </div><!-- /.row -->
                        </div><!-- /.well -->
                    </div><!-- /.container -->
                </section>
            </div><!-- /.centered-red-box -->

<script type="text/javascript">
	getpaging(0,<?php echo $this->_tpl_vars['total']; ?>
,"paging_of_chapter_list","paging_ajax_chapter",3);
</script>
			
<script>
<?php echo '
//select bootstarp

function paging_ajax_chapter(fungsi,start){


	$.post(basedomain+"chapter/pagingberita",{\'start\':start,ajax:1},function(response){

		if(response){
			  if(response.status==true){
				var str="<ul class=\'list-unstyled isotope no-transition\'>";
				$.each(response.data,function(k,v){
					//console.log(v.status);
					str+="<li class=\'col-md-4 post-item filter-images isotope-item pagilist\'>";
                                str+="<div class=\'grid-post swatch-red-white\'>";
                                    str+="<article class=\'post post-showinfo\'>";
                                        str+="<div class=\'post-media overlay\'>";
                                            str+="<a class=\'feature-image magnific hover-animate\' href=\'"+basedomain+"public_assets/news/"+v.img+"\' title=\'Thats a nice image\'>";
                                                str+="<img alt=\'some image\' src=\'"+basedomain+"public_assets/news/"+v.img+"\'>";
                                                str+="<i class=\'fa fa-search-plus\'></i>";
                                            str+="</a>";
                                        str+="</div>";
                                        str+="<div class=\'post-head small-screen-center\'>";
                                            str+="<h2 class=\'post-title\'>";
                                              str+="<a href=\'"+basedomain+"member/detailberita/"+v.id+"\'>"+v.title+"</a>";                                                                                              
                                            str+="</h2>";
                                            str+="<small class=\'post-date\'>";
                                              str+="<a href=\'"+basedomain+"member/detailberita/"+v.id+"\'> "+v.waktu+"</a>";
                                            str+="</small>";
                                        str+="</div>";
                                        str+="<div class=\'post-body\'>";
                                            str+="<p>"+v.contentisi+"</p>";
                                            str+="<a class=\'more-link\' href=\'"+basedomain+"member/detailberita/"+v.id+"\'>";
                                              str+="Read More";
                                            str+="</a>";
                                        str+="</div>";
                                    str+="</article>";
                                str+="</div>";
                            str+="</li>";

				});
				 str+="</ul>";
				console.error;
				$(\'.pagilist\').html(str);
	
			}
		}
	},"JSON");
}
'; ?>

</script>
          