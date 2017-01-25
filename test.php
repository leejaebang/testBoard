<?php include './common/jqgrid.php';?>

<div style="margin-left: 30px;">
	<form id='myform' action='upload_ok.php' enctype='multipart/form-data' method='post'>
		<input type='file' name='myfile'>
		<button>업로드</button>
	</form>
	<pre id='result'></pre>
</div>


<script type="text/javascript">
$(function() {
	$('#myform').ajaxForm({
		dataType: 'json',
		beforeSend: function() {
			$('#result').append( "beforeSend...\n" );
		},
		complete: function(data) {
			$('#result')
				.append( "complete...\n" )
				.append( JSON.stringify( data.responseJSON ) + "\n" );
		}
	});
});


</script>
