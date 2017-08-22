<?php /* Smarty version 2.6.13, created on 2016-11-18 16:23:04
         compiled from application/web/apps/chapter_login.html */ ?>
<div id="content" role="main">
	<div class="centered-red-box">
		<section class="section-login" style="padding-top:50px">
			<div class="container">
				<header class="section-header no-border">
					<figure>
						<img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/supersoccer-logo.png">
					</figure>
				</header>
				<header class="section-header">
					<h1 class="headline super hairline">LOGIN</h1>
				</header>
				<div class="row">
					<p class="text-center">Masukan Alamat Email<br>dan Password Anda.</p>
					<div class="col-md-6 col-md-offset-3 super-form">
						<form method="post" id="contactForm" class="contact-form sscr-login" action="<?php echo $this->_tpl_vars['basedomain']; ?>
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
							<div class="input-group padding-bottom padding-top agreement">
								<span class="input-group-addon">
									<input type="checkbox" name="verification" value="1">
								</span>
								<label>Anda Setuju dengan Syarat dan Ketentuan</label>
							</div>
							<div class="form-group text-center">
								<a href="javascript:void(0)" class="submitlogin"><img src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/images/btn_kirim.png"></a>
							</div>
							<div class="form-group text-center">
								 <a href="<?php echo $this->_tpl_vars['basedomain']; ?>
login/forgotpassword">
									Forgot Password
								</a>
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
