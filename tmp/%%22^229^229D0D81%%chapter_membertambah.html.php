<?php /* Smarty version 2.6.13, created on 2016-09-09 17:49:09
         compiled from application/web/apps/chapter_membertambah.html */ ?>
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
                                <h1 class="headline super hairline">TAMBAH<br>MEMBER</h1>
                            </header>

                            <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <!-- <div class="well"> -->
                                            <form method="post" id="fromaddmember" action="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/prosesaddMember" enctype="application/x-www-form-urlencoded" class="contact-form">
                                                <div class="form-group">
                                                    <textarea rows="6" class="form-control emailMember" id="emailmember" name="email" placeholder="ISI EMAIL MEMBER" type="text"></textarea>
													<p class="infotext emailmember_erorr error_red" id="emailmember_error" style="width:100%;"></p>
                                                </div>

                                                <div class="form-group text-center">
                                                    <!-- <a class="btn btn-primary btn-icon"  href="chapter_home.html">
                                                        CHAPTER
                                                    </a>
                                                    <a class="btn btn-primary btn-icon" >
                                                        MEMBER
                                                    </a> -->

                                                </div>
                                            
                                        <!-- </div> -->
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div  class="text-center">
                                                    <p class="small">Maximal 20 email member, setiap email dipisahkan dengan tanda koma (,).</p>
                                                    <p class="small">Contoh: lionel@gmail.com, robin@gmail.com, daniel@yahoo.com, dimas@gmail.co.id</p>
                                                    <a href="javascript:void(0)" class="submitaddmember"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/btn_kirim.png"></a>
                                                </div>
                                            </div>
                                        </div>
										</form>
                                    </div>
                            </div>
                        </div>
                    </section>
                </div><!-- /.centered-red-box -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>				
<script>
<?php echo '
   
	$(document).on(\'click\',\'.submitaddmember\',function(){
		$(\'#emailmember_error\').html(\'\');

		var valid=\'\';
		if($(\'#emailmember\').val()==\'\')
		{
			$(\'#emailmember_error\').html(\'kolom ini harus di isi\');
			valid=\'ada\';
		}
		
		if(valid)
		{
			return false;
		}
		else
		{
			vlidemail(valid);
		}
	})
  


function vlidemail(valid)
{
	var valid= valid;
	emailsplit = $(\'.emailMember\').val().split(\',\');
	emailformat=\'\';
	var emailSame=\'\';
	var ix=0;
	var mailformat = /^\\w+([\\.-]?\\w+)*@\\w+([\\.-]?\\w+)*(\\.\\w{2,15})+$/; 
	if(emailformat==\'\' && emailSame==\'\')
		{
			if(emailsplit.length > 20 )
			{
				$(\'.emailmember_erorr\').html(\'Maximal 20 Email Member\');
				 valid=\'ada\';	
				
			}
		}	
		//console.log(emailsplit);
		$.each(emailsplit,function(ind,value)
		{
			mailnya = value.trim();
			
			if(!mailnya.match(mailformat))  
			{  
				$(\'.emailmember_erorr\').html(\' format email salah (e.g. example@gmail.com)\');
				
				valid=\'ada\';
				emailformat=\'ada\';
				//console.log(mailnya);
			} 
			else
			{
				$.ajax ({ 
					type	 : \'POST\', 
					url	 :  basedomain+\'chapter/checkEmail\' , 
					data:{email:mailnya},
					dataType:\'json\',
					success	: function (result) 
						{
							++ix;
						
							if(result.status==1)
							{
								//console.log(emailSame);
								if(emailSame==\'\')
								{
									emailSame +=result.email;
									
								}
								else
								{
									emailSame +=\',\'+result.email;
								}
								if(emailSame)
									{
										$(\'.emailmember_erorr\').html(\'email <span class="emailsama" > \'+emailSame+\'</span> sudah terdaftar\');
										valid=\'ada\';
									}
							}
							//console.log(valid);
							if(emailsplit.length==ix)
							{
								if(valid)
								{
									return false;
								}
								else
								{
									$(\'#fromaddmember\').trigger(\'submit\');
								}
							}
						}
				});
				
			}
		});
		if(valid)
		{
			return false;
		}
		return false;
		
		

}
'; ?>

</script>