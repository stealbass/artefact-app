<?php
/*
 * @author Steal Bass
 * @website 
 * @facebook 
 * @twitter 
 * @googleplus 
 */

require("dbcon.php");
/*if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
    $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect_url");
    exit();
}
*/

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
	if ($two_letter_country_code=="AF" || $two_letter_country_code=="AL" || $two_letter_country_code=="AM" || $two_letter_country_code=="BD" || $two_letter_country_code=="BS" || $two_letter_country_code=="CN" || $two_letter_country_code=="CZ" || $two_letter_country_code=="ID" || $two_letter_country_code=="HK" || $two_letter_country_code=="IN" || $two_letter_country_code=="IR" || $two_letter_country_code=="JP" || $two_letter_country_code=="LB"  || $two_letter_country_code=="LY" || $two_letter_country_code=="KW" || $two_letter_country_code=="ID" || $two_letter_country_code=="IN" || $two_letter_country_code=="PH" || $two_letter_country_code=="NG" || $two_letter_country_code=="RO" || $two_letter_country_code=="RS" || $two_letter_country_code=="SD" || $two_letter_country_code=="SI" || $two_letter_country_code=="SK" || $two_letter_country_code=="YE" || $two_letter_country_code=="ES" || $two_letter_country_code=="TW" || $two_letter_country_code=="TJ" || $two_letter_country_code=="TH")
  die();
?>
     <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
                <meta name="description" content="<?php echo stripslashes($pageDesc); ?>" />
                <meta name="keywords" content="<?php echo stripslashes($pageKey); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?php echo stripslashes($pageDetails); ?> - <?php echo SITE_NAME; ?></title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/rating.css">
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Login</h4>
                    </div>
                        
                    <div class="modal-body">
                        <?php
							if ($login_error_message != "") {
								echo '<div class="alert alert-danger alert-dismissable"><button data-dismiss="alert" class="close" type="button">x</button><strong>Ereure: </strong> ' . $login_error_message . '</div>';
							}
							?>
							<form action="register.php" method="post">
								<div class="form-group">
									<label for="">Pseudo/Email</label>
									<input type="text" name="username" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="submit" name="btnLogin" class="btn btn-warning" value="Connection"/>
								</div>
							</form>
							
                        <p class="text-center text-muted"><a href="email.php">Forgot password ?</a></p>
                    </div>
                </div>
            </div>
        </div>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand"><?php echo stripslashes($pageDetails); ?></p>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links 
            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li class="selected">
                        <a href="register.php"><i class="fa fa-rss fa-fw"></i>Subscribe</a>
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <form class="input-group custom-search-form" role="search" action="search.php" method="GET">
                            <input type="text" class="form-control" name="name" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="submit" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </form>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fa fa-book fa-fw"></i>Series</a>
                    </li>
				<?php
					$res=$db->query("SELECT * FROM tbl_main");
					while($row=$res->fetch())
					{
						if ($row['cat_name']=="Kind"){
					 ?>
                    <li>
                        <a href="#"><i class="fa fa-indent fa-fw"></i> <?php echo $row['cat_name']; ?><span class="fa arrow"></span></a>
                    <?php
						 $res_pro=$db->query("SELECT * FROM tbl_submain WHERE cat_id=".$row['cat_id']);
						 ?>
                        <ul class="nav nav-second-level">
												<?php  
												  while($pro_row=$res_pro->fetch())
												  {
													  $id=$pro_row['subcatSlug'];
												   ?>
												   <?php 
														echo '<li><a href="subcatproduct.php?id='.$id.'">'.$pro_row['subcat_name'].'</a></li>';
													?>
												<?php
												  }
												  ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>                
							 <?php
							} elseif ($row['cat_name']=="Style"){
					 ?>
                    <li>
                        <a href="#"><i class="fa fa-flask fa-fw"></i> <?php echo $row['cat_name']; ?><span class="fa arrow"></span></a>
                    <?php
						 $res_pro=$db->query("SELECT * FROM tbl_submain WHERE cat_id=".$row['cat_id']);
						 ?>
                        <ul class="nav nav-second-level">
												<?php  
												  while($pro_row=$res_pro->fetch())
												  {
													  $id=$pro_row['subcatSlug'];
												   ?>
												   <?php 
														echo '<li><a href="subcatproduct.php?id='.$id.'">'.$pro_row['subcat_name'].'</a></li>';
													?>
												<?php
												  }
												  ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>                
							 <?php
							}
							else  {
								?>
                    <li>
                        <a href="#"><i class="fa fa-indent fa-fw"></i> <?php echo $row['cat_name']; ?><span class="fa arrow"></span></a>
                    <?php
						 $res_pro=$db->query("SELECT * FROM tbl_submain WHERE cat_id=".$row['cat_id']);
						 ?>
                        <ul class="nav nav-second-level">
												<?php  
												  while($pro_row=$res_pro->fetch())
												  {
													  $id=$pro_row['subcatSlug'];
												   ?>
												   <?php 
														echo '<li><a href="subcatproduct.php?id='.$id.'">'.$pro_row['subcat_name'].'</a></li>';
													?>
												<?php
												  }
												  ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>  
												<?php  
							}
					}
							?>
                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw"></i> Author<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
					<?php

					  if(isset($_SESSION['user_id'])){
						echo '<li><a href="profile.php" class="account-nav"><img src="img/core-img/favorites.png" alt=""> Account</a></li>';
					  }
					  else{
						echo '<li><a href="register.php" class="account-nav"><img src="img/core-img/favorites.png" alt=""> Login</a></li>';
					  }
					  ?>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
	 
    