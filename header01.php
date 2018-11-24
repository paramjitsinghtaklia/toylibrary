<!DOCTYPE html>
<html lang="en">

<?php
$from_email="";
$username ="";
$userid="";
$UserroleId="";

$BASE_URL='/collaboration_portal/public/';

if(isset($_COOKIE['UserId']) &&  isset($_COOKIE['Username'])) 
{
        $userid =  $_COOKIE['UserId'];
        $username = $_COOKIE['Username'];
        $UserroleId = $_COOKIE['UserroleId'];  
}
else
{  
    $_COOKIE['UserId'] = '';
    $_COOKIE['Username'] ='';
    $_COOKIE['UserroleId']='';
}
?>
<style type="text/css">
    .overflowclass{
       height: 500px;
       overflow: auto;
    }
.ng-cloak { display:none! important; }
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="shortcut icon" href="http://quotetoinvoice.corp.netapp.com/wp_cmat/wp-content/themes/cmat/favicon.ico" />

  <title>ERDM Collaboration Portal</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $BASE_URL?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo $BASE_URL?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
   <link href="<?php echo $BASE_URL?>vendor/bootstrap/css/jquery.datetimepicker.min.css" rel="stylesheet"> 
   <link href="<?php echo $BASE_URL?>resources/dist/ImgGallery/gallery.css" rel="stylesheet"> 
        <!-- style4 CSS -->
    <link href="<?php echo $BASE_URL?>resources/dist/css/style4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $BASE_URL?>resources/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo $BASE_URL?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <script src="<?php echo $BASE_URL?>vendor/jquery/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body class="horiscroll">

    <div class="" id="wrapper">
        <!-- Navigation -->
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: white; position:fixed">
        
            <div class="navbar-header" style="box-shadow: 0pt 2px 5px #000">
             
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only" >Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo $BASE_URL?>index"><div style="width:50%;"><div style="float:left"><img src="<?php echo $BASE_URL?>images/bannerlogo1.png" width="170" style="padding-top: 9px;padding-left: 13px;border-right: 2px solid;padding-bottom: 5px;padding-right: 8px;"> <img classnavbar-brand src="<?php echo $BASE_URL?>images/banner.jpg" style="width: 66%;margin-left: -9px;margin-top: 2px;padding-left: 14px;padding-bottom: 4px;"></div></a>
                <!-- <a href="index.php">ERDM Data Ops</a> -->
                 
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links">
           <div class="col-lg-2 pull-right" style="padding-top: 19px;width: 23%;text-align: right;margin-right: 10px;">

 
                  <!-- <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                     </div>-->
                  <span>  <b>
                <?php 

                if( $username =="")
                {
                echo 'Welcome : Guest';
                }
                else
                {
                    echo 'Welcome : '.$username;
                }

                ?>
                 </b></span>
               
                <!-- /.dropdown -->
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user overflowclass">
                    <li><a href="<?php echo $BASE_URL?>index"><i class="fa fa-file-text fa-fw"></i> Home</a> <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL?>idea_master_list"><i class="fa fa-file-text fa-fw"></i> Idea List </a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL?>document_master_listing"><i class="fa fa-file fa-fw"></i> Document List</a></li>
                         <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL?>events_master_list"><i class="fa fa-file fa-fw"></i> Upcoming Events</a></li>
                         <li class="divider"></li>
                           <li><a href="<?php echo $BASE_URL?>events_image_master_listing"><i class="fa fa-file fa-fw"></i> Events Images</a></li>
                            <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL?>cheer_winner_listing"><i class="fa fa-file fa-fw"></i> Cheer Winner List</a></li>
                       
                       <!-- <li class="divider"></li> <li><a href="<?php //echo $BASE_URL?>faq_master_listing"><i class="fa fa-file fa-fw"></i> FAQ List</a></li>-->
                          

                         <li class="divider"></li>
                        <li><a href="<?php echo $BASE_URL?>idea_summary"><i class="fa fa-file fa-fw"></i>Idea Summary</a></li>
                        
                        <li class="divider"></li>
                                <li><a href="<?php echo $BASE_URL?>functional_group_feedback"><i class="fa fa-sign-out fa-fw"></i> FeedBack on Functional Group  Docs</a>
                                </li> 
                       
                        
                        <?php
                       
                        if ($userid=="")
                        {
                             
                                
                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'login"><i class="fa fa-sign-out fa-fw"></i> Login</a>';
                                echo ' </li>';
                        }
                        else
                        {

                            if ($UserroleId=="1" ){

                              

                                    echo '<li class="divider"></li>';
                              echo   ' <li><a href="'.$BASE_URL.'functionalgroup_list"><i class="fa fa-file fa-fw"></i> Functional Group List</a></li>
                         <li class="divider"></li>
                        <li><a href="'.$BASE_URL.'user_role_listing"><i class="fa fa-file fa-fw"></i> User Role</a></li>
                         <li class="divider"></li>
                        <li><a href="'.$BASE_URL.'users_listing"><i class="fa fa-file fa-fw"></i> Users List</a></li>';


                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'doc_type_list"><i class="fa fa-sign-out fa-fw"></i> Document/Idea  Type </a>';
                                echo ' </li>';

                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'doc_measure_list"><i class="fa fa-sign-out fa-fw"></i> Document/Idea Measures Type </a>';
                                echo ' </li>';

                                 echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'rewards_master_listing"><i class="fa fa-sign-out fa-fw"></i> Rewards Master </a>';
                                echo ' </li>';
                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'portal_links_listing"><i class="fa fa-sign-out fa-fw"></i> Portal Side Link List </a>';
                                echo ' </li>';

                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'analytics"><i class="fa fa-sign-out fa-fw"></i> Portal Analytics </a>';
                                echo ' </li>';

                                }

                                if ($UserroleId=="1" || $UserroleId=="2" ||$UserroleId=="3"){

                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'approver_list"><i class="fa fa-sign-out fa-fw"></i> Ideas to be approved </a>';
                                echo ' </li>';

                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'documentapprove_list"><i class="fa fa-sign-out fa-fw"></i> Documents to be approved </a>';
                                echo ' </li>';

                                 echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'feedback_list"><i class="fa fa-sign-out fa-fw"></i> Function Feedback to be approved </a>';
                                echo ' </li>';
                                    }
                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'my_ideas"><i class="fa fa-sign-out fa-fw"></i>My Ideas</a>';
                                echo ' </li>';
                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'my_doc"><i class="fa fa-sign-out fa-fw"></i>My Document</a>';
                                echo ' </li>';

                                echo '<li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'view_rewards"><i class="fa fa-sign-out fa-fw"></i>My Rewards Summary</a>';
                                echo ' </li>';

                                echo ' <li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'change_password"><i class="fa fa-sign-out fa-fw"></i> Change Password</a>';
                                echo '</li>';

                                echo ' <li class="divider"></li>';
                                echo '<li><a href="'.$BASE_URL.'logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>';
                                echo '</li>';

                               
                        }
                      
                        ?>
                      
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                <li> </li>
                
            </ul>
 </div>
            <!-- /.navbar-top-links -->

            

       </nav>
   <!--  <a href="index.php">  <img classnavbar-brand src="images/banner.jpg" style="width:70%; margin-left:22px; margin-top:55px;"></a>-->
<hr style="margin:0px;margin-bottom: 18px;">
<!-- Page Content -->
        <div id="">
            <div class="container-fluid">
                <div class="row" style="margin-top:15px; ">
                   
                    <!-- /.col-lg-12 -->
<br>
<?php 
//var_dump($_SERVER);
$current='';
$requested_uri = $_SERVER ["REQUEST_URI"];

if($requested_uri <>"/collaboration_portal/public/" && $requested_uri <>"/collaboration_portal/public/index")
    {
      
      $currentpage_actual = str_replace("/collaboration_portal/public/", '', $requested_uri);

       $pos = strrpos($currentpage_actual, '/');
            if ($pos !== FALSE) {
                    $currentpage_actual = substr($currentpage_actual, 0, $pos );
                }


        $currentpage = str_replace("/collaboration_portal/public/", '', $requested_uri);
        $currentpage = str_replace('_', ' ', $currentpage);
        echo  '  <ol class="breadcrumb breadcrumb-arrow">
            <li><a href="'.$BASE_URL.'">Home </a>&rArr;</li>';
           
        $pos = strrpos($currentpage, '/');
            if ($pos !== FALSE) {
                    $currentpage = substr($currentpage, 0, $pos );
                }
              //  echo $currentpage_actual;
                if($currentpage_actual=="idea_master_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'idea_master_list">Idea Master list </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="doc_master_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'document_master_listing">Document Master list </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="cheer_winner_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'cheer_winner_listing">Cheer Winner List </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                 else if($currentpage_actual=="view_document")
                {
                          echo ' <li><a href="'.$BASE_URL.'document_master_listing">Document Master list </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="events_master_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'events_master_list">Events Master list </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="updatefunctionalgroup_list")
                {
                          echo ' <li><a href="'.$BASE_URL.'functionalgroup_list">Functional Group List </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="user_role_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'user_role_listing">User Role List </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="user_update")
                {
                          echo ' <li><a href="'.$BASE_URL.'users_listing">User List </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="view_event_image")
                {
                          echo ' <li><a href="'.$BASE_URL.'events_image_master_listing">Event Image List </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="view_Idea")
                {
                          echo ' <li><a href="'.$BASE_URL.'idea_master_list">Idea Master list </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else if($currentpage_actual=="uniqueclick" ||$currentpage_actual=="totalclick")
                {
                          echo ' <li><a href="'.$BASE_URL.'analytics">Analytics </a>&rArr;</li>';
                            echo '<li class="active"><span>'.ucwords($currentpage).'</span></li> ';
                }
                else
                {
                    echo '<li class="active"><span>'.ucwords($currentpage).'</span></li>';   
                }
        echo '</ol>';
        
    }
?>

</div>    

<style>
.breadcrumb {
    margin-bottom: -15px ! important;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 18px;
    margin-top: 10px;
    background: #e9e9e9;
    width: 96%;
    margin-left: 31px;
}

.breadcrumb>li+li:before
{
         content: "" ! important; 
}


.col-lg-6 h3
{
     border-bottom: 2px solid;width: 199%;padding-bottom: 11px;margin-bottom: -1px;
}
.btn-primary
{
    margin-top: 14px! important;
}


span .btn-primary
{
    margin-top: 1px! important;
}
</style>