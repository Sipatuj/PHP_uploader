<?php session_start();
error_reporting(0);
 if(isset($_GET['progress_key']) and !empty($_GET['progress_key'])){ 
 $status = apc_fetch('upload_'.$_GET['progress_key']);  
     echo $status['current']/$status['total']*100;
	 $key = ini_get("session.upload_progress.prefix") . $_POST[ini_get("session.upload_progress.name")];
var_dump($_SESSION[$key]);
foreach ($_FILES["filename"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["filename"]["tmp_name"][$key];
        $name = $_FILES["filename"]["name"][$key];
        if(!move_uploaded_file($tmp_name, "file/$name")){			/*file/     -- location download files*/
		$msg = 'Файл не загружен';
	  }else{
		  	$msg = "Файл загружен успешно";
		  }
    }
}	

 exit;
 }
?>

<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<title>Upload file</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #4E5869;
	margin: 0;
	padding: 0;
	color: #000;
}


ul, ol, dl { 
padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	
	padding-right: 15px;
	padding-left: 15px; 
	}
a img { 
border: none;
}


a:link {
	color:#414958;
	text-decoration: underline; 
	}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { 
text-decoration: none;
}


.container {
	width: 80%;
	max-width: 1260px;
	min-width: 780px;
	margin: 0 auto; 
	}
.container h2{
	color:#FFF;
	}


.content {
	padding: 10px 0;
}


.content ul, .content ol { 
	padding: 0 15px 15px 40px; 
	}


.fltrt { 
float: right;
	margin-left: 8px;
}
.fltlft { 
float: left;
	margin-right: 8px;
}
.clearfloat { 
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style></head>

<body>

<div class="container">
  <div class="content">
  
  <h2>Download file</h2><br >
  <form action="" method="post" enctype="multipart/form-data" />
  <input type="hidden" name="<?=ini_get("session.upload_progress.name")?>" value="uniqueValue"/>
  <input name="filename[]" type="file" multiple /><br />
  <input type="submit" value="Download" /><br />
  <?=$msg?>
  </form>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>