 <?php
 
 include('session.php');

    if ($_SERVER['HTTP_X_FORWARDED_FOR'])
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
      $ip   = $_SERVER['REMOTE_ADDR'];
     
    $two_letter_country_code=iptocountry($ip);
     
    function iptocountry($ip)
    {
      $numbers = preg_split( "/\./", $ip);    
     
      include("ip_files/".$numbers[0].".php");
      $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);    
     
      foreach($ranges as $key => $value)
      {
        if($key<=$code)
        {
          if($ranges[$key][0]>=$code)
          {
            $country=$ranges[$key][1];break;
          }
        }
      }
     
      if ($country=="")
      {
        $country="unknown";
      }
     
      return $country;
    }
 ?>
<!DOCTYPE html>

<html>

<head>

<title>Backend</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
 
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/custom.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="CLEditor/jquery.cleditor.css" />

</head>

    <nav class="navbar navbar-inverse bg-primary navbar-fixed-top">
  <div class="navbar-inner">
      <ul class="nav navbar-nav">
  <li><a href="chart.php">Dashboard</a></li>  <li class="divider-vertical"></li>
  <li><a href="home.php">Home</a></li>  <li class="divider-vertical"></li>
  <li><a href="product.php">Products</a></li>  <li class="divider-vertical"></li>
  <li><a href="gallery_add.php">Conseils</a></li>  <li class="divider-vertical"></li>
  <li><a href="info.php">Update Information</a></li>  <li class="divider-vertical"></li>
  <li><a href="contacts.php">Messages</a></li>  <li class="divider-vertical"></li>
  <li><a href="manage_pages.php">Pages</a></li>  <li class="divider-vertical"></li>
  <li><a href="add_menu.php">Menu</a></li>  <li class="divider-vertical"></li>
  <li><a href="newsletter.php">Newsletter</a></li>  <li class="divider-vertical"></li>
  <li><a href="admin.php">Admin</a></li>  <li class="divider-vertical"></li>

  </ul>
  </div>
</nav>

<body>