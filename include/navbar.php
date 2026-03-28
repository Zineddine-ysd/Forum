<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum d'OncoClinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background: linear-gradient(135deg, #89CFF0, #62B6CB); /* Dégradé bleu clair */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            padding: 12px 20px;
            border-radius: 0px 0px 10px 10px; /* Arrondi en bas */
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff !important;
            font-size: 22px;
        }
        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #FFD700 !important; /* Doré au survol */
            text-shadow: 0px 0px 5px rgba(255, 215, 0, 0.7);
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-color: white;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="presentation.php">Forum d'OncoClinic</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les Questions/Experiences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publierQuestion.php">Publier une question/experience</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mesQuestions.php">Mes questions/experiences</a>
        </li>
      </ul>
      <?php
      if(isset($_SESSION['auth'])){
        ?>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-danger text-white" href="actions/logout.php">Se Déconnecter</a>
        </li>
        <?php  
       }?>
      </ul>
   
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
