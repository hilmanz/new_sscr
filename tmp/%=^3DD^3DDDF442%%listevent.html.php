<?php /* Smarty version 2.6.13, created on 2016-04-15 18:00:24
         compiled from application/web//apps/listevent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'application/web//apps/listevent.html', 22, false),)), $this); ?>

<div id="list-Event" class="section">
	<div id="container">
        <div class="row-2">
              <h1 class="yellow textbg">LIST EVENT </h1>
        </div>
        <div class="rows">
        	<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/addEvent" class="button">BUAT EVENT</a>
            <div id="memberListTabs" class="leaderInfo">
            	
              <div class="rows">
            	<div id="tabs">
                  <ul>
                    <li><a href="#tabs-1">EVENT YANG AKAN DATANG</a></li>
                  </ul>
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
							  <div id="tabs-1">
								<div class="rows-list">
									<div class="infoMembers fl">
										<p class="name_member yellow"><?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['name']; ?>
</p>
										<p class=""><?php echo ((is_array($_tmp=$this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['time_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%y") : smarty_modifier_date_format($_tmp, "%d/%m/%y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['time_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%y") : smarty_modifier_date_format($_tmp, "%d/%m/%y")); ?>
</p>
									   <p class=""><?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['jam_akhir']; ?>
</p>
										<p class=""><?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['alamat']; ?>
</p>
																				<div class="buttonAction">
											<a id="detail" class="button" href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/eventDetail/<?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['id']; ?>
">Lihat Event</a>
                          <?php if ($this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['n_status'] == 0): ?>
							 <a  class="button icons" href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/hapusevent?event=<?php echo $this->_tpl_vars['dataevent'][$this->_sections['i']['index']]['id']; ?>
" onclick="return confirm('Anda yakin mau menghapus event anda');"><span class="icon-bin">&nbsp;</span></a>
							<?php endif; ?>						
																	</div>
									</div>
								</div><!--end rows-->
							  
								
							  </div>
						<?php endfor; endif; ?>
						
				<?php else: ?>
				<div class="rows-list">
					<div class="infoMembers fl">
						<center>Belum ada event.</center>
					</div>
				</div>
				
				<?php endif; ?>
                 
                </div><!--end#tabs-->
                </div><!--end rows-->
                <div class="rows">
                <div id="tabs2">
                  <ul>
                    <li><a href="#tabs-1">EVENT YANG TELAH LEWAT</a></li>
                  </ul>
                  <div id="tabs-1">
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
								<div class="eventPast rows-list">
							
									<!--
									<span><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['time_end']; ?>
</span> <span><?php if ($this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['type'] == 1): ?> Nonton Bareng <?php elseif ($this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['type'] == 2): ?> Futsal<?php elseif ($this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['type'] == 3): ?> Gathering <?php else: ?> Supper Soccer<?php endif; ?></span> <span><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['name']; ?>
</span>
					
					
									<span>&nbsp;</span><span class="yellow"><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['point']; ?>
 POINT</span>
									<span>
									<a id="detail" class="button" href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/eventDetail/<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['id']; ?>
">Lihat Event</a>
									</span>
					   				-->
                                    <div class="infoMembers fl">
                                        <p class="name_member yellow"><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['name']; ?>
</p>
                                        <p class=""><?php echo ((is_array($_tmp=$this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['time_start'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['time_end'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</p>
                                        <p class=""><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['jam_akhir']; ?>
</p>
                                        <p class=""><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['alamat']; ?>
</p>
                                        <div class="pointInfoPast">
                                        <p class="yellow"><?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['point']; ?>
 POINT</p>
                                        </div>
                                        <div class="buttonAction">
                                            <a id="detail" class="button" href="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/eventDetail/<?php echo $this->_tpl_vars['dataeventold'][$this->_sections['j']['index']]['id']; ?>
">Lihat Event</a>
                                        
                                        </div>
                                    </div>
                                 							
								</div><!--end rows-->
								
							<?php endfor; endif; ?>
					<?php endif; ?>
						
                  	
                    
                  </div>
                  
                 
                </div><!--end#tabs-->
                </div><!--end rows-->

            </div><!--endleaderInfo-->
        </div><!--end.rows-->
    	
    </div><!--end#container-->
</div><!--end.section-->