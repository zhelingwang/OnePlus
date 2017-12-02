<?php if(!isset($_SESSION)){session_start();} if(!isset($_SESSION['adminName'])) { echo "<script>window.location.href='./login.php'</script>"; die; } ?>
<div class="header">
<div id="head" style="background-color: #fff"><!---head---->
	<h1><a href="index.php"><img src="./images/brand.png" style="vertical-align: bottom;"></a>&nbsp;&nbsp;一加手机网上商城后台管理系统</h1>
	<div id="welcome">
      	<span>管理员:&nbsp;&nbsp;</span>
      	<span id="user" >
		<?php 
		if(isset($_SESSION['adminName'])){
			echo $_SESSION['adminName'];
		}else{
			//echo "nouser";
			echo "游客";
			//echo "<script>window.location.href='login.php';</script>";
		}
		?>
		</span>
      	<span>&nbsp;&nbsp;欢迎你!&nbsp;&nbsp;</span>		  
      	<span id="login_out" ><a style="text-decoration:none;" href="../Api/adminApi.php?act=logout" >[安全退出]</a></span>   
	</div>
</div><!---head---->
</div>
