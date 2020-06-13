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
                  echo "<li><a href='detaill.php?idc={$tab['id_cat']}'>{$tab['libelle']}</a></li>";
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



    <form method="post" enctype="multipart/form-data" class="forms"><br><br>

          <h2  style="text-align:center;">Ajouter un nouveau produit</h2><br><br>


        <input type="text" name="num" placeholder="votre numero de produit" class="num form-control"><br>
        <input type="text" name="lib" placeholder="Nom de votre produit" class="num form-control"><br>
         <h4 style="margin-left:32%;">choisir une categorie:</h4><br>
         <?php

         include ('bd.php');
         $req=mysqli_query($connexion,"SELECT * FROM categorie");
         while ($tab=mysqli_fetch_array($req)) {
         echo "<span><input type='radio' name='cat' value='{$tab['id_cat']}'>{$tab['libelle']}</span><br><br>";
         }

         ?>

         

         <textarea name="det" row="3" placeholder="Entrer une description de votre produit" class="num form-control"></textarea><br>

         <input type='file' name='pic[]' multiple="multiple" class=" btn  num"><br>

         <input type="submit" name="ok" value="envoyer" class=" btn btn-primary  benv"><br>


    </form><br><br><br>


    <?php
    if (isset($_POST['ok'])) {
      include 'bd.php';
     //-------------------Variables de formulaires ---------------------
      $date=date("F j, Y, g:i a");
      $cat=$_POST['cat'];
      $des=$_POST['det'];
      $num=$_POST['num'];
      $lib=$_POST['lib'];
      $iduser=$_SESSION['iduser'];
     //------------------------------------------------------------------
      $ts=mysqli_query($connexion,"INSERT INTO produit VALUES('$num','$lib','$date','$des','1','$iduser','$cat')");


       for ($i=0; $i<=count($_FILES['pic']) ; $i++) {
    //-------------------Enregistrer l'images dans base donne---------------------------
       $pic=$_FILES['pic']['name'][$i];
       if(move_uploaded_file($_FILES['pic']['tmp_name'][$i],"image/prodimage/$pic")) {
          $jt=mysqli_query($connexion,"INSERT INTO photo VALUES('','$pic','$num')");
       }
    //----------------------------------------------------------------------------------

       error_reporting(0);

      }

    }


    ?>


    <!-- /.footer -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<style>

body{
  background:#f5f4;

}
.benv{
margin-bottom:7%;
width:38%;
margin-left:31%;
padding-left:15px;
padding-top:10px;
padding-bottom:10px;
}

.forms{
  margin-left:18%;
  margin-top:10%;
  width:65%;
  height:50%;
  background:#f4f3f3;
  border-radius:5px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.1);
}
.cors{
width:57%;
height:590px;
background:red;
position:relative;
left:22.5%;
top:-195px;

}

.num , span{
  width:38%;
  margin-left:31%;
  padding-left:15px;
  padding-top:5px;
  padding-bottom:5px;

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
		margin-top:8px;
		margin-left:25px;
		background:#058dc5;
		padding:7px;
		color:white;
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
