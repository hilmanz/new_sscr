<?php /* Smarty version 2.6.13, created on 2016-09-13 19:48:31
         compiled from application/web/apps/chapter_eventtambah.html */ ?>
  
  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/css/datepicker/jquery-ui.css">
  
  <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/datepicker/jquery.js"></script>
  <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/datepicker/jquery-ui.js"></script>
  <script>
  <?php echo '
  $( function() {
    $( "#datetimepicker1" ).datepicker();
	$( "#datetimepicker2" ).datepicker();
	$( "#datetimepicker3" ).datepicker();
	$( "#datetimepicker4" ).datepicker();
  } );
  '; ?>

  </script>
  
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
                                <h1 class="headline super hairline">TAMBAH<br>EVENT</h1>								
                            </header>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <form id="contactForm" class="contact-form" method="post" action="<?php echo $this->_tpl_vars['basedomain']; ?>
chapter/prosesadEvent">
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="nama-event" name="placename" placeholder="NAMA EVENT *" type="text" required/>
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <input class="form-control" id="keterangan-event" name="events" placeholder="KETERANGAN EVENT *" type="text" required>
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="form-group form-icon-group">
                                            <select class="form-control catevent" id="kategori-event" name="catevent" type="text">
                                                <option>EVENT 01</option>
                                                <option>EVENT 02</option>
                                                <option>EVENT 03</option>
                                                <option>EVENT 04</option>
                                                <option>EVENT 05</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <h4 class="margin-left padding-bottom padding-top">WAKTU EVENT</h4>
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group">
                                                    <div class='input-group date' >
                                                        <input type='text' name="tgl1" class="form-control" id='datetimepicker1' placeholder="15-09-2016" value="15-09-2016"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group">
                                                    <div class='input-group date'>
                                                        <input type='text' name="tgl2" class="form-control"  id='datetimepicker2' placeholder="15-09-2016" value="15-09-2016"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group">
                                                    <div class='input-group date'>
                                                        <input type='text' name="jam1" class="form-control"  id='datetimepicker3'  placeholder="01:00:00" value="01:00:00"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-icon-group">
                                                    <div class='input-group date'>
                                                        <input type='text' name="jam2" class="form-control"  id='datetimepicker4' placeholder="23:00:00" value="23:00:00"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-icon-group">
                                            <textarea class="form-control" id="alamat-event" name="alamat" placeholder="ALAMAT" rows="10" required></textarea>
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary btn-icon btn-icon-right submitevent" type="submit">
                                                TAMBAH EVENT
                                                <div class="hex-alt">
                                                    <i class="fa fa-plus-square"></i>
                                                </div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div><!-- /.centered-red-box -->

        <a class="go-top hex-alt" href="javascript:void(0)">
            <i class="fa fa-angle-up"></i>
        </a>
       <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	    <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/packages.min.js"></script>
        <script src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/theme.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/moment.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/transition.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/collapse.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['basedomain']; ?>
assets/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript">
		<?php echo '
		
			$(document).on(\'click\',\'.submitevent\',function(){
			
			alert("cek");
			});
            $(function () {
                $(\'#datetimepicker1\').datetimepicker();
                $(\'#datetimepicker2\').datetimepicker({
                    useCurrent: false //Important! See issue #1075
                });
                $("#datetimepicker1").on("dp.change", function (e) {
                    $(\'#datetimepicker2\').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker2").on("dp.change", function (e) {
                    $(\'#datetimepicker1\').data("DateTimePicker").maxDate(e.date);
                });

                $(\'#datetimepicker3\').datetimepicker();
                $(\'#datetimepicker4\').datetimepicker({
                    useCurrent: false //Important! See issue #1075
                });
                $("#datetimepicker3").on("dp.change", function (e) {
                    $(\'#datetimepicker4\').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker4").on("dp.change", function (e) {
                    $(\'#datetimepicker3\').data("DateTimePicker").maxDate(e.date);
                });
            });
			'; ?>

        </script>
