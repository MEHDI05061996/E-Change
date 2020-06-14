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
    <link href="css/style.css" rel="stylesheet">

   

</head>

<body>

    <!-- Navigation -->
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
    </nav><br><br><br><br><br><br><br><br><br>




    <form method="post" class="form-horizontal">
    <fieldset>

    <!-- Form Name -->
       <h2  style="text-align:center;">Contactez-nous</h2><br><br>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 col-lg-4 control-label" for="fn"></label>
      <div class="col-md-4">
      <input id="fn" name="nom" type="text" placeholder="Votre nom" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ln"></label>
      <div class="col-md-4">
      <input id="ln" name="email" type="text" placeholder="Votre email" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ln"></label>
      <div class="col-md-4">
          <textarea id="ln" name="message" type="text" placeholder="Votre messages ici" class="form-control input-md" required=""></textarea>

      </div>
    </div>


    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button name="envoyer" id="submit" name="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </div>

    </fieldset>
     <?php
                     include 'bd.php';
                     if(isset($_POST['envoyer'])) {

                        $nom=$_POST['nom'];
                        $email=$_POST['email'];                
                        $message=$_POST['message'];

                        @mysqli_query($connexion,"INSERT INTO contacter VALUES('','$nom','$email','$message')");

                        echo "<p class='alert alert-success text-center' style='width:55%;position: relative;top: -28em;left: 24em;'>Votre demande sera traiter et on vous répondre le plus tôt possible</p>";

                     }

                    ?>
    </form>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<style>

</style>
