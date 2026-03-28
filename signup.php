<?php require('actions/SignupAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <title>Inscription - OncoClinic</title>
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --accent-color: #4fc3f7;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        
        .signup-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .signup-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .form-title {
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s;
            margin-bottom: 15px;
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
        }
        
        .btn-signup {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-signup:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .error-message {
            background-color: #fdecea;
            color: var(--error-color);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        .success-message {
            background-color: #e8f5e9;
            color: var(--success-color);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        .signin-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--primary-color);
            font-weight: 500;
            transition: color 0.3s;
            text-decoration: none;
        }
        
        .signin-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        
        .password-hint {
            font-size: 13px;
            color: #666;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
  <br><br>
    <?php include 'include/navbar.php'; ?>
    
    <div class="signup-container">
        <h2 class="form-title"><i class="fas fa-user-plus me-2"></i>Créer un compte</h2>
        
        <?php if(isset($errorMSG)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($errorMSG) ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($successMsg)): ?>
            <div class="success-message">
                <i class="fas fa-check-circle me-2"></i><?= htmlspecialchars($successMsg) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname" placeholder="Votre nom de famille" required>
            </div>
            
            <div class="form-group">
                <label for="Prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname" placeholder="Votre prénom" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" placeholder="Créez un mot de passe sécurisé" required>
              
            </div>
            
            <button type="submit" class="btn btn-signup" name="valide">
                <i class="fas fa-user-edit me-2"></i>S'inscrire
            </button>
            
            <a href="signin.php" class="signin-link">
                <i class="fas fa-sign-in-alt me-2"></i>J'ai déjà un compte, me connecter
            </a>
        </form>
    </div>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>