
<html>
<style>
[input=name],[input=password]
{
	margin-top: 0%;
	display: inline-block;
}
.floating
{
	position: relative;
	float:left;
	width:30%;
	height: 40%;
	margin: 8%;
	border:#000000 solid;

}
.header
{
	
	width: 100%;
	height: 20%;
	background-color: green;
	color:white;
}
.line
{	
	margin-left:45%;
	border-left: solid #000000;
	height: 60%;
}
</style>
<body>
	<pre>
		<div class="header">
<h1 style="text-align:center">Login Page</h1></div>
<div class="floating">
	<form action="welcome.php" method="post">
	Username :<input type="text" name="name" placeholder="Student_No or Faculty_No"><br>
	Password :<input type="password" name="password" placeholder="Password"><br><?php session_start(); $msg=""; echo $msg ?>
</form>
	<button type="button"style="color:#000000;opacity:0.8;">Forget Password</button><br>
   	<button type="button"style="color:#000000;opacity:0.8;">Login</button>	<a href="register.php"><button type="button" style="color:#000000;opacity:0.8;">New User ? Sign Up</button></a>
</div><div class="floating"><p><b>Alert! Notice</p><b></div>
<div class="line"></div>
</body>
</html>