<?php /* Smarty version 2.6.13, created on 2016-09-13 20:46:55
         compiled from application/web/apps/member_event.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'application/web/apps/member_event.html', 30, false),)), $this); ?>

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
                                <h1 class="headline super hairline">EVENT</h1>
                            </header>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="big">EVENT YANG AKAN DATANG</h3>
                                    <div class="well row">
										<?php if ($this->_tpl_vars['dataevent']): ?>
											<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dataevent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
												<div class="col-md-8">
													<div class="grid-post swatch-black-white">
														<article class="post post-showinfo">
															<div class="post-head text-left">
																<h3 class="post-title">
																	<a href="#">
																		<?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['name']; ?>

																	</a>
																</h3>
																<small class="post-date text-normal">
																	<?php echo ((is_array($_tmp=$this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['time_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%y") : smarty_modifier_date_format($_tmp, "%d/%m/%y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['time_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%y") : smarty_modifier_date_format($_tmp, "%d/%m/%y")); ?>
<br>
																	<?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['jam_akhir']; ?>

																</small>
															</div>
															<div class="post-body">
																<p>
																	<?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['alamat']; ?>

																</p>
															</div>
														</article>
													</div>
												</div>
												
												<div class="col-md-2">
													<div class="v-block">
														<div class="v-centered">
															<h2 class="bigger color-red"><span class="glyphicon glyphicon-calendar"></span></h2>
															<p class="small">LIHAT EVENT</p>
														</div>
													</div>
												</div>
												<div class="col-md-2">
													<div class="v-block">
														<div class="v-centered">
															<h2 class="bigger color-red"><span class="glyphicon glyphicon-trash"></span></h2>
															<p class="small">HAPUS EVENT</p>
														</div>
													</div>
												</div>
											<?php endfor; endif; ?>
										<?php else: ?>
											 <div class="col-md-8">
												<div class="grid-post swatch-black-white">
													<article class="post post-showinfo">
														
															<h3>
																<a href="#">
																   Tidak ada event
																</a>
															</h3>
														   
													</article>
												</div>
											</div>
										<?php endif; ?>
									</div>
                                </div>
                            </div>
                            <div class="row padding-top">
                                <div class="col-md-12">
                                    <h3 class="big">EVENT YANG TELAH LEWAT</h3>
                                    <?php if ($this->_tpl_vars['dataeventold']): ?>
										<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dataeventold']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
											<div class="well row">
												<div class="col-md-10">
													<div class="grid-post swatch-black-white">
														<article class="post post-showinfo">
															<div class="post-head text-left">
																<h3 class="post-title">
																	<a href="#">
																		<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['name']; ?>

																	</a>
																</h3>
																<small class="post-date text-normal">
																	<?php echo ((is_array($_tmp=$this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['time_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['time_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
<br>
																	<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['jam_akhir']; ?>

																</small>
															</div>
															<div class="post-body">
																<p>
																	<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['alamat']; ?>

																</p>
																<h4 class="bigger color-red"><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['point']; ?>
 POINT</h4>
															</div>

														</article>
													</div>
												</div>
												<div class="col-md-2">
													<div class="v-block">
														<div class="v-centered">
															<h2 class="bigger color-red"><span class="glyphicon glyphicon-calendar"></span></h2>
															<p class="small"><a id="detail" class="button" href="eventdetail/<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['id']; ?>
">LIHAT EVENT</a></p>
														</div>
													</div>
												</div>
											</div>
										<?php endfor; endif; ?>
									<?php else: ?>
										<div class="row">
											<div class="col-md-12">
												<div class="well row">
													<div class="grid-post swatch-black-white">
														<article class="post post-showinfo">
															<div class="post-head text-left">
																<h3 class="post-title">
																<a href="#">
																   Tidak ada event
																</a>
																</h3>
															</div>

														</article>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
                                </div>
                            </div>
                            
                            
                    </section>
                </div><!-- /.centered-red-box -->

              