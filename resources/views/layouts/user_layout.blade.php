<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>HOME PAGE</title>
<style >
    ul{
            

            list-style-type: none;
            margin: 0 auto;
            padding: 0;
            overflow: hidden;
            background-color: rgb(0, 0, 0);
    }
    li {
            float:left;
            margin-left:13% ;
    }
    li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
    }
    li a:hover, .dropdown:hover .dropbtn {
            background-color: yellow;
            color:black
    }
    li.dropdown {
            display: inline-block;
    }

    .dropdown-content {
            display: none;
           position: absolute;
           background-color: #f9f9f9;
           min-width: 160px;
           box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
           z-index: 1;
    }
   .dropdown-content a {
           color: black;
           padding: 12px 16px;
           text-decoration: none;
           display: block;
           text-align: left;
    }
    .dropdown-content a:hover {background-color: #f1f1f1;
    }
    .dropdown:hover .dropdown-content {
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
          background-color:white;
  }


  .fotter {
    
    background-color:black;
    padding-top: 20px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 30px;
    width: 98%;
    height: 160px;
    grid-template-columns: 1fr 1fr 200px;
    grid-template-rows: 1fr 80px;
    display: grid;
    position: bottom;
  }
  .fotter_middle{
    color:white;
    padding-left:20px;
    padding-bottom:10px;
    padding-right:10px;
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
 .maincontainer{
  padding-left: 40px;
  padding: 20px;
  margin-right:300px;
  width: 100%;
  height: 100%;
  grid-template-columns: 1fr 200px 50px;
  grid-template-rows: 1fr;
  display: grid;
 }
 .mainleft{

  text-align: center;
  /*background-color: #ECA400;*/
  /*background-color: ghostwhite;*/
  height: 340px;
  font-family: monospace;
  font-size: x-large;
  border: 2px solid rgb(255, 255, 255);
  border-radius: 20px ;

 }
 .mainleft a{
  text-decoration: none;
 }
  body{
      
      background-attachment: fixed;
      background-repeat:no-repeat ;
      
      background-size: 100% 100%;
      width: 1480px;

  }
 .header{
  text-align: center;
  padding-top: 7px;
  padding-bottom: 10px;
  font-family: monospace;
 }
  a{
  text-decoration: none;
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
          background-color:white;
  }

  .newswcontainer {
          padding: 2px 16px;
  }
  button {
          font-family: monospace;
          border-radius: 10px;
          background-color: red; /* Green */
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
  button:hover{
          background-color: white;
          color: black;
  }
  .fotter_bottom{
          margin-left: 10px;
          font-size: large;
          font-family: monospace;
          color: white;
  }
</style>
</head>
<body>
   
   <h1 align="center"> H O M E B A G E </h1>
   <a href="newhome.html"><h1 id = "headline" style="font-family: Monospace;text-align: center;font-size:32px ;
    padding: 5px;color:#ffffff; "></h1></a>
  <script src="home.js"></script>
      <div class="navbar">
        <ul>
  
            <li><a href="#">Y O U R  C O U R S E S</a></li>
            <li><a href="/admin/myprof">Y O U R  P R O F I L E</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">L E V E L S</a> 
                <div class="dropdown-content">
                <a href="#">L 1</a>
                <a href="#">L 2</a>
                <a href="#">L 3</a>
                <a href="#">L 4</a>    
            </div>
            </li>
            <li><a href="#">Y O U R  G R A D E S</a></li>
        </ul>
      </div>
    <h2> C O L L E G E W E B </h2>
    

           
                
           
            

      
      <br><br>
     
      <br><br>
     
      <br><br>
     
      <br><br>
      <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>
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
            <a href="./logout.html"><p style="font-size:+4;"><button><b>Log out</b></button></p></a>
        </div>
        <div class="fotter_bottom">
            <p>© 2022 Error Hunters</p>
        </div>
    </div>



  
</body>
</html>