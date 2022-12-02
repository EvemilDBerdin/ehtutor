<!DOCTYPE html>

<html lang="en-PH">
<head>
    <meta charset="UTF-8">
    <title>Registration | Cyber Security</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Redolosa Eric J.">
    <meta name="description" content="Cyber Security is everyone's responsibility">
    <meta name="keywords" content="IT Services, Cyber Security, Hardware Security, Offensive Wireless Security, Network Configuration, Awareness, Basic Terms, Networking">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>

<body>
    <div class="form-outside-container">
        <div class="form-inside-container">
            <div class="student-logo">
                <img src="./assets/Images/CCLogo.png" alt="Student Logo" style="height:70px; width:70px">
                <h3 style="color:#ffffff"><span style="color:#E37D10">Cyber</span> Form</h3>
                <hr><br>
                <input type="reset" value="Reset" form="thisForm">
                <button type="button" onclick="login()">Login</button>
            </div>

            <form onsubmit="myFunction(event); event.preventDefault();" method="POST" id="thisForm">
                <label for="firstname"><span style="color:#E37D10">First</span>name</label><br>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" required><br>

                <label for="middlename"><span style="color:#E37D10">Midle</span>name</label><br>
                <input type="text" id="middlename" name="middlename" placeholder="Midlename" required><br>

                <label for="lastname"><span style="color:#E37D10">Last</span>name</label><br>
                <input type="text" id="lastname" name="lastname" placeholder="Lastname" required><br>

                <label for="email"><span style="color:#E37D10">Ema</span>il</label><br>
                <input type="email" id="email" name="email" placeholder="Email" required><br>

                <label for="password"><span style="color:#E37D10">Pass</span>word</label><br>
                <input type="password" id="password" name="password" placeholder="Enter Password" required><br>

                <label for="address"><span style="color:#E37D10">Add</span>ress</label><br>
                <input type="text" id="address" name="address" placeholder="Address" required><br>

                <label for="zipcode"><span style="color:#E37D10">Zip</span>code</label><br>
                <input type="text" id="zipcode" name="zipcode" placeholder="Zipcode" required><br>

                <label for="telephone"><span style="color:#E37D10">Tel</span>ephone</label><br>
                <input type="tel" id="telephone" name="telephone" placeholder="Telephone" required><br>

                <h4><span style="color:#E37D10">Select</span> Gender</h4>
                <hr><br>

                <select name="gender">
                    <option value="male"><span style="color:#E37D10">Ma</span>le</option>
                    <option value="female"><span style="color:#E37D10">Fe</span>male</option>
                    <option value="others"><span style="color:#E37D10">Oth</span>ers</option>
                </select>
                <br>

                <div style="margin-top: 10px;">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div style="margin-bottom: 40px"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const login = () => {
            window.location.href = 'index.php'
        }

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