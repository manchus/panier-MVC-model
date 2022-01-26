<!Doctype html>
<html>
    <head>
        <title>Le Epicerie</title>

       <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	    <script src="js/app.js"></script> 
     
    </head>
    <body>    
    <?php include("login.php");?>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="navbar-brand"><img src="mvc_pr/icons/lepiceri.jpg" alt="" width="140" height="70"></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="mvc_pr/produit">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sections
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="mvc_pr/produit?choix=fruit">Fruits</a>
                  <a class="dropdown-item" href="mvc_pr/produit?choix=legume">Légumes</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="mvc_pr/produit">
              <input class="form-control mr-sm-2" type="search" placeholder="Produit" aria-label="Search" name="produit" >
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><img src="mvc_pr/icons/search.png" alt="" width="30" height="30"> </button>
            </form>

            <ul class="navbar-nav navbar-right">
              <li class="nav-item active">
                <a class="nav-link disabled" href="#"><h5>
                <?php if (isset($_COOKIE['logged_in_user_prenom'])) {
                        echo "Hi ".$_COOKIE['logged_in_user_prenom']."!";}
                      else { echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                 ?></h5></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mvc_pr/panier">
                <div class="badge badge-secondary text-wrap" style="width: 12rem;">
                <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
              <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
            </svg>
                Panier</h5> 
            </div>
            </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Se connecter
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" data-toggle="modal" data-target="#datalogin">Connexion</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#dataadmin">Admininstrator</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="mvc_pr/client?logoff=true">Sortir</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">&nbsp;</a>
              </li>
            </ul>

          </div>
        </nav>
     

