<?php 
require('actions/SigninAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'include/head.php'; ?>
    <title>Connexion - OncoClinic</title>
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --accent-color: #4fc3f7;
            --error-color: #e74c3c;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        
        .login-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .login-container:hover {
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
        }
        
        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(79, 195, 247, 0.2);
        }
        
        .btn-login {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 15px;
        }
        
        .btn-login:hover {
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
        
        .signup-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--primary-color);
            font-weight: 500;
            transition: color 0.3s;
            text-decoration: none;
        }
        
        .signup-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .form-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <br><br>
    <?php include 'include/navbar.php'; ?>
    
    <div class="login-container">
        <h2 class="form-title"><i class="fas fa-sign-in-alt me-2"></i>Connexion</h2>
        
        <?php if(isset($errorMSG)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($errorMSG) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="firstname" placeholder="Entrez votre nom" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" name="lastname" placeholder="Entrez votre prénom" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn btn-login" name="valide">
                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
            </button>
            
            <a href="signup.php" class="signup-link">
                <i class="fas fa-user-plus me-2"></i>Je n'ai pas de compte, je m'inscris
            </a>
        </form>
    </div>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>