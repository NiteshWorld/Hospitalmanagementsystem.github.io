<?php
  session_start();
  if(!isset($_SESSION[`adminlogin`]))
  {
    header("location:login.html");

  }
?>

<?php
   if(isset($_POST['logout']))
   {
     session_destroy();
     header("location:login.html");
   }
  
  
  ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/solid.min.css" integrity="sha512-xIEmv/u9DeZZRfvRS06QVP2C97Hs5i0ePXDooLa5ZPla3jOgPT/w6CzoSMPuRiumP7A/xhnUBxRmgWWwU26ZeQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/fontawesome.min.css" integrity="sha512-shT5e46zNSD6lt4dlJHb+7LoUko9QZXTGlmWWx0qjI9UhQrElRb+Q5DM7SVte9G9ZNmovz2qIaV7IWv0xQkBkw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/fontawesome.min.css" integrity="sha512-shT5e46zNSD6lt4dlJHb+7LoUko9QZXTGlmWWx0qjI9UhQrElRb+Q5DM7SVte9G9ZNmovz2qIaV7IWv0xQkBkw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css3/admin.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>Adminpage</title>
</head>
<body>
<div class="header">
    <h1><img src="css3\images\logo.png"  width="102" height="95" alt="Logo"> Hello😃  <?php echo $_SESSION[`adminlogin`]?></h1>
    <form action="" method="post">
    <button name="logout">Log Out</button>
    </form>
  </div>

  <div class="main-page">
   <label style="font-size: 25px; font-weight:800; background: lightseagreen; margin:20px 10px; padding:5px 20px; color: white; text-align:left;">DashBoard</label> 
   <br>
   <label style="background: lightgrey; margin:-11px 10px; padding:5px 20px;">
      <ul>
        <li>
          <a href="#appointment"><i class="las la-2x la-calendar-check"></i></span>
          <span style="font-size:22px"; >Appointment</span></a>

        </li>
        <br>
        <li>
          <a style="align-items:left"; href="#contact"><i class="las la-2x la-phone-volume"></i></span>
          <span style="font-size:23px"; text-align: left; >Contacts</span></a>

        </li>
      </ul>
      </label>

    </div>

  
  

  <div class="main-div" id="appointment">
    <h1 style="color: #20b2af; font-weight:520">List of Patient Appointments</h1>

    <div class="center-div">
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email-Id</th>
              <th>Mobile Number</th>
              <th>Appointment Time</th>
              <th>Messages</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
          <?php

            
            $host = "localhost:3306";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "hospital";
        
            //create connection
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
            
            $selectquery = " SELECT * FROM appointment1 ";
            $query = mysqli_query($conn,$selectquery);
            $nums = mysqli_num_rows($query);


            while($res = mysqli_fetch_array($query)){
            
            ?>

            <tr>
              <td><?php echo $res['id']; ?></td>
              <td><?php echo $res['username']; ?></td>
              <td><?php echo $res['email']; ?></td>
              <td><?php echo $res['mobile']; ?></td>
              <td><?php echo $res['time']; ?></td>
              <td><?php echo $res['message']; ?></td>
              
              
              <td><a href="connect4.php?id= <?php  echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>

            <?php
  
            }


          ?>
            
          </tbody>

        </table>

      </div>

    </div>

  </div>
  <br>

  <div class="main-div2" id="contact">
    <h1 style="color: #20b2af; font-weight:520">List of Contacts</h1>

    <div class="center-div2">
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email-Id</th>
              <th>Mobile Number</th>
              
              <th>Messages</th>
              <th>Operation</th>
            </tr>
          </thead>
          <tbody>
          <?php

            
            
            $host = "localhost:3306";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "hospital";

            //create connection
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
            $selectquery = " SELECT * FROM contact ";
            $query = mysqli_query($conn,$selectquery);
            $nums = mysqli_num_rows($query);


            while($res = mysqli_fetch_array($query)){
            

            ?>

            <tr>
              <td><?php echo $res['id']; ?></td>
              <td><?php echo $res['username']; ?></td>
              <td><?php echo $res['email']; ?></td>
              <td><?php echo $res['mobile']; ?></td>
              
              <td><?php echo $res['message']; ?></td>
              
              
              <td><a href="connect5.php?id= <?php  echo $res['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>

            <?php
  
            }


          ?>
            
          </tbody>

        </table>

      </div>

    </div>

  </div>
  <section class="footer" id="footer">
  <div>
  <h1 class="credit text-center mx-auto">Design & Developed By <span> N.G. </span>| Copyright © 2021. All Rights Reserved.</h1>
  
  </div>

  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  
  
    
</body>
</html>