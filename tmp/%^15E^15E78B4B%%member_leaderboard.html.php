<?php /* Smarty version 2.6.13, created on 2016-09-13 18:21:27
         compiled from application/web/apps/member_leaderboard.html */ ?>
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
                            <header class="section-header text-center">
                                <h1 class="headline super hairline">LEADERBOARD</h1>
                            </header>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well">
                                        <ul class="nav nav-tabs" id="myTabOne">
                                            <li class="active">
                                                <a data-toggle="tab" href="#chapterTab">Chapter</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#memberTab">Member</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContentOne">
                                            <div class="tab-pane fade in active" id="chapterTab">
                                                <table class="table">
													<?php if ($this->_tpl_vars['leaderChapter']): ?>
														<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['leaderChapter']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
														  <tr>
															<td><?php echo $this->_tpl_vars['leaderChapter'][$this->_sections['i']['index']]['no']; ?>
</td>
															<td><?php echo $this->_tpl_vars['leaderChapter'][$this->_sections['i']['index']]['name']; ?>
</td>
															<td><?php echo $this->_tpl_vars['leaderChapter'][$this->_sections['i']['index']]['name_chapter']; ?>
</td>
															<td><?php echo $this->_tpl_vars['leaderChapter'][$this->_sections['i']['index']]['total']; ?>
</td>
														  </tr>
													  <?php endfor; endif; ?>
													<?php endif; ?>                                                  
													</table>
                                            </div>
                                            <div class="tab-pane fade" id="memberTab">
                                                <table class="table table-striped">
													<?php if ($this->_tpl_vars['leaderMember']): ?>
														<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['leaderMember']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
															<tr>
																<td><?php echo $this->_tpl_vars['leaderMember'][$this->_sections['j']['index']]['no']; ?>
</td>
																<td><?php echo $this->_tpl_vars['leaderMember'][$this->_sections['j']['index']]['name']; ?>
 </td>
																<td><?php echo $this->_tpl_vars['leaderMember'][$this->_sections['j']['index']]['name_chapter']; ?>
</td>
																<td><?php echo $this->_tpl_vars['leaderMember'][$this->_sections['j']['index']]['total']; ?>
 </td>
															</tr>
														 <?php endfor; endif; ?>
													<?php endif; ?>                                                  
												</table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.container -->
                    </section>

                </div><!-- /.centered-red-box -->

               