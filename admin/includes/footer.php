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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$(document).ready(() => {
		$('#logout').click(() => {
			let data = new FormData()
			console.log('logout')
			Swal.fire({
				title: 'Are you sure you want to logout?',
				showCancelButton: true,
				confirmButtonText: 'Logout',
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire('Successfully Logout!', '', 'success').then(() => {
						data.append('choice', 'logout')
						console.log(data)
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
								if (res.status == "200") {
									window.location.href = "../index.php"
								}
							},
							error: function(xhr) {

							},
						});
					})
				}
			})
		})

		$('#updateStudentData').submit((e) => {
			e.preventDefault()
			let data = new FormData(e.currentTarget)
			data.append('choice', 'editdatabtn') 
			sendAjax('./model/router.php', data).then(res => {
				console.log(res)
				if (res.status == "200") {
					Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: res.message,
						showConfirmButton: false,
						timer: 1500
					}).then(() => {
						get_data()
						$('#staticBackdrop').modal('hide')
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: res.message,
					})
				}
			})
		})

		$('#updateUserData').submit((e)=>{
			e.preventDefault() 
			let data = new FormData(e.currentTarget)
			data.append('choice', 'updateUserData') 
			sendAjax('./model/router.php', data).then(res => {
				console.log(res)
				if (res.status == "200") {
					Swal.fire({
						position: 'top-center',
						icon: 'success',
						title: res.message,
						showConfirmButton: false,
						timer: 1500
					}).then(() => {
						get_Userdata()
						$('#get_Userdata').modal('hide')
					})
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: res.message,
					})
				}
			})
		})

		get_data()
		get_Userdata()
	})

	const get_data = () => {
		let data = new FormData()
		data.append('choice', 'get_data')
		myAjax('./model/router.php', data).then(res => {
			let str = ''
			$.each(res, (r, e) => {
				str += `<tr> 
							<td>${e['id']}</td>
							<td>${e['firstname']}</td>
							<td>${e['middlename']}</td>
							<td>${e['lastname']}</td>
							<td>${e['idnumber']}</td>
							<td>${e['address']}</td>
							<td>${e['section']}</td>
							<td>${e['fblink']}</td>
							<td><button type="button" onclick="viewstudentdata(${e['id']})" data-bs-toggle="modal" data-bs-target="#viewStudentData" style="color:black;">View</button></td> 
							<td><button type="button" onclick="editdatabtn(${e['id']})" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color:black;">Edit</button></td> 
							<td><button type="button" onclick="deletedatabtn(${e['id']})" style="color:black;">Delete</button></td> 
						</tr>`
			})
			$('#sd_body_tbl').html(str)
		})
	}

	const get_Userdata = () => {
		let data = new FormData()
		data.append('choice', 'ud_body_tbl')
		myAjax('./model/router.php', data).then(res => {
			let str = '' 
			$.each(res, (r, e) => { 
				str += `<tr> 
							<td>${e['user_id']}</td>
							<td>${e['firstname']}</td>
							<td>${e['middlename']}</td>
							<td>${e['lastname']}</td>
							<td>${e['email']}</td>
							<td>${e['address']}</td>
							<td>${e['zipcode']}</td>
							<td>${e['telephone']}</td>
							<td>${e['gender']}</td> 
							<td><button type="button" onclick="edituserdatabtn(${e['user_id']})" data-bs-toggle="modal" data-bs-target="#get_Userdata" style="color:black;">Edit</button></td> 
							<td><button type="button" onclick="deleteuserdatabtn(${e['user_id']})" style="color:black;">Delete</button></td> 
						</tr>`
			})
			$('#ud_body_tbl').html(str)
		})
	}

	const myAjax = (url, data = {}) => {
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

	const viewstudentdata = (id) => {
		let data = new FormData()
		data.append('id', id)
		data.append('choice', 'viewstudentdata')
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
				console.log('e', res)
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
				$('#vsd_body_tbl').html(str)
			},
			error: function(xhr) {

			},
		});
	}

	const edituserdatabtn = (id) => { 
		let data = new FormData();
		data.append('id', id)
		data.append('choice', 'get_UserdataById')
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
				$("div.formmodal").children('input[name="hiddenuserid"]').val(data[0].user_id);
				$("div.formmodal").children('input[name="firstname"]').val(data[0].firstname);
				$("div.formmodal").children('input[name="middlename"]').val(data[0].middlename);
				$("div.formmodal").children('input[name="lastname"]').val(data[0].lastname);
				$("div.formmodal").children('input[name="email"]').val(data[0].email);
				$("div.formmodal").children('input[name="address"]').val(data[0].address);
				$("div.formmodal").children('input[name="zipcode"]').val(data[0].zipcode);
				$("div.formmodal").children('input[name="telephone"]').val(data[0].telephone);
				$("div.formmodal").children('input[name="gender"]').val(data[0].gender);
			},
			error: function(xhr) {

			},
		});
	}

	const deleteuserdatabtn = (id) => {
		let data = new FormData();
		data.append('id', id)
		data.append('choice', 'deleteuserdatabtn')
		Swal.fire({
			title: 'Are you sure you want to delete?',
			html: 'You will not be revert this',
			showCancelButton: true,
			confirmButtonText: 'Confirm',
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire('Successfully Deleted!', '', 'success').then(() => {
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
							get_Userdata()
						},
						error: function(xhr) {

						},
					});
				})
			}
		})
	}

	const editdatabtn = (id) => {
		console.log(id)
		let data = new FormData();
		data.append('id', id)
		data.append('choice', 'get_dataById')
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
				$("div.formmodal").children('input[name="hiddenstudentid"]').val(data[0].id);
				$("div.formmodal").children('input[name="firstname"]').val(data[0].firstname);
				$("div.formmodal").children('input[name="firstname"]').val(data[0].firstname);
				$("div.formmodal").children('input[name="middlename"]').val(data[0].middlename);
				$("div.formmodal").children('input[name="lastname"]').val(data[0].lastname);
				$("div.formmodal").children('input[name="address"]').val(data[0].address);
				$("div.formmodal").children('input[name="section"]').val(data[0].section);
				$("div.formmodal").children('input[name="fblink"]').val(data[0].fblink);
			},
			error: function(xhr) {

			},
		});
	}

	const deletedatabtn = (id) => {
		let data = new FormData();
		data.append('id', id)
		data.append('choice', 'deletedatabtn')
		Swal.fire({
			title: 'Are you sure you want to delete?',
			html: 'You will be revert this',
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
							console.log(data)
							get_data()
						},
						error: function(xhr) {

						},
					});
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