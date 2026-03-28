<?php 
require('actions/securite.php');
require('actions/publierQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Publier une question/experience - OncoClinic</title>
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(to right, #ff758c, #ff7eb3);
            --card-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        
        .form-container {
            max-width: 700px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
            background: white;
            margin: 2rem auto;
        }
        
        .form-container:hover {
            transform: translateY(-5px);
        }
        
        .form-header {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .form-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.1), transparent);
        }
        
        .form-body {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            display: block;
            transition: color 0.3s ease;
        }
        
        .form-control {
            border: 2px solid #edf2f7;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 16px;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
            outline: none;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn-publish {
            background: var(--secondary-gradient);
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px;
            border-radius: 10px;
            width: 100%;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-size: 16px;
            letter-spacing: 0.5px;
        }
        
        .btn-publish:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.15);
        }
        
        .btn-publish:active {
            transform: translateY(0);
        }
        
        .alert-message {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .alert-danger {
            background: #fff5f5;
            color: #e53e3e;
            border: 1px solid #fc8181;
        }
        
        .alert-success {
            background: #f0fff4;
            color: #38a169;
            border: 1px solid #9ae6b4;
        }
        
        .form-section {
            margin-bottom: 1.8rem;
        }
        
        .nav-spacer {
            height: 80px;
        }
        
        .text-muted {
            color: #718096;
            font-size: 14px;
            margin-top: 6px;
            display: block;
        }
    </style>
</head>
<body>
    <?php include 'include/navbar.php'; ?>
    <div class="nav-spacer"></div>
    
    <div class="form-container">
        <div class="form-header">
            <h2 style="position: relative; z-index: 1;"><i class="fas fa-question-circle me-2"></i>Publier une nouvelle question ou bien votre experience</h2>
            <p class="mb-0" style="position: relative; z-index: 1;">Partagez votre experience/question avec la communauté OncoClinic</p>
        </div>
        
        <div class="form-body">
    <?php 
    if(isset($errorMSG)) {
        echo '<div class="alert-message alert-danger"><i class="fas fa-exclamation-circle me-2"></i>' . nl2br(htmlspecialchars($errorMSG)) . '</div>';
    } else if(isset($successMsg)) {
        echo '<div class="alert-message alert-success"><i class="fas fa-check-circle me-2"></i>' . nl2br(htmlspecialchars($successMsg)) . '</div>';
    }
    ?>
    
            
            <form method="POST" autocomplete="off">
                <div class="form-section">
                    <label for="title" class="form-label">Objet de la question/experience</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Donnez un titre clair à votre question/experience" required>
                </div>
                
                <div class="form-section">
                    <label for="description" class="form-label">Description courte</label>
                    <textarea class="form-control" id="description" name="Decription" rows="2" placeholder="Résumez brièvement votre question/experience" required></textarea>
                </div>
                
                <div class="form-section">
                    <label for="content" class="form-label">Contenu détaillé</label>
                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Décrivez votre question/experience en détails..." required></textarea>
                    <small class="text-muted">Soyez aussi précis que possible pour obtenir des réponses pertinentes</small>
                </div>
                
                <div class="form-section">
                    <label for="typeCancer" class="form-label">Type de cancer concerné</label>
                    <input type="text" class="form-control" id="typeCancer" name="typeCancer" placeholder="Ex: Cancer du sein, leucémie... (Si vous n'avez pas de cancer ecrivez 'RIEN')" required>
                </div>
                
                <button type="submit" class="btn btn-publish" name="valide">
                    <i class="fas fa-paper-plane me-2"></i> Publier ma question/experience
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation améliorée pour les champs du formulaire
        document.querySelectorAll('.form-control').forEach(input => {
            const label = input.parentNode.querySelector('.form-label');
            
            input.addEventListener('focus', function() {
                label.style.color = '#667eea';
                label.style.fontWeight = '700';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    label.style.color = '#4a5568';
                    label.style.fontWeight = '600';
                }
            });
            
            // Pré-remplissage si erreur de validation
            if(input.value) {
                label.style.color = '#667eea';
            }
        });
    </script>
</body>
</html>