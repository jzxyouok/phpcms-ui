<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo L('phpcms_logon')?></title>
<meta name="description" content="<?php echo L("copyright")?>" />
<meta name="keywords" content="<?php echo L("copyright")?>--官方网址：<?php echo L('system_url')?>" />
<script language="JavaScript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
</head>
<body onload="javascript:document.myform.username.focus();">
<div id="login">
	<div id="logo">
		<img src="<?php echo IMG_PATH?>admin_img/logo.png" alt="">
	</div>
	<h2><?php echo L("copyright")?></h2>
	<form action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform">
		<table class="table">
			<tr>
				<td><?php echo L('username')?>：</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td><?php echo L('password')?></td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td><?php echo L('security_code')?></td>
				<td><input name="code" type="text" class="ipt ipt_reg" onfocus="document.getElementById('yzm').style.display='block'" /><div id="yzm" class="yzm">
				<?php echo form::checkcode('code_img')?><a href="javascript:document.getElementById('code_img').src='<?php echo SITE_PROTOCOL.SITE_URL.WEB_PATH;?>api.php?op=checkcode&m=admin&c=index&a=checkcode&time='+Math.random();void(0);"><?php echo L('click_change_validate')?></a></div></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="登陆账号" /></td>
			</tr>
		</table>
	</form>
</div>
<style>
	html,body{padding: 0px; margin:0px; background: #0e90d2;height: 100%;width: 100%;}
	a{text-decoration: none;}
	#logo{background: #ffffff; border:20px solid #ffffff; border-radius: 100%; overflow: hidden; width: 80px; height: 80px; position: absolute; top: -110px; left: 50%; margin-left:-50px; }
	#logo img{display: block; text-align: center; width: 80px; height: 80px;background-size: 50%; }
	#login{color:#fff; width: 500px; background: #0e90d2; border: 20px solid #ffffff; border-radius: 5px; position: absolute; top: 50%; left: 50%; margin-left: -250px; margin-top: -150px; height: 300px; }
	#login h2{height: 30px; line-height: 30px; text-align: center;font-size: 26px; font-weight: bold;}
	#code_img{ border:1px solid #ccc;float: left; margin-right: 10px;}
	.table{padding: 10px 35px;}
	#yzm a{line-height: 40px; color:#fff; text-align: center;; height: 40px; font-size: 12px;}
	input{background: #fff;font-size: 20px; font-weight: bold;}
	input[type=text],input[type=password]{background: #fff;text-indent: 10px; width: 350px; height: 40px; border:1px solid #ccc;}
	input[name=code]{width: 30%;float: left; margin-right: 10px;}
	input[type=submit]{cursor: pointer; margin: 5px auto; background: #ffffff; font-size: 20px; font-weight: bold; color:#000; width: 350px; height: 40px; border:none;}
</style>
</body>
</html>