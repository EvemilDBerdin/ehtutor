<?php

session_start();

if (!isset($_SESSION['admindata'])) {
	header('location: ../index.php');
}
$session = $_SESSION['admindata'];

?>

<!DOCTYPE html>

<html lang="en-PH">
<head>
	<meta charset="UTF-8">
	<title>Home | Cyber Security</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Redolosa Eric J.">
    <meta name="description" content="Cyber Security is everyone's responsibility">
    <meta name="keywords" content="IT Services, Cyber Security, Hardware Security, Offensive Wireless Security, Network Configuration, Awareness, Basic Terms, Networking">

	<link rel="stylesheet" type="text/css" href="../assets/css/homeStyle.css">
	<link rel="icon" type="image/x-icon" href="../assets/Images/CySecLogo.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
	<style>
		.center {
			margin-left: auto;
			margin-right: auto;
		}

		#logout {
            transition: all 0.3s ease 0s;
        }

        #logout:hover {
            background-color: rgb(227, 125, 16);
            padding: 8px 25px;
            border-radius: 18px;
            font-weight: 500;
            color: #ffffff;
        }
	</style>
</head>

<body>
	<header class="main_Header">
		<div class="logo_Container">
			<img class="logo" src="../assets/Images/CCLogo.png" style="width:60px; height:60px"></img>
			<h3><span style="color:#e37d10; font-family:cursive;">Eh</span>Tutor</h3>
		</div>
		<nav>
			<ul class="nav_links">
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="projects.php">Projects</a></li>
				<li><a href="certificates.php">Certificates</a></li>
				<?php if ($_SESSION['admindata']['status'] == '1') { ?>
					<li><a href="studentdata.php">Student Data</a></li>
					<li><a href="userdata.php">User Data</a></li>
				<?php } ?>
				<li><a href="../student">Attendance</a></li>
			</ul>
		</nav>
		<input type="search" width="200" name="search" placeholder="Search">
		<a href="javascript:void(0)" id="logout">Logout</a>
	</header>

	<header class="faceHeader" style="background-image:url('../assets/Images/firstCover.png');">
		<div class="headCon">
			<h2><span style="color:#E37D10">CYBER SECURITY</span> IS EVERYONE'S RESPONSIBILITY</h2>
			<p>In our always-connected world where the private information of individuals and organizations is vulnerable to exposure and misuse, cybersecurity is everyone's responsibility because hackers, or malicious threat actors who steal proprietary information don't care about <i>gender, race, culture, beliefs, or nationality.</i> They probe your digital footprint and your Internet-connected computers based on <b>opportunity</b>, often seeking financial gain.</p>
			<p>Technology alone can't protect your identity or sensitive information. Hackers and other threat actors target humans, seeking ways to trick them into giving up vital information unknowingly. They do this because it's the easiest way to get at valuable data in a process known as <i>social engineering.</i>So, it's not surprising that exploited humans are the weakest link in the cybersecurity chain and yet the best hope for preventing a cybersecurity disaster.</p>
			<button type="button"><a href="#title">GET STARTED</a></button>
		</div>
	</header>