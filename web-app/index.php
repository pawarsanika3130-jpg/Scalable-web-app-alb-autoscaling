<!DOCTYPE html>
<html>
<head>
<title>AWS Auto Scaling Demo</title>
<style>
body{
background:#0f172a;
color:white;
font-family:Arial;
text-align:center;
padding-top:100px;
}

.container{
background:#1e293b;
width:70%;
margin:auto;
padding:30px;
border-radius:15px;
box-shadow:0 0 20px rgba(0,255,255,0.4);
}

h1{
color:#38bdf8;
}

.server{
font-size:22px;
margin-top:20px;
color:#22c55e;
}
</style>
</head>
<body>

<div class="container">
<h1>Scalable Web Application</h1>

<h2>Application Load Balancer + Auto Scaling Group</h2>

<p>This server is running successfully.</p>

<div class="server">
Instance ID:
<?php echo gethostname(); ?>
</div>

</div>

</body>
</html>
