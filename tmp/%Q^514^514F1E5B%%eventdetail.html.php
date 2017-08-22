<?php /* Smarty version 2.6.13, created on 2016-04-15 17:59:19
         compiled from application/web//apps/eventdetail.html */ ?>
<style>
<?php echo '

form { display: block; margin: 20px auto;  border-radius: 10px; padding: 15px }

.progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; top:3px; left:48%; }

'; ?>

</style>
<script src="http://malsup.github.com/jquery.form.js"></script>

<div id="event-detail" class="section">
	<div id="container">
    	<div class="row-2">
            <h1 class="yellow textbg">EVENT DETAIL</h1>
    	</div>
        
       <!--  <div class="row">
            <div id="map-canvas"></div>
        </div> -->
        <div class="row">
            <div class="box-grey">
            	<div class="infoDetailEvent">  
                    <h1 class="yellow textbg"><span class="startDates"><?php echo $this->_tpl_vars['dataevent']['time_start']; ?>
</span>  <span class="dashDates">&ndash;</span> <span class="endDates"><?php echo $this->_tpl_vars['dataevent']['time_end']; ?>
</span></h1>
                    <p class="">Waktu: <?php echo $this->_tpl_vars['dataevent']['jam_awal']; ?>
 - <?php echo $this->_tpl_vars['dataevent']['jam_akhir']; ?>
</p>
                    <h1 class=""><?php echo $this->_tpl_vars['dataevent']['name']; ?>
<br><span class="categoryEvents"><?php echo $this->_tpl_vars['dataevent']['name_type']; ?>
</span></h1>
                    <address><?php echo $this->_tpl_vars['dataevent']['alamat']; ?>
</address>         
                    <p><?php echo $this->_tpl_vars['dataevent']['description']; ?>
</p>
                </div>
            </div>
        </div><!--end.row-->
        
		
		<!--FORM UNTUK SUBMIT FOTO -->
		<form action="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/eventDetail" method="post" enctype="multipart/form-data">
        <div class="rowss" style="overflow:inherit;">
		
			<div style="display:none">
					      <input type="file" class="myfile" id="myfile" name="myfile[]" />
						  <input type="hidden" name="idevent" value="<?php echo $this->_tpl_vars['idevent']; ?>
">
					     
			</div>
				<?php if ($this->_tpl_vars['dataevent']['n_status'] != 0): ?>
            <div class="uploadFoto" style="margin-left:10px;">
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=($this->_tpl_vars['upload_foto'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<div class="imagePost"><img width="150" class="filimg rot<?php echo $this->_sections['i']['index']; ?>
"  src="<?php echo $this->_tpl_vars['basedomain']; ?>
public_assets/uploadfoto/<?php echo $this->_tpl_vars['upload_foto'][$this->_sections['i']['index']]['name']; ?>
" data-row="<?php echo $this->_sections['i']['index']; ?>
">
				<?php if ($this->_tpl_vars['dataevent']['n_status'] == 1): ?>
				<label onclick="delimgst(<?php echo $this->_sections['i']['index']; ?>
)" class="rot<?php echo $this->_sections['i']['index']; ?>
"> x </label>
				<?php endif; ?>
				</div>
				
				<input style='display:none' class='ros<?php echo $this->_sections['i']['index']; ?>
' type="file"  name="myfile[]" value="<?php echo $this->_tpl_vars['localasset']; ?>
uploadfoto/<?php echo $this->_tpl_vars['upload_foto'][$this->_sections['i']['index']]['name']; ?>
"/>
				<input type="hidden" class="rot<?php echo $this->_sections['i']['index']; ?>
" name="imagessementara[]" value="<?php echo $this->_tpl_vars['upload_foto'][$this->_sections['i']['index']]['name']; ?>
">
				<?php endfor; endif; ?><br>
				 <div class="rowss">
                 </div>
			<?php if ($this->_tpl_vars['dataevent']['n_status'] == 4): ?>
				ReJected
			<?php endif; ?>
			<?php if ($this->_tpl_vars['dataevent']['n_status'] == 1 && $this->_tpl_vars['dataevent']['date_start'] <= $this->_tpl_vars['dataevent']['time_now']): ?>
				
				<!--<div <?php if ($this->_tpl_vars['upload_foto'] == ''): ?> style="display:none" <?php endif; ?> id="progressbar"><div  class="progress-label">Loading...</div></div>-->
			<div id="status"></div>
			<div class="progress" style="display:none;">
							<div class="bar"></div >
							<div class="percent">0%</div >
						</div>
						<br>
						
				<a   href="javascript:void(0)" class="button browsfile" id="browsfile">PILIH FILE</a>
				
				<button <?php if ($this->_tpl_vars['upload_foto'] == ''): ?> style="display:none;" <?php endif; ?> href="javascript:void(0)" class="button button2s submitnya " >SIMPAN</button>
				
			<br><p class="infotext" style="margin:10px 0 0 10px;">Maksimal 2 foto, ukuran 1 foto maks. 2MB (format JPG, JPEG, PNG)</p>
			<?php endif; ?>
		  </div>
		   <?php endif; ?>
        </div>
		</form>
		
		        
    </div><!--end#container-->
</div><!--end.section-->
 
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
 <script>
<?php echo '
(function() {
    
var bar = $(\'.bar\');
var percent = $(\'.percent\');
var status = $(\'#status\');
   
$(\'form\').ajaxForm({
	
    beforeSend: function() {
	$(\'.progress\').show();
        status.empty();
        var percentVal = \'0%\';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + \'%\';
        bar.width(percentVal)
        percent.html(percentVal);
		//console.log(percentVal, position, total);
    },
    success: function() {
        var percentVal = \'100%\';
        bar.width(percentVal)
        percent.html(percentVal);
    },
	complete: function(xhr) {
		
		location.reload();
	}
}); 

})();   
'; ?>
    
</script>
<script>

var urt=0;
<?php echo '
$(\'.browsfile\').click(function(e)
 {
	console.log($(\'.filimg\').length);
	console.log($(\'.myfile\').length);
	if($(\'.filimg\').length < 2  )
	{
		console.log($(\'.filimg\').length);
		console.log(\'sss\');
		if(($(\'.myfile\').length >1 && $(\'.myfile\').length<=2) || ($(\'.browsfile\').length >1 && $(\'.browsfile\').length<=2 ))
		{
			$(".myfile:last").trigger(\'click\');
			thiss= $(".myfile:last");
		}
		else if($(\'.myfile\').length==1)
		{
			$(".myfile").trigger(\'click\');
			thiss= $(".myfile");
		}
		else
		{
			
			alert(\'Maaf, Anda hanya bisa mengunggah maksimum 2 foto\');
		}
	}
	else
	{
		alert(\'Maaf, Anda hanya bisa mengunggah maksimum 2 foto\');
	}
	if($(\'.myfile\').length<=2)
	{
		thiss.change(function(e)
		 {
		   
			   e.preventDefault();
				
			    $(".upload_no").html(\'\');
				
				var dataup = $(\'.filimg\').length;
				console.log(this.files[0].size);
				if(this.files[0].size > 2000000)
				{
				
					alert(\'Maaf, Anda hanya bisa mengunggah foto maksimum 2MB\');
					
				}
				else
				{
					++urt;
				   if(this.files[0].type==\'image/jpeg\' || this.files[0].type==\'image/png\' )
					{
						 var reader = new FileReader();
						 reader.onload = function (ex) {
							ex.preventDefault();
							
						 $(\'.browsfile\').prev().before(\' <div class="imagePost  ros\'+urt+\'"><img width="150"  data-row="\'+urt+\'"  class="filimg ros\'+urt+\'" hegiht="50" src="\'+ex.target.result+\'"><label class="ros\'+urt+\'" onclick="delimgs(\'+urt+\')" > x </label></div>  \');
						  }
					  reader.readAsDataURL(this.files[0]);
					  
					  $(this).after(\' <input type="file" class="myfile ros\'+urt+\'" data-row="\'+urt+\'" id="myfile" name="myfile[]" />\');
					  $(\'.submitnya\').show();
					}
				 
				   else
				   {
				   
					alert(\'Silahkan unggah ulang menggunakan file dengan format JPG, JPEG atau PNG\');
				   }
				   end;
				}
			   
				
			   // $(\'browsfile\')
			   // $(\'.bg_home\').attr(\'src\', e.target.result);   

		 });
	 }
	
 });
 
   
  
  
 
 function delimgs(rows)
		{
			
			$(\'.ros\'+rows).remove();
		
		}
 function delimgst(rows)
		{
			
			$(\'.rot\'+rows).remove();
		
		}
		
		

'; ?>



</script>