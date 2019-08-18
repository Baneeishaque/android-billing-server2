<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Login Page</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "css/all.css";
</style>
</head>
<body>
	<div id="main">
		<div id="header">
			<a href="index.php" class="logo"><img src="img/logos.jpeg"
				width="501" height="50" alt="" /></a>
			<ul id="top-navigation">
				<li class="active"><span><span><a href="index.php">Login</a></span></span></li>

			</ul>
		</div>
		<div id="middle">
			<div id="left-column"></div>
			<div id="center-column">
				<div class="table">
					<img src="img/bg-th-left.gif" width="8" height="7" alt=""
						class="left" /> <img src="img/bg-th-right.gif" width="7"
						height="7" alt="" class="right" /><br/><br/>
							<table class="listing form" cellpadding="0" cellspacing="0">
								<tr>
									<th class="full" colspan="2">Login Option</th>
								</tr>
								<tr>
									<form action="src/log_action.php" method="post">
										<td class="first" width="172"><strong>Username</strong></td>
										<td class="last"><input type="text" name="username"
											class="text" /></td>
								
								</tr>
								<tr class="bg">
									<td class="first"><strong>Password</strong></td>
									<td class="last"><input type="password" name="password"
										class="text" /></td>
								</tr>
								<tr class="bg">
									<td class="first"></td>
									<td class="first"><input type="submit" value="Login" /></a></td>
								</tr>
								</form>
							</table>
				
				</div>
			</div>
		</div>
	</div>

</body>
</html>
