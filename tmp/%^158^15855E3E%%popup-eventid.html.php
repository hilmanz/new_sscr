<?php /* Smarty version 2.6.13, created on 2016-09-14 17:57:00
         compiled from application/admin/widgets/popup-eventid.html */ ?>
<!-- Pop UP Untuk Nambah Point Event SUPPER SOCCER !-->

<div class="popup popupdetailav" id="popup-img">
    <div id="popup-eventbig" class="popup-container">
		<a class="closePopup" href="#">&nbsp;</a>
    	<div class="popup-content">
		<h4><b><legend><center>INPUT POINT HERE !</legend></b></h4>
		
		<form action="tebakskormanagement/tambahpoint" method="POST">
        	<input type="text" name="pointnya" >
			<input type="hidden" name="memberid" class="memberidnya" >
			<input type="hidden" name="chapterid" class="chapteridnya" >
			<input type="hidden" name="weekid" class="weekidnya" >
			<input type="hidden" name="skor1nya" class="skor1nya" >
			<input type="hidden" name="skor2nya" class="skor2nya" >
			<input type="hidden" name="skor3nya" class="skor3nya" >
			<input type="hidden" name="skor4nya" class="skor4nya" >
			<input type="hidden" name="skor5nya" class="skor5nya" >
			<input type="hidden" name="skor6nya" class="skor6nya" >
			<input type="hidden" name="submit"  value="1">
			<input type="submit"  value="submit" class="button2">
		</form>
        </div>
    </div>
</div>