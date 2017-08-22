<?php /* Smarty version 2.6.13, created on 2016-09-15 17:27:47
         compiled from application/web/apps/chapter_login.html */ ?>
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
					<h1 class="headline super hairline">LOGIN<br>MEMBER</h1>
				</header>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form method="post" id="contactForm" class="contact-form" action="<?php echo $this->_tpl_vars['basedomain']; ?>
login/community">
							<div class="form-group">
								<input class="form-control" id="login-email" name="email" placeholder="EMAIL *" type="email" required/>
							</div>
							<div class="form-group">
								<input class="form-control" id="keterangan-event" name="password" placeholder="PASSWORD *" type="password" required>
								<input type="hidden" name="login" value="1">
								<label class="row msgerorr" ><?php echo $this->_tpl_vars['msg']; ?>
</label>
							</div>
							<div class="input-group padding-bottom padding-top" style="width:350px;margin:0 auto;">
								<span class="input-group-addon">
									<input type="checkbox" name="verification" value="1">
								</span>
								<label class="padding-left small">Anda Setuju dengan Syarat dan Ketentuan</label>
							</div><!-- /input-group -->
							<div class="form-group text-center">
								 <a class="btn btn-primary btn-icon submitlogin"  href="javascript:void(0)">
									lOG IN
								</a>
								
								<!-- <img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/btn_kirim.png">
								<input type="image" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/btn_kirim.png"> -->
								<!-- <button class="btn btn-lg sheer" type="submit">
									KIRIM
								</button> -->
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
	$(document).on (\'click\',\'.submitlogin\',function(){		
		$(\'.msgerorr\').html(\'\');
		var valid="";
		if($(\'.email\').val()==\'\' || $(\'.password\').val()==\'\')
		{
			$(\'.msgerorr\').html(\'Username atau Password yang Anda masukan salah.\');
			valid="ada";
		}
		if(valid)
		{
			return false;
		}
		else
		{
			$(\'.contact-form\').trigger(\'submit\');
		}
	});
'; ?>


</script>
