<!DOCTYPE html>

<html lang="en-PH">
<head>
	<meta charset="UTF-8">
	<title>Registration | Cyber Attendance</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Redolosa Eric J.">
	<meta name="description" content="Cyber Attendance for CPC Students">
	<meta name="keywords" content="IT Services, Cyber Security, Network Configuration">

	<link rel="stylesheet" type="text/css" href="../assets/css/registrationStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../assets/Images/CySecLogo.ico">
</head>

<body>

	<header class="mainHeader">
		<div class="attendance">
			<i class="fa-solid fa-user-check"></i>
			<h1><span style="color:#e37d10">CYBER</span> ATTENDANCE</h1>
		</div>
		<div class="merged">
			<div class="backToLogin">
				<h2><i class="fa-solid fa-angles-left"></i><a href="./index.php">Back to Login</a></h2>
			</div>
			<div class="needHelp">
				<h2><i class="fa-sharp fa-solid fa-question"></i><a href="./needhelp.php">Need Help</a></h2>
			</div>
		</div>
	</header>

	<section id="mainSection">
		<div class="userInputs">
			<h2><span style="color:#e37d10">Regis</span>tration</h2>
			<p>Fill-in your personal information</p>
			<hr style="border:2px solid #000000"><br>

			<form onsubmit="myFunction(event); event.preventDefault();" method="POST">
				<div class="horizon1">
					<input type="text" name="lastname" placeholder="Lastname" required>
					<input type="text" name="firstname" placeholder="Firstname" required>
					<input type="text" name="middlename" placeholder="Middlename" required>
					<input type="text" name="address" placeholder="Address" required>
				</div><br>
				<div class="horizon2">
					<input type="number" name="idnumber" minlength="8" placeholder="ID #" required>
					<input type="text" name="section" placeholder="Section" required>
					<input type="url" name="fblink" placeholder="Facebook profile link">
				</div><br>
				<div class="horizon3">
					<input type="password" name="password" placeholder="Password" required>
					<input type="password" name="confirmPassword" placeholder="Confirm Password" required>
				</div><br>

				<div id="submitButton">
					<button type="submit">Submit</button>
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

	<script src="https://cdnjs.cloudfl
	are.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		var myFunction = (e) => {
			let data = new FormData(e.currentTarget)
			data.append('choice', 'register')
			console.log(data)
			sendAjax('./model/router.php', data).then(res => {
				if (res.status == "200") {
					Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: res.message,
						showConfirmButton: false,
						timer: 1500
					}).then(() => {
						window.location.href = './index.php'
					})
				} else {
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