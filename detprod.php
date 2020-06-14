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
    </nav><br/><br/><br/><br/><br/><br/><br/><br>
<?php 

include 'bd.php';
//-----------------------------requette categorie-----------------------------
$idcat=$_GET['idc'];
$c=mysqli_query($connexion,"SELECT * FROM categorie WHERE id_cat='$idcat'");
$lib=mysqli_fetch_array($c);
$libb=$lib['libelle'];
//----------------------------------------------------------------------------
$r=mysqli_query($connexion,"SELECT * FROM produit WHERE id_cat='$idcat'");
while($tp=mysqli_fetch_array($r)) {
$idprod=$tp['id_prod'];
$id_user=$tp['id_user'];
$dat=$tp['date_ajout'];
$des=$tp['description'];
//-----------------------------requette user----------------------------------
$ruser=mysqli_query($connexion,"SELECT * FROM user WHERE id_user='$id_user'");
$quser=mysqli_fetch_array($ruser);
$nom=$quser['nom']."&nbsp".$quser['prenom'];
$ville=$quser['ville'];
$avat=$quser['avatar'];


    
echo "
<div class='container' style='margin-left:17.5%;margin-top:-3%;'>
    <div class='row'>

        <div class='[ col-xs-12 col-sm-offset-1 col-sm-9 col-lg-7 col-md-7 ]' >
            <div class='[ panel panel-default ] panel-google-plus' style='box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.1);'>

                <div class='panel-google-plus-tags'>
                    <ul>
                        <li>$libb</li>

                    </ul>
                </div>
                <div class='panel-heading'>
                    <img class='[ img-circle pull-left ]' src='image/avatar/$avat' style='width:7%;'/>
                    <h3>$nom</h3>
                    <h5><span>$ville</span> - <span>$dat</span> </h5>
                </div>
                <div class='panel-body'>
                    <hr>

                    <p>$des</p>
                    <a href='detaill.php?idp=$idprod' class='btn btn-primary'>Voir Plus</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                   

                    //-----------------------------requette photo----------------------------------
                    $rphoto=mysqli_query($connexion,"SELECT * FROM photo WHERE id_prod='$idprod'");
                    while($tphoto=mysqli_fetch_array($rphoto)) {
                    $img=$tphoto['photo'];
                    

                   echo "
                    <img src='image/prodimage/$img' class='rounded' alt='...' style='margin-left:2%;border-radius:5px;width:12%;'>";

                }
              echo "
               </div>

            </div>
        </div>

    </div>



</div>";

}
?>
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
 body{
   background:#f5f4f4;
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

    .lst{
        margin-left:25%;
        margin-top:-25%;
    }
    .stl{
        color:aliceblue;
    }
    input.transparent-input{
      background-color: rgba(255,255,255,0.8);
      color:#365461;

    }
.business-header {
    height:390px;
    background:url('det.png') center center no-repeat scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    margin-top:-165px;
}

@import url(http://fonts.googleapis.com/css?family=Roboto:400,700);


.panel-google-plus {
    position: relative;
    border-radius: 0px;
    border: 1px solid rgb(216, 216, 216);
    font-family: 'Roboto', sans-serif;
}
.panel-google-plus > .dropdown {
    position: absolute;
    top: 5px;
    right: 15px;
}
.panel-google-plus > .dropdown > span > span {
    font-size: 10px;
}
.panel-google-plus > .dropdown > .dropdown-menu {
    left: initial;
    right: 0px;
    border-radius: 2px;
}
.panel-google-plus > .panel-google-plus-tags {
    position: absolute;
    top: 35px;
    right: -3px;
}
.panel-google-plus > .panel-google-plus-tags > ul {
    list-style: none;
    padding: 0px;
    margin: 0px;
}
.panel-google-plus > .panel-google-plus-tags > ul:hover {
    box-shadow: 0px 0px 3px rgb(0, 0, 0);
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.25);
}
.panel-google-plus > .panel-google-plus-tags > ul > li {
    display: block;
    right: 0px;
    width: 0px;
    padding: 5px 0px 5px 0px;
    background-color: rgb(245, 245, 245);
    font-size: 12px;
    overflow: hidden;
}
.panel-google-plus > .panel-google-plus-tags > ul > li::after {
    content:"";
    position: absolute;
    top: 0px;
    right: 0px;
    height: 100%;
	border-right: 3px solid rgb(66, 127, 237);
}
.panel-google-plus > .panel-google-plus-tags > ul:hover > li,
.panel-google-plus > .panel-google-plus-tags > ul > li:first-child {
    padding: 5px 15px 5px 10px;
    width: auto;
    cursor: pointer;
    margin-left: auto;
}
.panel-google-plus > .panel-google-plus-tags > ul:hover > li {
    background-color: rgb(255, 255, 255);
}
.panel-google-plus > .panel-google-plus-tags > ul > li:hover {
    background-color: rgb(66, 127, 237);
    color: rgb(255, 255, 255);
}
.panel-google-plus > .panel-heading,
.panel-google-plus > .panel-footer {
    background-color: rgb(255, 255, 255);
    border-width: 0px;
}
.panel-google-plus > .panel-heading {
    margin-top: 20px;
    padding-bottom: 1px;
}
.panel-google-plus > .panel-heading > img {
    margin-right: 15px;
}
.panel-google-plus > .panel-heading > h3 {
    margin: 0px;
    font-size: 14px;
    font-weight: 700;
}
.panel-google-plus > .panel-heading > h5 {
    color: rgb(153, 153, 153);
    font-size: 12px;
    font-weight: 400;
}
.panel-google-plus > .panel-body {
    padding-top: 5px;
    font-size: 13px;
}
.panel-google-plus > .panel-body > .panel-google-plus-image {
    display: block;
    text-align: center;
    background-color: rgb(245, 245, 245);
    border: 1px solid rgb(217, 217, 217);
}
.panel-google-plus > .panel-body > .panel-google-plus-image > img {
    max-width: 100%;
}

.panel-google-plus > .panel-footer {
    font-size: 14px;
    font-weight: 700;
    min-height: 54px;
}
.panel-google-plus > .panel-footer > .btn {
    float: left;
    margin-right: 8px;
}
.panel-google-plus > .panel-footer > .input-placeholder {
    display: block;
    margin-left: 98px;
    color: rgb(153, 153, 153);
    font-size: 12px;
    font-weight: 400;
    padding: 8px 6px 7px;
    border: 1px solid rgb(217, 217, 217);
    border-radius: 2px;
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
}
.panel-google-plus.panel-google-plus-show-comment > .panel-footer > .input-placeholder {
    display: none;
}
.panel-google-plus > .panel-google-plus-comment {
    display: none;
    padding: 10px 20px 15px;
    border-top: 1px solid rgb(229, 229, 229);
    background-color: rgb(245, 245, 245);
}
.panel-google-plus.panel-google-plus-show-comment > .panel-google-plus-comment {
    display: block;
}
/*.panel-google-plus > .panel-google-plus-comment > img {
    float: left;
}*/
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea {
    float: right;
    width: calc(100% - 56px);
}
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > textarea {
    display: block;
    /*margin-left: 60px;
    width: calc(100% - 56px);*/
    width: 100%;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(217, 217, 217);
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
    resize: vertical;
}
.panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
    margin-top: 10px;
    margin-right: 8px;
    width: 100%;
}
@media (min-width: 992px) {
    .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > .btn {
        width: auto;
    }
}


.panel-google-plus .btn {
    border-radius: 3px;
}
.panel-google-plus .btn-default {
    border: 1px solid rgb(217, 217, 217);
    box-shadow: rgba(0, 0, 0, 0.0470588) 0px 1px 0px 0px;
}
.panel-google-plus .btn-default:hover,
.panel-google-plus .btn-default:focus,
.panel-google-plus .btn-default:active {
    background-color: rgb(255, 255, 255);
    border-color: rgb(0, 0, 0);
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
