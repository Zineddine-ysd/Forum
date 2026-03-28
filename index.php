<?php 
session_start();
require ('actions/showall.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'include/head.php';?>

<body style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
    <br><br>
    <?php include 'include/navbar.php';?>
    
    <main class="container mt-3">
        <!-- Navigation du forum -->
        <div class="d-flex justify-content-center mb-3">
            <div class="btn-group" role="group">
               <br><br>
            </div>
        </div>

        <!-- Hero Search Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="display-6 mb-4" style="font-weight: 700; color: #2c3e50;">
                    Forum d'OncoClinic
                </h1>
                <p class="lead mb-4">Trouvez les réponses à vos questions/expériences</p>
                
                <form method="GET" class="bg-white rounded-pill shadow-sm p-1" style="max-width: 650px; margin: 0 auto;">
                    <div class="input-group input-group-lg">
                        <input type="text" name="search" 
                               class="form-control border-0 rounded-pill py-3" 
                               placeholder="Rechercher des questions..." 
                               style="box-shadow: none;">
                        <div class="input-group-append">
                            <button class="btn btn-gradient-primary rounded-pill px-4" 
                                    type="submit"
                                    style="margin-left: 0px; z-index: 2; height: calc(3.5rem + 2px);">
                                <i class="fas fa-search me-2"></i>Explorer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Questions List -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h4 mb-0" style="color: #2c3e50; font-weight: 600;">
                        Questions/expériences Populaires
                    </h2>
                    <span class="badge bg-primary rounded-pill">
                        <?= $showqst->rowCount() ?> questions/expériences
                    </span>
                </div>
                
                <?php if($showqst->rowCount() > 0): ?>
                    <?php while($qst = $showqst->fetch()): ?>
                        <div class="card mb-4 border-0 shadow-sm question-card">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center" 
                                 style="padding: 1.25rem 1.25rem 0;">
                                <h3 class="h5 mb-0" style="color: #3498db; font-weight: 600;">
                                    <?= htmlspecialchars($qst['titre']); ?>
                                </h3>
                                <span class="badge bg-gradient-primary rounded-pill">
                                    <?= date('d/m/Y', strtotime($qst['datepublication'])); ?>
                                </span>
                            </div>
                            <div class="card-body" style="padding: 1rem 1.25rem;">
                                <p class="card-text mb-3" style="color: #34495e; line-height: 1.6;">
                                    <?= nl2br(htmlspecialchars(substr($qst['contenu'], 0, 250))); ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-2">
                                            <?= strtoupper(substr(htmlspecialchars($qst['nomauteur']), 0, 1)); ?>
                                        </div>
                                        <small>Publié par <?= htmlspecialchars($qst['nomauteur']); ?></small>
                                    </div>
                                    <a href="article.php?id=<?= $qst['id']; ?>" class="btn btn-sm btn-outline-primary">
                                        Voir plus <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="text-center py-5 bg-white rounded-3 shadow-sm">
                        <div class="empty-state-icon mb-4">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <h3 class="h5 mb-3" style="color: #2c3e50;">Aucune question/expérience trouvée</h3>
                        <p class="text-muted mb-4">Soyez le premier à poser une question/expérience !</p>
                        <a href="publierQuestion.php" class="btn btn-gradient-primary rounded-pill px-4 py-2">
                            <i class="fas fa-plus me-2"></i>Poser une question/expérience
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-gradient-primary {
            background: linear-gradient(to right, #4776E6, #8E54E9);
            color: white;
            border: none;
            font-weight: 600;
        }
        .btn-gradient-primary:hover {
            background: linear-gradient(to right, #3a62c4, #7d47d1);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .question-card {
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .question-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        .empty-state-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
        }
        .bg-gradient-primary {
            background: linear-gradient(to right, #ff758c, #ff7eb3);
        }
    </style>
</body>
</html>