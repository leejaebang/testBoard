<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>ELSOL-COMPANY Chart_Sol</title>
<?php include './common/cssmain.php';?>
</head>

<body id="mimin" class="dashboard">
<!-- start: Header -->
	<nav class="navbar navbar-default header navbar-fixed-top">
		<div>
			<div class="navbar-header" style="width: 100%; background-image: url('./css/images/menutop2.jpg');">
				<!--<div class="opener-left-menu is-open">
					<span class="top"></span> 
					<span class="middle"></span> 
					<span class="bottom"></span>
				</div> -->
				
				<div>
				<a href="./hidden.php">
					<!-- <div class="col-md-1" style='margin-left: 0px;'><img src='./css/images/menutop.jpg' /></div> -->
					<div style='margin-left: 20px;'><h1>Hidden Image Manager</h1></div>
				</a>
				</div>
			</div>
		</div>
	</nav>
<!-- end: Header -->


<?php include './common/jsmain.php';?>

<!-- start: modal-->
	
		<div class="modal" id="dataModal" style="margin-top: 50px;">
			<div class="modal-dialog" style="width:50%;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="bbslist_modal"></div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	
<!-- end: modal-->

<!-- start: content-->
<!-- <div id="content"> -->
		<div class="tabs-wrapper text-center">
			<div class="col-md-12 tab-content">

				<!----- start: sub-content --------->
					
				
					<div style="margin-top: 0px;">
							<div id="bbslist">
