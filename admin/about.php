<!DOCTYPE html>

<html lang="en-PH">
<head>
    <meta charset="UTF-8">
    <title>About | Cyber Security</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Redolosa Eric J.">
    <meta name="description" content="Cyber Security is everyone's responsibility">
    <meta name="keywords" content="IT Services, Cyber Security, Hardware Security, Offensive Wireless Security, Network Configuration, Awareness, Basic Terms, Networking">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="styles/aboutStyle.css">
    <link rel="icon" type="image/x-icon" href="../assets/Images/CySecLogo.ico">

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
            <a href="index.php"><img class="logo" src="../assets/Images/CCLogo.png" style="width:60px; height:60px"></img></a>
            <h3><span style="color:#e37d10; font-family:cursive;">Eh</span>Tutor</h3>
        </div>
        <nav>
            <ul class="nav_links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="certificates.php">Certificates</a></li>
                <li><a href="../student">Attendance</a></li>
            </ul>
        </nav>
        <a class="cta" href="#"><input type="search" width="200" name="search" placeholder="Search"></a>
        <a href="javascript:void(0)" id="logout">Logout</a>
    </header>

    <section id="mainSection">
        <div class="mainContent">
            <div class="image">
                <img src="../assets/Images/ehImgSchool.jpg" height="280px" width="275px" alt="Developer Name">
                <center><i><span style="color:#e37d10">Ehrick</span> Rhed</i></center>
            </div>
            <div class="aboutMe">
                <h2><span style="color:#e37d10">About</span> Me</h2>
                <h4><em>A Certified Trained Network Security Consultant</em></h4>
                <h4><em>A Certified Trained Offensive Wireless Security Consultant</em></h4>
                <h4><em>A Certified Penetration Tester</em></h4>
                <h4><em>Software Engineer</em></h4>
                <h4><em>Web Developer</em></h4>
                <h4><em>IT Student</em></h4>
                <p>In our always-connected world where the private information of individuals and organizations is vulnerable to exposure and misuse, cybersecurity is everyone's responsibility because hackers, or malicious threat actors who steal proprietary information don't care about <i>gender, race, culture, beliefs, or nationality.</i> They probe your digital footprint and your Internet-connected computers based on <b>opportunity</b>, often seeking financial gain.</p>
                <br>
                <button><a href="#">Read More</a></button>
            </div>
        </div>
    </section>

<?php include('./includes/footer.php'); ?>