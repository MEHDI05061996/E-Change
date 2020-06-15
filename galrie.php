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

        <nav class="navbar navbar-inverse navbar-fixed-top anav" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">e-change</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Smartphone</a>
                    </li>
                    <li>
                        <a href="#">Immobilier</a>
                    </li>
                    <li>
                        <a href="#">Vehicule</a>
                    </li>
                    <li>
                        <a href="#">Accessoire</a>
                    </li>
                    <li>
                        <a href="#">Photographie</a>
                    </li>
                    <li>
                        <a href="#">Electronique</a>
                    </li>
                    <li>
                        <a href="#">contactez-nous</a>
                    </li>
                    <li>
                        <a href="#">Equipes</a>
                    </li>
                    <li>
                        <a href="#">Inscription</a>
                    </li>
                     <li>
                        <a href="#">connexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav><br/><br/><br/><br/><br/><br/><br/>
<header class="business-header">
     </header>
<div class="container">
<div class="row">
<div class="featurette col col-lg-6 col col-sm-7  col col-md-6 lst">
   <div class="featurette-inner text-center">
      <form role="form" class="search">
         <h3 class="no-margin-top h1 primary stl "><img src="image/logo.png"></h3>


         <div class="input-group input-group-lg">
            <input type="search" placeholder="Chercher " class="form-control transparent-input" >
            <span class="input-group-btn">
            <button class="btn btn-primary" type="button" style="font-size:12px;font-weight:bold;">Chercher</button>
            </span>
         </div>
         <!-- /input-group -->
      </form>
      <!-- /.max-width on this form -->

   </div>
   <!-- /.featurette-inner (display:table-cell) -->

</div>
</div>
</div>


<?php for ($i=0; $i<10 ; $i++) { ?>

<div class="container" style="margin-left:17.5%;margin-top:-3%;">
    <div class="row">

        <div class="[ col-xs-12 col-sm-offset-1 col-sm-9 col-lg-7 col-md-7 ]" >
            <div class="[ panel panel-default ] panel-google-plus" style="box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1), 0 2px 10px 0 rgba(0,0,0,0.1);">

                <div class="panel-google-plus-tags">
                    <ul>
                        <li>#Categorie</li>

                    </ul>
                </div>
                <div class="panel-heading">
                    <img class="[ img-circle pull-left ]" src="categorie/photop.png" alt="Mouse0270" />
                    <h3>Achaachaa Khalil</h3>
                    <h5><span>Fes</span> - <span>Jun 27, 2017</span> </h5>
                </div>
                <div class="panel-body">
                    <hr>

                    <p>J'ais besoin d'echanger mon smatphone samsung galaxy s5 bonne etat comme neuf  plus un montant de 20$ avec un iphone 5s  </p>
                    <button type="button" class="btn btn-primary">Voir Plus</button>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <img src="categorie/imgcat1.png" class="rounded" alt="..." style="margin-left:2%;border-radius:5px;">
                    <img src="categorie/imgcat2.png" class="rounded" alt="..." style="margin-left:2%;border-radius:5px;">
                    <img src="categorie/imgcat3.png" class="rounded" alt="..." style="margin-left:2%;border-radius:5px;">
                    <img src="categorie/imgcat4.png" class="rounded" alt="..." style="margin-left:2%;border-radius:5px;">


               </div>

            </div>
        </div>

    </div>



</div>


<?php }?>









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
    background:url('for.png') center center no-repeat scroll;
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
</style>
