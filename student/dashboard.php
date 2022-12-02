<?php

session_start();
if (!$_SESSION['userdata']) {
	header('location: ./index.php');
} 
$session = $_SESSION['userdata'];
date_default_timezone_set("Asia/Manila");

?>

<!DOCTYPE html>

<html lang="en-PH">
<head>
	<meta charset="UTF-8">
	<title>Dashboard | Cyber Attendance</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Redolosa Eric J.">
	<meta name="description" content="Cyber Attendance for CPC Students">
	<meta name="keywords" content="IT Services, Cyber Security, Network Configuration">

	<link rel="stylesheet" type="text/css" href="../assets/css/dashboardStyle.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" type="image/x-icon" href="../assets/Images/CySecLogo.ico">

	<style>
		button {
			border: none;
			padding: 10px;
			border-radius: 15px;
			margin-top: 10px;
		}

		button:hover {
			transform: scale(1.2);
		}

		.center {
			margin-left: auto;
			margin-right: auto;
		}
	</style>
</head>

<body>

	<header class="mainHeader">
		<div class="attendance">
			<i class="fa-solid fa-user-check"></i>
			<h1><span style="color:#e37d10">CYBER</span> ATTENDANCE</h1>
		</div>
		<button type="button" onclick="logout()" id="logout">Logout</button>
	</header>

	<section id="mainSection">
		<div class="userInputs">
			<h2><span style="color:#e37d10">Student</span> information</h2>
			<hr style="border:2px solid #000000"><br>
		</div>
		<div class="credentials">
			<div class="faSection">
				<i class="fa-solid fa-user-graduate"></i>
			</div>
			<div class="studentInformation">
				<p><b>Name:</b> <span class="font-semibold" id="fname"><?= $session['firstname'] . " " . $session['middlename'] . " " . $session['lastname']; ?></span></p>
				<p><b>ID#:</b> <span class="font-semibold" id="uid"><?= $session['idnumber']; ?></span></p>
				<p><b>Section:</b> <span class="font-semibold" id="section"><?= $session['section']; ?></span></p>
				<p><b>Address:</b> <span class="font-semibold" id="address"><?= $session['address'];  ?></span></p>
			</div>
			<div class="timeButtons">
				<p><strong>Time:</strong> <span class="font-semibold"><?= date("h:i:sa"); ?></span></p>
				<div style="display: flex; flex-direction: column;">
					<button type="button" onclick="timein(<?= $session['id']; ?>)" id="timeinid"><i class="fa-solid fa-clock"></i> Time-in</button>
					<button type="button" onclick="timeout(<?= $session['id']; ?>)" id="timeoutid" class="border-solid bg-teal-600 px-3 py-2 text-neutral-50 text-sm rounded-md cursor-pointer hover:bg-teal-700"><i class="fa-solid fa-clock"></i> Time-out</button>
				</div>
			</div>
		</div>
		<!-- 
			<div class="container">
				<div class="container d-flex justify-content-center">

				</div>
			</div>
		-->
		<table id="table" style="width:50%">
			<thead>
				<tr>
					<th><span style="color:#e37d10">Da</span>te</th>
					<th><span style="color:#e37d10">Sta</span>tus</th>
					<th><span style="color:#e37d10">Time</span> IN</th>
					<th><span style="color:#e37d10">Time</span> OUT</th>
				</tr>
			</thead>
			<tbody id="tbody_tbl"></tbody>
		</table>
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
		$(document).ready(function() {
			get_data()
		});

		const logout = () => {
			let data = new FormData()
			data.append('choice', 'logout')
			Swal.fire({
				title: 'Are you sure you want to logout ?',
				showCancelButton: true,
				confirmButtonText: 'Logout',
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire('Successfully Logout!', '', 'success').then(() => {
						$.ajax({
							type: 'POST',
							url: './model/router.php',
							data: data,
							dataType: 'json',
							async: false,
							processData: false,
							contentType: false,
							beforeSend: function() {},
							success: function(data) {
								window.location.href = "./index.php"
							},
							error: function(xhr) {

							},
						});
					})
				}
			})
		}

		const get_data = () => {
			let data = new FormData()
			data.append('id', <?= $session['id']; ?>)
			data.append('choice', 'get_data')
			$.ajax({
				type: 'POST',
				url: './model/router.php',
				data: data,
				dataType: 'json',
				async: false,
				processData: false,
				contentType: false,
				beforeSend: function() {},
				success: function(res) {
					let str = ''

					$.each(res, (r, e) => {
						if (e['id'] != undefined) {
							str += `<tr>
										<td>${e['datenow']}</td>
										<td>${e['status']}</td>
										<td>${e['time_in']}</td>
										<td>${e['time_out']}</td>
									</tr>`
						} else {
							str += `<tr> 
										<td> No Records Found! </td>
										<td> No Records Found! </td>
										<td> No Records Found! </td>
										<td> No Records Found! </td>
									</tr>`
						}
					})
					$('#tbody_tbl').html(str)
				},
				error: function(xhr) {

				},
			});
		}

		const timein = (id) => {
			let data = new FormData()
			data.append('id', id)
			data.append('choice', 'timein')
			datenow(id).then(res => {
				if (res == 'true') {
					Swal.fire({
						position: 'top-center',
						icon: 'error',
						title: 'you are already time in',
						showConfirmButton: false,
						timer: 1500
					})
				} else {
					$.ajax({
						type: 'POST',
						url: './model/router.php',
						data: data,
						dataType: 'json',
						async: false,
						processData: false,
						contentType: false,
						beforeSend: function() {},
						success: function(data) {
							console.log(data)
							if (data.status == '200') {
								Swal.fire({
									position: 'top-center',
									icon: 'success',
									title: data.message,
									showConfirmButton: false,
									timer: 1500
								}).then(() => {
									get_data()
								})
							} else {
								Swal.fire({
									position: 'top-center',
									icon: 'error',
									title: data.message,
									showConfirmButton: false,
									timer: 1500
								})
							}
						},
						error: function(xhr) {

						},
					});
				}
			})
		}

		const timeout = (id) => {
			let data = new FormData()
			data.append('id', id)
			data.append('choice', 'timeout')
			$.ajax({
				type: 'POST',
				url: './model/router.php',
				data: data,
				dataType: 'json',
				async: false,
				processData: false,
				contentType: false,
				beforeSend: function() {},
				success: function(data) {
					console.log(data)
					if (data.status == '200') {
						Swal.fire({
							position: 'top-center',
							icon: 'success',
							title: 'you are time out',
							showConfirmButton: false,
							timer: 1500
						}).then(() => {
							get_data()
						})
					} else {
						Swal.fire({
							position: 'top-center',
							icon: 'error',
							title: data.message,
							showConfirmButton: false,
							timer: 1500
						})
					}
				},
				error: function(xhr) {

				},
			});
		}

		const datenow = (id) => {
			let data = new FormData()
			data.append('id', id)
			data.append('choice', 'checkdate')
			let promise = new Promise((resolve) => {
				$.ajax({
					type: 'POST',
					url: './model/router.php',
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
			})
			return promise
		}
	</script>

</body>
</html>