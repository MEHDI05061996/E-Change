<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>e-change</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
     <div class="container">
         <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top anav" role="navigation" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index1.php">e-change</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <!-- categorie -->
                  <?php include ('bd.php');
                  $req=mysqli_query($connexion,"SELECT * FROM categorie");
                  while ($tab=mysqli_fetch_array($req)) {
                  echo "<li><a href='detprod.php?idc={$tab['id_cat']}'>{$tab['libelle']}</a></li>";
                  }
                  ?>
                  <!-- /categorie -->

                    <li>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Se connecter<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="contacte.php">Contactez-nous</a></li>
            <li><a href="#"></a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="connexion.php">Connexion</a></li>
          </ul>
        </li>
      </ul>

                    </li>

                    <li>
            <?php
             session_start();
             if (isset($_SESSION['iduser'])) {
               echo "<li>&nbsp;&nbsp;
                       <ul class='nav navbar-nav navbar-right'>
               <li class='dropdown'>
               <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
               <img src='image/avatar/{$_SESSION['avatar']}' class='photoprofil'> &nbsp; {$_SESSION['login']}<span class='caret'></span></a>
               <ul class='dropdown-menu'>
               <li><a href='profil.php'>Profil</a></li>
               <li role='separator' class='divider'></li>
               <li><a href='index1.php?idu={$_SESSION['iduser']}'>Se deconnecter</a></li>
               </ul>
               </li>
               </ul>
                    </li>";
            }

            //--------------------------------------DECONNECTER-----------------------------------------

            if (isset($_GET['idu'])) {
              unset($_SESSION['iduser']);
              header('location:index1.php');
            }

             ?>

                                        <li><a class="btn btn-default" href="ajoutproduit.php" role="button" id="btn">+ Nouvelle Annonce</a></li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->
    </nav>

    
</div>
<br/>
<div style="margin-top:10%;    margin-left: 11%;">
<img id="mainImage" style="border:1px solid grey;width: 34.3%;height:236px;" 
         src="Images/ca.jpg" /><br>
    <br />
    <div id="divId" onclick="changeImageOnClick(event)">
       
       <?php 
        include "bd.php";
        $id_p=$_GET['idp'];
 //-------------------------------requette photo---------------------------------------
        $rphoto=mysqli_query($connexion,"SELECT * FROM photo WHERE id_prod='$id_p'");
        while($tphoto=mysqli_fetch_array($rphoto)) {
        $img=$tphoto['photo'];
        echo "<img class='imgStyle' src='image/prodimage/$img' />&nbsp;";
         }
       ?>
        
    </div>
</div>
    <script type="text/javascript">

        var images = document.getElementById("divId")
                             .getElementsByTagName("img");

        for (var i = 0; i < images.length; i++)
        {
            images[i].onmouseover = function ()
            {
                this.style.cursor = 'hand';
                this.style.borderColor = 'red';
            }
            images[i].onmouseout = function ()
            {
                this.style.cursor = 'pointer';
                this.style.borderColor = 'grey';
            }
        }

        function changeImageOnClick(event)
        {
            event = event || window.event;
            var targetElement = event.target || event.srcElement;

            if (targetElement.tagName == "IMG")
            {
                mainImage.src = targetElement.getAttribute("src");
            }
        }
    </script>

<br/><br/><br/>

<?php 
include "bd.php";
$id_p=$_GET['idp'];
$r=mysqli_query($connexion,"SELECT * FROM produit WHERE id_prod='$id_p'");
$tp=mysqli_fetch_array($r);
$des=$tp['description'];
$lib=$tp['lib'];

?>


<div class="container">
<div class="titre1">
<center><h1 style="position:relative;top:-11.6em;left:1.3em;"><?php echo $lib;?></h1></center></div></div>
<div class="container">
<table><tr><td>
  </td>

  <td><div class=" par col-lg-7">

<?php echo $des;?>

</div></td></tr></table></div>


<br/><br/><br/><br/><br/><br/><br/><br/>

<div class="container" style="margin-left:0%;margin-top:-16%;">
    <div class="row">

        <div class="[ col-xs-12 col-sm-offset-1 col-sm-9 col-lg-12 col-md-7 ]" >
            <div class="[ panel panel-default ] " >

               
                <div class="panel-body">
                  

                   <center> 

                    <?php 
                    include 'bd.php';
                    $id_p=$_GET['idp'];

                     $r=mysqli_query($connexion,"SELECT * FROM produit WHERE id_prod='$id_p'");
                     $tp=mysqli_fetch_array($r);
                     $idus=$tp['id_user'];
                     //---------------------------------------------------------------------------
                     $ruser=mysqli_query($connexion,"SELECT * FROM user WHERE id_user='$idus'");
                     $quser=mysqli_fetch_array($ruser);
                     $idut=$quser['id_user'];
                     $img=$quser['avatar'];
                     $nom=$quser['nom']."&nbsp".$quser['prenom'];
                     $tele=$quser['telephone'];
                     $posta=$quser['code_postal'];
                     $email=$quser['email'];
                     $ville=$quser['ville'];

                    ?>

                      <img src="image/avatar/<?php echo $img;?>" class="rounded" alt="..." style="margin-left:0%;border-radius:50%;width:7%;"><br>
                      <br>
                      <?php echo "-&nbsp".$nom."&nbsp-";?><br><br>
                      <form method="post">
                      <input type="submit" name="demande" value="+ demande d'echange " data-toggle="modal" data-target="#connexion" class="btn btn-more"><br><br>
                      <?php 
                        if (isset($_POST['demande'])){
                                     if (isset($_SESSION['iduser'])){
                                        $u=$_SESSION['iduser'];
                                        $l=mysqli_query($connexion,"INSERT INTO detail_echange VALUES('','$u','$idut','$id_p')");
                                     }

                        }
                    
                      ?>

                     <button type="button" class="btn btn-primary">
                       <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                       <?php echo $ville;?>
                      </button>

                      <button type="button" class="btn btn-primary">
                       <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>
                        <?php echo $tele;?>
                      </button>
                      
                     

                    <button type="button" class="btn btn-primary">
                       
                       Code postal :  <?php echo $posta;?>
                      </button>

                    <button type="button" class="btn btn-primary">
                       <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                         <?php echo $email;?>
                      </button>

                    </center >

                    <!--formilaire de connexion-->
    <div id="connexion" class="modal fade" role="dialog">

       <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button  class="close" data-dismiss="modal" name="button">&times;</button>
              
            </div>
            <div class="modal-body">
             <form method="post" >

              <p class="btn btn-primary "  name="etudiant" style="background:white;color:black;width:50%;margin-left:25%;">  Votre demande a été envoyer </p><br><br>
            

            </div>
            
          </div>
        </div>

     </div>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  


               </div>

            </div>
        </div>

    </div>



</div>


 
    

    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


<script type="text/javascript">

    
</script>


</body>
    
</html>



 <style>
     /***
Bootstrap Line Tabs by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
     ***/ .imgStyle
        {
            width:100px;
            height:100px;
            border:none;
        }
     .titre1{
        text-align: center;
        font-family: "candara",sans-serif;
        color: #000102;
        text-shadow: 0px 0px 12px #ccc;
    }
     .in > li:hover > a{
        background-color:#262727 ;
        color:#17f173;
    }
     .par{
        
   position: relative;
    top: -27em;
    left: 47%;
    font-family: "candara",sans-serif;
    text-shadow: 0px 0px 12px #ccc;
     }
     .titre{
        text-align: center;
        font-family: "candara",sans-serif;
        color: #0164f9;
        text-shadow: 0px 0px 12px #ccc;
    }
        

     .btn {
    padding: 7px 24px;
    border: 0 none;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}
 
.btn:focus, .btn:active:focus, .btn.active:focus {
    outline: 0 none;
}
 
.btn-primary {
    background: #0099cc;
    color: #ffffff;
}
 
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    background: #33a6cc;
}
 
.btn-primary:active, .btn-primary.active {
    background: #007299;
    box-shadow: none;
}
/**-------------------------bouton-------------------*/
.navbar .brand, .navbar .nav > li > a:hover {
    color: #47abff;
}
    .navbar .brand, .navbar .nav > li > a:focus {
    color: #47abff;
}
.anav{
        background:white;
        box-shadow: 0px 3px 2px  rgba(225,230,231, 0.5);
        border-bottom:none;
    }
     
.cuadro_intro_hover{
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 200px;
    }
    .cuadro_intro_hover:hover .caption{
        opacity: 1;
        transform: translateY(-150px);
        -webkit-transform:translateY(-150px);
        -moz-transform:translateY(-150px);
        -ms-transform:translateY(-150px);
        -o-transform:translateY(-150px);
    }
    .cuadro_intro_hover img{
        z-index: 4;
    }
    .cuadro_intro_hover .caption{
        position: absolute;
        top:150px;
        -webkit-transition:all 0.3s ease-in-out;
        -moz-transition:all 0.3s ease-in-out;
        -o-transition:all 0.3s ease-in-out;
        -ms-transition:all 0.3s ease-in-out;
        transition:all 0.3s ease-in-out;
        width: 100%;
    }
    .cuadro_intro_hover .blur{
        background-color: rgba(13,118,178,1);
        height: 300px;
        z-index: 5;
        position: absolute;
        width: 100%;
    }
    .cuadro_intro_hover .caption-text{
        z-index: 10;
        color: #fff;
        position: absolute;
        height: 300px;
        text-align: center;
        top:-20px;
        width: 100%;
    }
/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}
.carousel {
    position: relative;
    top: -143px;
}
.st{
height:400px;
}

.photoprofil{
  width:23px;
  height:23px;
}
/*button ajouter anace*/
  #btn{
   margin-top: 14px;
    margin-left: 16px;
    background: #058dc5;
    padding: 5px;
    color: white;
    font-size: 11px;
  }
/*---------*/
/*liste */

  .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
    color: #fff;
    background-color:#1c9bd0;
  /*#585c5d*/
}

/*/list*/
.navbar .brand, .navbar .nav > li > a:hover {
    color: #47abff;
}
  .navbar .brand, .navbar .nav > li > a:focus {
    color: #47abff;
}

  .anav{
    background:white;
    box-shadow: -1px 2px 5px 1px rgba(225,230,231, 0.3);
    border-bottom:none;
  }

.btn-default {
    color:white;
    background-color:#737c80;
    border:none;
}
.btn-default:hover {
    color:white;
    background-color: #656e72;
    border-color: #adadad;
}
/*cards*/
  @import url(http://fonts.googleapis.com/css?family=Roboto:400,100,900);

.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-big {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.big-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
}


.carbox {
  display: block;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    transition: box-shadow .25s;
}
.carbox:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-carbox {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-carbox img{
  width: 100%;
  height: 200px;
  object-fit:cover;
  transition: all .25s ease;
}
.carbox-content {
  padding:15px;
  text-align:left;
}
.carbox-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.carbox-title a {
  color: #000;
  text-decoration: none !important;
}
.carbox-read-more {
  border-top: 1px solid #D4D4D4;
}
.carbox-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
/*fin cards*/
    .lst{
        margin-left:25%;
        margin-top:-25%;
    }
    .stl{
        color:aliceblue;
    }
    input.transparent-input{
      background-color: rgba(255,255,255,0.8);
      color:#133d56;

    }
    .btn-default{
      background:#058dc5;

    }
    .btn-default:hover{
      background:#058dc5;
    }
    .btn-default:focus{
      background:#058dc5;
      color:white;
    }



</style>