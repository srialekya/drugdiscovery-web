<!DOCTYPE html>

<html>

<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

* {

  box-sizing: border-box;

}

 

body {

  font-family: Arial;

  background: #5c7091;

}

 

/* Header/Blog Title */

.header {

  padding: 1px 1px;

  text-align: center;

  background: rgba(0, 0, 0, 0.5);

  color: #f1f1f1;

}

 

.header h1 {

  font-size: 50px;

}

 

/* Style the top navigation bar */

.topnav {

  width: 100%;

  background-color: #555;

  overflow: auto;

}

 

/* Style the topnav links */

.topnav a {

  float: left;

  padding: 12px;

  color: white;

  text-decoration: none;

  font-size: 17px;

}

 

/* Change color on hover */

.topnav a:hover {

  background-color: #000;

}

 

/* Create two unequal columns that floats next to each other */

/* Left column */

.leftcolumn {

  float: left;

  width: 100%;

}

 

.title1 {

    width: 960px;

    padding-top: 10px;

}

 

/* Fake image */

 

.container {

  position: fixed;

      width: 75%;

      margin-left: 12.5%;

      margin-right: auto;

    }

/* Add a card effect for articles */

.card {

  background-color: white;

  padding: 20px;

}

 

.bg {

  background-color: white;

  padding: 10px;

  margin-top: 20px;

}

 

/* Clear floats after the columns */

.row:after {

  content: "";

  display: table;

  clear: both;

}

 

/* Footer */

.footer {

  padding: 1px 20px;

  text-align: left;

  background: #ddd;

  margin-top: 20px;

}

 

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */

@media screen and (max-width: 800px) {

  .leftcolumn, .rightcolumn {

    width: 100%;

    padding: 0;

  }

}

 

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */

@media screen and (max-width: 400px) {

  .topnav a {

    float: none;

    width: 100%;

  }

}

#myVideo {

  position: fixed;

  right: 0;

  bottom: 0;

  min-width: 100%;

  min-height: 100%;

}

</style>

</head>

<body>

  <video autoplay muted loop id="myVideo">

    <source src="chemistry-background.mp4" type="video/mp4">

    Your browser does not support HTML5 video.

  </video>

  <div class = container>

<div class="header">

  <h1>OpenDMPK</h1>

  <p>Open Drug Metabolism and Pharmakokinetic Properties</p>

</div>

 

<div class="topnav">

  <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>

  <a href="http://sirimullaresearchgroup.com"><i class="fa fa-fw fa-envelope"></i> Contact</a>

</div>

 

<div class="row">

  <div class="leftcolumn">

    <div class="bg">

      <h2>               Welcome to OpenDMPK</h2>

    </div>

    <div class="card">

      <div class="fakeimg" style="height:200px; width:10px;"><!-- Check if the smiles is submitted -->

      <!-- "http://129.108.3.14:5000/predict" -->

      <?php

        if (!empty($_POST['submit'])){

          $smiles = $_POST['smiles'];

          // echo $smiles;

          $url = 'http://chanti01.utep.edu:5000/predict';

          //$url = 'http://129.108.3.14:5000/predict';

          $data = array('smiles' => $smiles);

 

          // use key 'http' even if you send the request to https://...

          $options = array(

              'http' => array(

                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",

                  'method'  => 'POST',

                  'content' => http_build_query($data)

              )

          );

          $context  = stream_context_create($options);

          $result = file_get_contents($url, false, $context);

          if ($result === FALSE){

            echo "ERROR: COULDN'T MAKE THE PREDICTIONS. TRY AGAIN.";

          }

          $result_ar = json_decode($result, true);

          // foreach ($result_ar as $k => $v) {

          //   echo $k, ' : ', $v;

          // }

          include "show_result.php";

          // print($result);

        } else {

          include "form.php";

        }

      ?>

 

      <!-- Bootstrap core JavaScript -->

  <!--     <script src="vendor/jquery/jquery.min.js"></script>

      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

</div>

  </div>

  </div>

 

</div>

 

<div class="footer">

  <h3>What is OpenDMPK ?</h3>

  <p>Open Drug Metabolism & PharmacoKinetics (OpenDMPK) is an open source data resource and toolkit for predicting drug metabolism and pharmacokinetic properties of drug molecules.</p>

</div>

</div>

</body>

</html>