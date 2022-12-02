<?php 
    session_start(); 
    
    if(isset($_SESSION['admindata'])) { 
        header('location: ./admin');
    } 
?>

<!DOCTYPE html>

<html lang="en-PH">
<head>
    <meta charset="UTF-8">
    <title>Login | Cyber Security</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Redolosa Eric J.">
    <meta name="description" content="Cyber Security is everyone's responsibility">
    <meta name="keywords" content="IT Services, Cyber Security, Hardware Security, Offensive Wireless Security, Network Configuration, Awareness, Basic Terms, Networking">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>
    <div class="form-outside-container">
        <div class="form-inside-container">
            <form onsubmit="myFunction(event);" id="main-form" method="POST">
                <div class="student-logo">
                    <img src="./assets/Images/CCLogo.png" alt="Student Logo" style="height:70px; width:70px">
                    <h3 style="color:#ffffff"><span style="color:#E37D10">Cyber</span> Form</h3>
                    <hr><br>

                    <input type="reset" value="Reset">
                    <button type="button" onclick="register()">Register</button>
                </div>

                <label for="email"><span style="color:#E37D10">Ema</span>il</label><br>
                <input type="email" id="email" name="email" placeholder="Enter Email" required><br>

                <label for="password"><span style="color:#E37D10">Pass</span>word</label><br>
                <input type="password" id="password" name="password" placeholder="Enter Password" required><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const register = () => {
            window.location.href = 'registration.php'
        }

        var myFunction = (e) => {
            e.preventDefault()
            let data = new FormData(e.currentTarget)
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
                        window.location.href = './admin'
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: "Account doesn't exist!",
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