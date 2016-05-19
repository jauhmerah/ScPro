<html>
<head>
<title>Upload Form</title>
</head>
<body>
<pre><?php 
if (isset($success)) {
	print_r($success);
	print_r($error);
}elseif (isset($error)) {
	echo $error;
}
?></pre>


<?php echo form_open_multipart('dashboard/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>