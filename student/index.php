<?php 
    session_start(); 	
	if(isset($_SESSION['userdata'])){
		header('location: ./dashboard.php');
	}
?>

<!DOCTYPE html>

<html lang="en-PH"> 
<head>
	<meta charset="UTF-8">
	<title>Login | Cyber Attendance</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Redolosa Eric J.">
	<meta name="description" content="Cyber Attendance for CPC Students">
	<meta name="keywords" content="IT Services, Cyber Security, Network Configuration">

	<link rel="stylesheet" type="text/css" href="../assets/css/attendanceStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../assets/Images/CySecLogo.ico">
</head>
<body>

	<header class="mainHeader">
		<div class="attendance">
			<i class="fa-solid fa-user-check"></i>
			<h1><span style="color:#e37d10">CYBER</span> ATTENDANCE</h1>
		</div>
		<div class="register">
			<h2>
				<i class="fa-solid fa-plus"></i>
				<a href="./registration.php">REGISTER</a>
			</h2>
		</div>
	</header>

	<section id="mainSection">
		<div class="faSection">
			<i class="fa-solid fa-calendar-check"></i>
		</div>
		<div class="userInputs">
			<h2><span style="color:#e37d10">LOG</span>IN</h2>
			<p>Attendance Application</p>
			<form onsubmit="myFunction(event); event.preventDefault();" method="POST">
				<input type="number" name="idnumber" placeholder="Enter id number" required>
				<input type="password" name="password" placeholder="Password" required><br>
				<div id="submitButton">
					<i class="fa-solid fa-arrow-right-to-bracket"></i>
					<input type="submit" name="submit" value="Submit">
				</div>
			</form>
		</div>
	</section>

<footer id="mainFooter">
	<section class="footerSection">
		<div class="footerContent">
			<div class="content1">
				<a href="#"><b><span style="color:#e37d10">FOR PER</span>SONAL</b></a>
				<a href="#">Windows</a>
				<a href="#">Mac</a>
				<a href="#">iOS</a>
				<a href="#">Android</a>
				<a href="#">VPN Connection</a>
				<a href="#">SEE ALL</a>
			</div>
			<div class="content1">
				<a href="#"><b><span style="color:#e37d10">FOR BUS</span>INESS</b></a>
				<a href="#">Small Businesses</a>
				<a href="#">Mid-size Businesses</a>
				<a href="#">large Enterprise</a>
				<a href="#">Endpoint Proctection</a>
				<a href="#">Endpoint Detection <br>& Response</a>
				<a href="#">Manage Detection <br>and Response (MDR)</a>
			</div>
			<div class="content1">
				<a href="#"><b><span style="color:#e37d10">SOLU</span>TION</b></a>
				<a href="#">Free Rootkit Scanner</a>
				<a href="#">Free Trojan Scanner</a>
				<a href="#">Free Virus Scanner</a>
				<a href="#">Free Spyware <br>Scanner</a>
				<a href="#">Anti Ransomware <br>Protection</a>
				<a href="#">SEE ALL</a>
			</div>
			<div class="content1">
				<a href="#"><b><span style="color:#e37d10">LEA</span>RN</b></a>
				<a href="#">Malware</a>
				<a href="#">Hacking</a>
				<a href="#">Phishing</a>
				<a href="#">Ransomware</a>
				<a href="#">Computer Virus</a>
				<a href="#">Anti Virus</a>
				<a href="#">What is VPN?</a>
			</div>
		</div>
		<div class="contentFooter">
			<div class="logo">
				<img src="../assets/Images/PHLogo.png" alt="Philippines Logo" height="25px" width="50px">
				<h3>PHILIPPINES</h3>
			</div>
			<div class="footerContentLinks">
				<a href="#">Legal</a>
				<a href="#">Privacy</a>
				<a href="#">Accessibility</a>
				<a href="#">Vulnerability Disclosure</a>
				<a href="#">Terms of Service</a>
				<p>&copy; 2022 All Rights Reserved</p>
			</div>
		</div>
	</section>
</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		const myFunction = (e)=>{
			let data = new FormData(e.currentTarget);
			data.append('choice', 'login')

			sendAjax('./model/router.php', data).then(res => {
                if (res.status == "200") {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: res.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=>{
                        window.location.href = './dashboard.php'
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,
                    })
                }
            })
		}

		const sendAjax = (url, data = {}) => {
            var promise = new Promise(function(resolve, reject) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    async: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        resolve(data)
                    },
                    error: function(xhr) {

                    },
                });
            });

            return promise;
        }
	</script>
</body>
</html>