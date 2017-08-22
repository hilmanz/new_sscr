<?php /* Smarty version 2.6.13, created on 2016-09-13 18:34:13
         compiled from application/admin//apps/listmember.html */ ?>
<script>
<?php echo '
	//UNTUK DOWNLOAD XLS
		$(document).ready(function(){
			$(".unduhxls").on("click", function(){
				
				var chapternya=$(\'.chapternya option:selected\').val();
				var status=$(\'.status option:selected\').val();
				var points=$(\'.points option:selected\').val();
				var startdate=$(\'.startdate\').val();
				var enddate=$(\'.enddate\').val();
				var searchname=$(\'.searchname\').val();
				
				location.href = basedomain+"membermanagement?download=report&chapternya="+chapternya+"&status="+status+"&points="+points+"&startdate="+startdate+"&enddate="+enddate+"&search="+searchname+"";
			});
		});
		



	
'; ?>

	</script>
	
<div class="page_section" id="project-page">
    <div id="container">
        <div class="titlebox">
            <h2 class="fl"><span class="icon-users">&nbsp;</span>List Member</h2>
			<h2 class="fr"><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement/addmember" class="button2">Tambah Baru</a></h2>
			<h2 class="fr"><a  href="#" class="button2 unduhxls">Unduh XLS</a></h2>
             
        </div><!-- end .titlebox -->
        <div class="content chapter">
        	<div class="summary">
       		 <div class="short">
			  <form method="GET" action="" id="shorter">
             	<div class="leftShorter">
				<div class="select_box">
                    	<label>Sort by Chapter :</label>
                        <select name="chapternya" class="sort chapternya">
                            <option value="">Semua Chapter</option>
							<?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['chapter']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['t']['show'] = true;
$this->_sections['t']['max'] = $this->_sections['t']['loop'];
$this->_sections['t']['step'] = 1;
$this->_sections['t']['start'] = $this->_sections['t']['step'] > 0 ? 0 : $this->_sections['t']['loop']-1;
if ($this->_sections['t']['show']) {
    $this->_sections['t']['total'] = $this->_sections['t']['loop'];
    if ($this->_sections['t']['total'] == 0)
        $this->_sections['t']['show'] = false;
} else
    $this->_sections['t']['total'] = 0;
if ($this->_sections['t']['show']):

            for ($this->_sections['t']['index'] = $this->_sections['t']['start'], $this->_sections['t']['iteration'] = 1;
                 $this->_sections['t']['iteration'] <= $this->_sections['t']['total'];
                 $this->_sections['t']['index'] += $this->_sections['t']['step'], $this->_sections['t']['iteration']++):
$this->_sections['t']['rownum'] = $this->_sections['t']['iteration'];
$this->_sections['t']['index_prev'] = $this->_sections['t']['index'] - $this->_sections['t']['step'];
$this->_sections['t']['index_next'] = $this->_sections['t']['index'] + $this->_sections['t']['step'];
$this->_sections['t']['first']      = ($this->_sections['t']['iteration'] == 1);
$this->_sections['t']['last']       = ($this->_sections['t']['iteration'] == $this->_sections['t']['total']);
?>
							<?php if ($this->_tpl_vars['chapternya'] == $this->_tpl_vars['chapter'][$this->_sections['t']['index']]['id']): ?>
							  <option value="<?php echo $this->_tpl_vars['chapter'][$this->_sections['t']['index']]['id']; ?>
" selected><?php echo $this->_tpl_vars['chapter'][$this->_sections['t']['index']]['name_chapter']; ?>
</option>
							<?php else: ?>
							  <option value="<?php echo $this->_tpl_vars['chapter'][$this->_sections['t']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['chapter'][$this->_sections['t']['index']]['name_chapter']; ?>
</option>
							<?php endif; ?>
							<?php endfor; endif; ?>
                        </select>
                    </div>
                	<div class="select_box">
                    	<label>Sort by Status :</label>
                        <select name="status" class="sort status">
                            <option value="">Semua Status</option>
                            <option value="1"  <?php if ($this->_tpl_vars['status'] == 1): ?>selected<?php endif; ?>>Actived</option>
                            <option value="2"  <?php if ($this->_tpl_vars['status'] == 2): ?>selected<?php endif; ?>>Inactived</option>
			    <option value="3"  <?php if ($this->_tpl_vars['status'] == 3): ?>selected<?php endif; ?>>Deleted</option>
                            <option value="4"  <?php if ($this->_tpl_vars['status'] == 4): ?>selected<?php endif; ?>>Gagal</option>
                        </select>
                    </div>
                   <div class="select_box">
                    	<label>Sort by Points :</label>
                        <select name="points" class="sort points">
                            <option value="">Tampilkan Semua</option>
                            <option value="1"  <?php if ($this->_tpl_vars['points'] == 1): ?>selected<?php endif; ?>>Tertinggi</option>
                            <option value="2"  <?php if ($this->_tpl_vars['points'] == 2): ?>selected<?php endif; ?>>Terendah</option>
                        </select>
                    </div>

                </div><!--end.row-->

                
             	<div class="rightShorter">
                   		 <div id="datePick">
                                <span class="fl">Tanggal :</span>
                                <div class="inputDate fl">
                                    <input type="text" value="<?php echo $this->_tpl_vars['startdate']; ?>
" name="startdate" class="datepicker submitter startdate " id="dp1403509217274">
                                </div><!-- /.rows -->
                                
                                <span class="fl">Sampai</span>
                                <div class="inputDate fl">
                                    <input type="text"  value="<?php echo $this->_tpl_vars['enddate']; ?>
" name="enddate" class="datepicker enddate " id="dp1403509217275">
                                </div><!-- /.rows -->
                                
                        </div>
						<div id="searchPick">
						<span class="fl">Cari :</span>
						<input type='text' name='search' value="<?php echo $this->_tpl_vars['search']; ?>
" class='selectEvent fl searchname' style="width:150px" placeholder="nama/email">
                        <input type="submit" class="button2" style="margin-top:0px;" value="Go">
						
						</div>
					
						
					</form>	
           		</div><!--end.row-->
				</div>
            </div><!-- end .summary -->
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<thead>
				<tr>
					<th class="head0">No</th>
					<th class="head0">Nama </th> 
					<th class="head0">Nama Chapter  </th> 
					<th class="head0">Chapter ID</th> 
				
					<th class="head0" >Tanggal Registrasi</th> 
					<th class="head0" >Point Member</th> 
					<th class="head0" >Status</th> 
					<th class="head0" >Action</th> 
				</tr>
			</thead>
			<tbody class="pagilist">
					<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['no']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name_chapter']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['ssgte_id']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['date_register']; ?>
</td>
					<td class="text-center"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['point']; ?>
</td>
					<td><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status'] == 1): ?>Actived<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status'] == 0): ?>Inactived<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status'] == 2): ?>Deleted<?php else: ?>Gagal<?php endif; ?></td>
					<td>
						<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status'] == 0): ?>
						<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement?paramactive=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Active</a> |                     
						<a href="javascript:void(0)" onClick="confirmation('<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement?paramcancel=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
','Confirm to Delete?')" style="color:#19CFA8;">Hapus</a> |
						<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement/editmember/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Edit</a>
						<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['n_status'] == 1): ?>
						<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement?paraminactive=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Inactive</a> |                     
						<a href="javascript:void(0)" onClick="confirmation('<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement?paramcancel=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
','Confirm to Delete?')" style="color:#19CFA8;">Hapus</a> |
						<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
membermanagement/editmember/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Edit</a>
						<?php endif; ?>
					</td>
					</tr>
					<?php endfor; endif; ?>	
			</tbody>
			</table>
			<div id="paging_of_chapter_list" class="paging">
            
            </div>
        </div><!-- end .chapter -->
    </div><!-- end #container -->
</div><!-- end #home -->

<script type="text/javascript">
	getpaging(0,<?php echo $this->_tpl_vars['total']; ?>
,"paging_of_chapter_list","paging_ajax_member",10);
</script>


<script>
<?php echo '
//select bootstarp

function paging_ajax_member(fungsi,start){

	var chapternya=$(\'.chapternya option:selected\').val();		
	var startdate=$(\'.startdate\').val();
	var enddate=$(\'.enddate\').val();	
	var search=$(\'.search\').val();	
	var status=$(\'.status option:selected\').val();
	var points=$(\'.points option:selected\').val(); 
				
	$.post(basedomain+"membermanagement/pagingmember",{\'chapternya\':chapternya,\'startdate\':startdate,\'enddate\':enddate,\'search\':search,\'status\':status,\'points\':points,\'start\':start,ajax:1},function(response){
	
		if(response){
			  if(response.status==true){
				var str="";
				$.each(response.data,function(k,v){
					//console.log(v.status);
					str+=\'<tr>\';
					str+=\'<td>\'+v.no+\'</td>\';
					if(v.name){str+=\'<td>\'+v.name+\'</td>\';}else{str+=\'<td></td>\';}
					str+=\'<td>\'+v.name_chapter+\'</td>\';
					str+=\'<td>\'+v.ssgte_id+\'</td>\';
					if(v.date_register){str+=\'<td>\'+v.date_register+\'</td>\';}else{str+=\'<td></td>\';}
					if(v.point){str+=\'<td>\'+v.point+\'</td>\';}else{str+=\'<td></td>\';}
					str+=\'<td>\'
					if (v.n_status==1){str+=\'Actived\';}else if(v.n_status==0){str+=\'Inactived\';}else if(v.n_status==2){str+=\'Deleted\';}else{str+=\'Gagal\';}str+=\'</td>\';
					//str+=\'<td><a href="\'+basedomain+\'membermanagement?paramactive=\'+v.id+\'" style="color:#19CFA8;">Active</a>|<a href="\'+basedomain+\'chapter?paraminactive=\'+v.id+\'" style="color:#19CFA8;">Inactive</a>|<a href="\'+basedomain+\'chapter?paramcancel=\'+v.id+\'" style="color:#19CFA8;">Cancel</a></td>\';					
					str+=\'<td>\'
			
					if (v.n_status==1){str+=\'<a href="\'+basedomain+\'membermanagement?paraminactive=\'+v.id+\'" style="color:#19CFA8;">Inactive</a> | <a href="javascript:void(0)" onClick="confirmation(\\\'\'+basedomain+\'membermanagement?paramcancel=\'+v.id+\'\\\',\\\'Confirm to Delete?\\\')" style="color:#19CFA8;"> Delete</a> | <a href="\'+basedomain+\'membermanagement/editmember/\'+v.id+\'" style="color:#19CFA8;">Edit</a>\'}
					else if(v.n_status==0){str+=\'<a href="\'+basedomain+\'membermanagement?paramactive=\'+v.id+\'" style="color:#19CFA8;">Active</a> | <a href="javascript:void(0)" onClick="confirmation(\\\'\'+basedomain+\'membermanagement?paramcancel=\'+v.id+\'\\\',\\\'Confirm to Delete?\\\')" style="color:#19CFA8;"> Delete</a> | <a href="\'+basedomain+\'membermanagement/editmember/\'+v.id+\'" style="color:#19CFA8;">Edit</a>\'}str+=\'</td>\';
					
					str+=\'</tr>\';
						
				});
				console.error;
				$(\'.pagilist\').html(str);
				likeunlike();	
					
			}
		}
	},"JSON");
}

$(\'.selectpicker\').selectpicker();
likeunlike();

function likeunlike(){

$(document).ready(function(){
			$(".checkactive").on("click", function(){
			var idnya=$(this).val();
			var thisnya=$(this);
					  $.ajax({
                        \'type\': \'POST\',
                        \'url\': basedomain+\'membermanagement/checkit\',
                        \'data\': {idnya:idnya},
						\'dataType\':\'json\',
                        \'success\': function(result){
						
							thisnya.hide();
							thisnya.parent().html(\'<center><input type="checkbox" class="checkinactives" value=\'+idnya+\' checked>Checked</center>\');
							
							$(document).ready(function(){
							$(".checkinactives").on("click", function(){
							var idnya=$(this).val();
							var thisnya=$(this);
									  $.ajax({
										\'type\': \'POST\',
										\'url\': basedomain+\'membermanagement/incheckit\',
										\'data\': {idnya:idnya},
										\'dataType\':\'json\',
										\'success\': function(result){
										
											thisnya.hide();
											thisnya.parent().html(\'<center><input type="checkbox" class="checkactive" value=\'+idnya+\'></center>\');
											likeunlike();
										}
										
										});

								});
							});
						}
						
						});

				});
			});
			
$(document).ready(function(){
			$(".checkinactive").on("click", function(){
			var idnya=$(this).val();
			var thisnya=$(this);
					  $.ajax({
                        \'type\': \'POST\',
                        \'url\': basedomain+\'membermanagement/incheckit\',
                        \'data\': {idnya:idnya},
						\'dataType\':\'json\',
                        \'success\': function(result){
						
							thisnya.hide();
							thisnya.parent().html(\'<center><input type="checkbox" class="checkactive" value="\'+idnya+\'"></center>\');
							likeunlike();
						}
						
						});

				});
			});
}

		


'; ?>

</script>
