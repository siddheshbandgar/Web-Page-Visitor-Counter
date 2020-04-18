
<!DOCTYPE html>
<html>
<head>
  <title>Visitor Counter</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    .wrapper{
      height:300px;
      width: 300px;
      background-color: skyblue;
      margin: auto;
      text-align: center;
      border: 1px solid white;
      box-shadow: 2px 2px 10px gray;
      margin-top: 50px;
    }

    .header
    {
        margin:100px;
    }

    h1
    {
      background-color: mediumseagreen;
      color: white;
      border-bottom: 2px solid white;
      
    }

    h3
    {
      font-size: 5em;
    }
    h1,h3
    {
      padding: 20px;
    }
   

    body
    {
      background-color: #0f101a;
    }
  </style>

</head>
<body>

<div class="heading">
    <h1>Web Page Visitor Counter</h1>
  </div>
 

<div class="wrapper">
  
  
<h1 >
    Visitor Count
  </h1>
  <h3>
  <?php
      session_start();
      $counter_name = "counter.txt";

      // Check if a text file exists.
      //If not create one and initialize it to zero.
      if (!file_exists($counter_name)) {
        $f = fopen($counter_name, "w");
        fwrite($f,"0");
        fclose($f);
      }
      // Read the current value of our counter file
      $f = fopen($counter_name,"r");
      $counterVal = fread($f, filesize($counter_name));
      fclose($f);

      // Has visitor been counted in this session?
      // If not, increase counter value by one
      if(!isset($_SESSION['hasVisited'])){
        $_SESSION['hasVisited']="yes";
        $counterVal++;
        $f = fopen($counter_name, "w");
        fwrite($f, $counterVal);
        fclose($f);
        echo $counterVal;
      }

      echo $counterVal;
  ?>

  </h3>
</div>

</body>
</html>