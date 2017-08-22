<?php /* Smarty version 2.6.13, created on 2016-09-13 18:28:01
         compiled from application/admin//apps/listevent.html */ ?>
<script>
<?php echo '
//UNTUK DOWNLOAD XLS
		$(document).ready(function(){
			$(".unduhxls2").on("click", function(){
				
				//console.log(\'masuk\');
				var status=$(\'.status option:selected\').val();
				var category=$(\'.category option:selected\').val();
				var startdate=$(\'.startdate\').val();
				var enddate=$(\'.enddate\').val();
				var search=$(\'.search\').val();
				
				location.href = basedomain+"eventmanagement?download=report&status="+status+"&category="+category+"&startdate="+startdate+"&enddate="+enddate+"&search="+search+"";
			});
		});

$(document).on(\'click\',\'.avatarnya\',function(){

	console.log($(this).attr(\'src\'));
	$gambarnya= $(this).attr(\'src\');
	console.log($(\'.gmbrpopup\'));
	$(\'.gmbrpopup\').attr(\'src\',$gambarnya);
})

$(document).on(\'click\',\'.idinput\',function(){

	$idnya= $(this).attr(\'idnya\');
	$chapteridnya= $(this).attr(\'chapteridnya\');

	$(\'.idevent\').val($idnya);
	$(\'.chapteridnya\').val($chapteridnya);
})
'; ?>

</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "application/admin/widgets/popup-images.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "application/admin/widgets/popup-eventid.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="page_section" id="project-page">
    <div id="container">
        <div class="titlebox">
            <h2 class="fl"><span class="icon-users">&nbsp;</span>List Event</h2>
            <!--<h2 class="fr"><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement/addevent" class="button2">Tambah Baru</a></h2>-->
            <!-- <h2 class="fr"><a href="#" class="button2 unduhxls2">Unduh XLS</a></h2>-->
        </div><!-- end .titlebox -->
        <div class="content event">
        	<div class="summary">
       		 <div class="short">
			  <form method="GET" action="" id="shorter">
             	
                <div class="leftShorter">
				<div class="select_box">
                    	<label>Sort By Chapter :</label>
                        <select name="listchapter" class="sort listchapter">
                            <option value="">Semua Chapter</option>
							<?php unset($this->_sections['t']);
$this->_sections['t']['name'] = 't';
$this->_sections['t']['loop'] = is_array($_loop=$this->_tpl_vars['listchap']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<?php if ($this->_tpl_vars['chapternya'] == $this->_tpl_vars['listchap'][$this->_sections['t']['index']]['id']): ?>
							  <option value="<?php echo $this->_tpl_vars['listchap'][$this->_sections['t']['index']]['id']; ?>
" selected><?php echo $this->_tpl_vars['listchap'][$this->_sections['t']['index']]['name_chapter']; ?>
</option>
							<?php else: ?>
							  <option value="<?php echo $this->_tpl_vars['listchap'][$this->_sections['t']['index']]['id']; ?>
" ><?php echo $this->_tpl_vars['listchap'][$this->_sections['t']['index']]['name_chapter']; ?>
</option>
							<?php endif; ?>
							<?php endfor; endif; ?>
                        </select>
                    </div>								
                        <div class="select_box">
                        <label>Sort by City :</label>
                        <select name="kota" class="sort">
                            <option value="">Semua Kota</option>
                            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['listcity']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                        <?php if ($this->_tpl_vars['kota'] == $this->_tpl_vars['listcity'][$this->_sections['i']['index']]['id']): ?>
                                                        <option value="<?php echo $this->_tpl_vars['listcity'][$this->_sections['i']['index']]['id']; ?>
" selected><?php echo $this->_tpl_vars['listcity'][$this->_sections['i']['index']]['city']; ?>
</option>
                            <?php else: ?>
                            <option value="<?php echo $this->_tpl_vars['listcity'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['listcity'][$this->_sections['i']['index']]['city']; ?>
</option>
                            <?php endif; ?>
                                                        <?php endfor; endif; ?>

                        </select>
                    	</div>

                	<div class="select_box">
                    	<label>Sort By Status :</label>
                        <select name="status" class="sort status">
                            <option value="">Semua Status</option>
                            <option value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>selected<?php endif; ?>>Approved</option>
                            <option value="2" <?php if ($this->_tpl_vars['status'] == 2): ?>selected<?php endif; ?>>Inactived</option>
			    <option value="3" <?php if ($this->_tpl_vars['status'] == 3): ?>selected<?php endif; ?>>Finished</option>
			    <option value="4" <?php if ($this->_tpl_vars['status'] == 4): ?>selected<?php endif; ?>>Rejected</option>
                        </select>
                    </div>
                    <div class="select_box">
                    	<label>Sort By Kategori :</label>
                        <select name="category" class="sort category">
                            <option value="">Semua Kategori</option>
                            <option value="1" <?php if ($this->_tpl_vars['category'] == 1): ?>selected<?php endif; ?>>Nonton Bareng</option>
                            <option value="2" <?php if ($this->_tpl_vars['category'] == 2): ?>selected<?php endif; ?>>Futsal</option>
			    <option value="3" <?php if ($this->_tpl_vars['category'] == 3): ?>selected<?php endif; ?>>Gathering</option>
			    <option value="4" <?php if ($this->_tpl_vars['category'] == 4): ?>selected<?php endif; ?>>Supersoccer</option>
                        ></select>
                    </div>
                   
                </div><!--end.row-->
             	<div class="rightShorter">
                     <div class="" id="datePick">
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
"  class='selectEvent fl search' style="width:150px" placeholder="event/chapter/alamat">
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
					<th class="head0">Nama Event</th> 
										<th class="head0">Kategori Event</th> 
					<th class="head0">Tanggal Mulai</th> 
					<th class="head0" >Tanggal Berakhir </th> 
					<th class="head0" >Alamat Event</th> 
					<th class="head0" >Foto</th> 
					<th class="head0" >Nama Chapter</th> 
					<th class="head0" >Tanggal Dibuat</th> 
										<th class="head0">Point Event</th> 
					<th class="head0">Status</th> 
					<th class="head0">Action</th> 
					<th class="head0">Insert Point</th> 
					
					
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
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['names']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name_type']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['time_start']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['time_end']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['alamat']; ?>
</td>
					<td>  
				
				<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['list'][$this->_sections['i']['index']]['upload_foto']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<a href="#popup-imgbig" class="showPopup"><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['upload_foto']):  if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['upload_foto'][$this->_sections['j']['index']]['name']): ?><img src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/uploadfoto/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['upload_foto'][$this->_sections['j']['index']]['name']; ?>
" class="avatarnya" width="40"height='40'><?php endif;  else: ?><img src="<?php echo $this->_tpl_vars['basedomainpath']; ?>
public_assets/profile/images.jpg" class="avatarnya" width="40"height='40'><?php endif; ?></a>&nbsp;
				<?php endfor; endif; ?>	
				
					</td>
			
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name_chapter']; ?>
</td>
					<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['date_create']; ?>
</td>
										<td class="text-center"><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['poin']; ?>
</td>
					<td><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 1): ?>Approved<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 0): ?>Inactived<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 3): ?>Finished<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 4): ?>Rejected<?php endif; ?></td>							
					<td>
						<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 0): ?>
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramactive=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Approve</a> | 							
							<a href="javascript:void(0)" onClick="confirmation('<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramcancel=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
','Confirm to Delete?')" style="color:#19CFA8;">Delete</a>	| 						
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement/editevent/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Edit</a> | 
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramreject=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Reject</a>
						<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 1 && $this->_tpl_vars['list'][$this->_sections['i']['index']]['name_type'] == 'Supersoccer'): ?>							
							<a href="javascript:void(0)" onClick="confirmation('<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramcancel=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
','Confirm to Delete?')" style="color:#19CFA8;">Delete</a> | 
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement/editevent/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Edit</a>							
						<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 1): ?>							
							<a href="javascript:void(0)" onClick="confirmation('<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramcancel=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
','Confirm to Delete?')" style="color:#19CFA8;">Delete</a> | 
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement/editevent/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;">Edit</a> 
							| <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramfinish=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&&idchapter=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['chapter_id']; ?>
" style="color:#19CFA8;">Finish</a>
						<?php elseif ($this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == 3): ?>							
							
							<a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement/editevent/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;"></a>
							
							
						<?php endif; ?>
					</td>
					
					
					<!-- <td><a href="<?php echo $this->_tpl_vars['basedomain']; ?>
eventmanagement?paramreset=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" style="color:#19CFA8;"><input type="submit" class="button2" style="margin-top:0px;" value="Reset"></a></td>
					 -->
					 <td>
					 <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['name_type'] == 'Supersoccer' && $this->_tpl_vars['list'][$this->_sections['i']['index']]['stat'] == '1'): ?>
					<a href="#popup-eventbig" class="showPopup"><input type="submit" class="button2 idinput" style="margin-top:0px;" value="Insert" idnya="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
" chapteridnya="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['chapter_id']; ?>
"></a>
					 <?php endif; ?>
					 
					 </td>
					
					</tr>
					
			<?php endfor; endif; ?>	
			
			
			</tbody>
			</table>
			
            <div id="paging_of_event_list" class="paging">
            
            </div>
			
		
        </div><!-- end .event -->
    </div><!-- end #container -->
</div><!-- end #home -->


<script type="text/javascript">
	getpaging(0,<?php echo $this->_tpl_vars['total']; ?>
,"paging_of_event_list","paging_ajax_event",10);
</script>

<script>
<?php echo '
function paging_ajax_event(fungsi,start){ 
var status=$(\'.status option:selected\').val();		
var startdate=$(\'.startdate\').val();
var enddate=$(\'.enddate\').val();	
var listchapter=$(\'.listchapter option:selected\').val();	
var search=$(\'.search\').val();	
var category=$(\'.category option:selected\').val();	
var kota=$(\'.kota option:selected\').val();
				
	$.post(basedomain+"eventmanagement/pagingevent",{\'start\':start,\'ajax\':1,\'status\':status,\'startdate\':startdate,\'enddate\':enddate,\'category\':category,\'search\':search,\'listchapter\':listchapter},function(response){
	
		if(response){
			  if(response.status==true){
				var str="";
			
				$.each(response.data,function(k,v){
		
						str+=\'<tr>\';
						str+=\'<td>\'+v.no+\'</td>\';
						str+=\'<td>\'+v.names+\'</td>\';
						str+=\'<td>\'+v.name_type+\'</td>\';
						str+=\'<td>\'+v.time_start+\'</td>\';
						str+=\'<td>\'+v.time_end+\'</td>\';
						str+=\'<td>\'+v.alamat+\'</td>\';
						str+=\'<td>\';
						if(v.upload_foto!=0){
						$.each(v.upload_foto,function(kk,vv){
							str+=\'<a href="#popup-imgbig" class="showPopup">\';
							if(vv.name)
							{
							str+=\'<img src="\'+basedomainpath+\'public_assets/uploadfoto/\'+vv.name+\'" class="avatarnya" width="40" height="40"></a>\';
							}
						});
						}
						str+=\'</td>\';
						if(v.name_chapter)
						{
						str+=\'<td>\'+v.name_chapter+\'</td>\';
						}else{
						str+=\'<td></td>\';
						}
						str+=\'<td>\'+v.date_create+\'</td>\';
						/**str+=\'<td>\'+v.jumlahundangan+\'</td>\';**/	
						str+=\'<td>\'+v.poin+\'</td>\';	
						str+=\'<td>\'
						
						if (v.stat==1){str+=\'Approved\';}else if(v.stat==0){str+=\'Inactived\';}else if(v.stat==3){str+=\'Finished\';}else if(v.stat==4){str+=\'Rejected\';}str+=\'</td>\';
						if(v.stat==0){
							str+=\'<td><a href="\'+basedomain+\'eventmanagement?paramactive=\'+v.id+\'" style="color:#19CFA8;">Approve</a> | <a href="javascript:void(0)" onClick="confirmation(\\\'\'+basedomain+\'eventmanagement?paramcancel=\'+v.id+\'\\\',\\\'Confirm to Delete?\\\')" style="color:#19CFA8;">Delete</a> | <a href="\'+basedomain+\'eventmanagement/editevent/\'+v.id+\'" style="color:#19CFA8;">Edit</a> | <a href="\'+basedomain+\'eventmanagement?paramreject=\'+v.id+\'" style="color:#19CFA8;">Reject</a></td>\';
						}	
						else if(v.stat==\'1\' && v.name_type==\'Supersoccer\'){
                            str+=\'<td><a href="javascript:void(0)" onClick="confirmation(\\\'\'+basedomain+\'eventmanagement?paramcancel=\'+v.id+\'\\\',\\\'Confirm to Delete?\\\')" style="color:#19CFA8;">Delete</a> | <a href="\'+basedomain+\'eventmanagement/editevent/\'+v.id+\'" style="color:#19CFA8;">Edit</a></td>\';
                                                }
						else if(v.stat==1){
							str+=\'<td><a href="javascript:void(0)" onClick="confirmation(\\\'\'+basedomain+\'eventmanagement?paramcancel=\'+v.id+\'\\\',\\\'Confirm to Delete?\\\')" style="color:#19CFA8;">Delete</a> | <a href="\'+basedomain+\'eventmanagement/editevent/\'+v.id+\'" style="color:#19CFA8;">Edit</a> \';  
							if(v.upload_foto!=0){
							str+=\' | <a href="\'+basedomain+\'eventmanagement?paramfinish=\'+v.id+\'&&idchapter=\'+v.chapter_id+\'" style="color:#19CFA8;">Finish</a>\';
							}
							str+=\'</td>\';
						}
						else if(v.stat==3){
							str+=\'<td></td>\';
						}
						else if(v.stat==4){
                                                        str+=\'<td></td>\';
                                                }
						
						/**str+=\'<td><a href="\'+basedomain+\'eventmanagement?paramactive=\'+v.id+\'" style="color:#19CFA8;">Approve</a>   <a href="\'+basedomain+\'eventmanagement?paramcancel=\'+v.id+\'" style="color:#19CFA8;">Delete</a>  <a href="\'+basedomain+\'eventmanagement/editevent/\'+v.id+\'" style="color:#19CFA8;">Edit</a>\';
						if(v.name_type!=\'Supper Soccer\')
						{
						str+=\' <a href="\'+basedomain+\'eventmanagement?paramfinish=\'+v.id+\'&&idchapter=\'+v.chapter_id+\'&&pointnya=\'+v.point+\'" style="color:#19CFA8;">Finish</a>\';
						}
						str+=\'</td>\'**/
						
						if(v.name_type==\'Supersoccer\' && v.stat==\'1\')
						{
						str+=\'<td><a href="#popup-eventbig" class="showPopup"><input type="submit" class="button2 idinput" style="margin-top:0px;" value="Insert" idnya="\'+v.id+\'" chapteridnya="\'+v.chapter_id+\'"></a></td>\';						
						}else{
						str+=\'<td></td>\';
						}
						str+=\'</tr>\';
						
						});
						$(\'.pagilist\').html(str);
						$(\'.showPopup\').magnificPopup({
							type:\'inline\',
							midClick: true 
						});
						
						
						likeunlike();	
					
				}
			}
		},"JSON");
	}
	
'; ?>

	</script>
	
	
<script>
<?php echo '
//select bootstarp

$(\'.selectpicker\').selectpicker();
likeunlike();

function likeunlike(){

$(document).ready(function(){
			$(".checkactive").on("click", function(){
			var idnya=$(this).val();
			var thisnya=$(this);
					  $.ajax({
                        \'type\': \'POST\',
                        \'url\': basedomain+\'eventmanagement/checkit\',
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
										\'url\': basedomain+\'eventmanagement/incheckit\',
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
                        \'url\': basedomain+\'eventmanagement/incheckit\',
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