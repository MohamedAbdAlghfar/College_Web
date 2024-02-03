<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            background-color: #737CA1;    
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 1480px;
            margin: 0;
            padding: 0;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            /* Make the logo circular */
        }

        

        .navbar {
            overflow: hidden;
            background-color: rgb(0, 0, 0);
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .navbar li {
            float: left;
            margin-left: 13%;
        }

        .navbar li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li a:hover,
        .navbar .dropdown:hover .dropbtn {
            background-color: yellow;
            color: black;
        }

        .navbar li.dropdown {
            display: inline-block;
        }

        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .navbar .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .navbar .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }

        .buttons {
            position: relative;
            top: -20px;
        }

        .buttons a {
            display: inline-block;
            height: 15px;
            width: 15px;
            border-radius: 50px;
            background-color: white;
        }

        .fotter {
            background-color: black;
            padding: 20px;
            width: 98%;
            height: 160px;
            grid-template-columns: 1fr 1fr 200px;
            grid-template-rows: 1fr 80px;
            display: grid;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .fotter_middle {
            color: white;
            padding-left: 20px;
            padding-bottom: 10px;
            padding-right: 10px;
        }

        .fotter_right {
            padding-left: 20px;
            padding-bottom: 10px;
            padding-right: 10px;
            color: white;
        }

        .fotter_left {
            padding: 20px;
            color: white;
        }

        .maincontainer {
            padding-left: 40px;
            padding: 20px;
            margin-right: 300px;
            width: 100%;
            height: 100%;
            grid-template-columns: 1fr 200px 50px;
            grid-template-rows: 1fr;
            display: grid;
        }

        .mainleft {
            text-align: center;
            height: 340px;
            font-family: monospace;
            font-size: x-large;
            border: 2px solid rgb(255, 255, 255);
            border-radius: 20px;
        }

        .mainleft a {
            text-decoration: none;
        }

        .header {
            text-align: center;
            padding-top: 7px;
            padding-bottom: 10px;
            font-family: monospace;
        }

        .slider {
            width: 500px;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0px;
            text-align: center;
            overflow: hidden;
        }

        .slide {
            float: left;
            margin: 0px;
            padding: 0px;
            position: relative;
            position: right-bottom;
        }

        .buttons {
            position: relative;
            top: -20px;
        }

        .buttons a {
            display: inline-block;
            height: 15px;
            width: 15px;
            border-radius: 50px;
            background-color: white;
        }

        .newswcontainer {
            padding: 2px 16px;
        }

        button {
            font-family: monospace;
            border-radius: 10px;
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        button:hover {
            background-color: white;
            color: black;
        }

        .fotter_bottom {
            margin-left: 10px;
            font-size: large;
            font-family: monospace;
            color: white;
        }

        .back-button {
            background-color: red;
            color: white;
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <img src="/images/college logo.jpg" class="logo" alt="LOGO">
    
    <a href="newhome.html">
        <h1 id="headline" style="font-family: Monospace;text-align: center;font-size:32px ; padding: 5px;color:#ffffff; "></h1>
    </a>

    <div class="navbar">
        <ul>
            <li><a href="/user/mycourses">MY CURRENT COURSES</a></li>
            <li><a href="user/profile">MY PROFILE</a></li>
            <li class="dropdown">
                <a href="/user/enrollCourses">ENROLL COURSES</a>
            </li>
            <li><a href="/user/mygrades">M Y G R A D E S</a></li>
        </ul>
    </div>

    @if(auth()->user()->admin)
    <br><br><br>
    <a href="{{ route('home') }}" class="back-button">D A S H B O A R D</a>
    @endif

    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <div class="fotter">
        <div class="fotter_middle">
            <p style="font-size:18px ;">About-Us</p>
            <p style="font-size:13px">Error Hunters</p>
            <p style="font-size:13px">I hope you liked our site.</p>
        </div>
        <div class="fotter_right">
            <p style="font-size:18px ;">Contact-Us</p>
            <p style="font-size:13px">My E-mail :mohamedabdo330@gmail.com</p>
            <p style="font-size:13px">for (Business Only)</p>
        </div>
        <div class="fotter_left">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <p style="font-size:+4;">
                    <button type="submit"><b>Log out</b></button>
                </p>
            </form>
        </div>
        <div class="fotter_bottom">
            <p>© 2022 Error Hunters</p>
        </div>
    </div>
</body>
</html>
