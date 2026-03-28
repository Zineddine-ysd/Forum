<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>Présentation du Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            animation: fadeIn 1.5s ease-in-out;
        }
        .container {
            text-align: center;
            max-width: 790px;
        }
        .card {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.3);
            transform: scale(0.95); /* Réduction légère de l’échelle initiale */
            transition: transform 0.5s ease-in-out;
            overflow: hidden;
        }
        .card:hover {
            transform: scale(1); /* Avant c'était 1.02, maintenant c'est 1 */
        }
        h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: #ff5f6d;
            animation: slideIn 1.2s ease-in-out;
        }
        p {
            font-size: 1.3rem;
            color: #444;
            opacity: 0;
            animation: fadeInText 1.5s ease-in-out forwards;
        }
        .btn-primary {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            border: none;
            padding: 14px 25px;
            font-size: 1.3rem;
            border-radius: 50px;
            transition: 0.3s;
            box-shadow: 0px 5px 20px rgba(255, 117, 140, 0.4);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            transform: scale(1.01); /* Avant c'était 1.05, maintenant c'est 1.03 */
            box-shadow: 0px 8px 30px rgba(255, 117, 140, 0.6);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes fadeInText {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Bienvenue sur le Forum d'OncoClinic !</h1>
            <p style="animation-delay: 0.5s;">💬 Un espace de partage et de soutien où chaque voix compte.</p>
            <p style="animation-delay: 0.7s;">🌟 Racontez votre vécu, posez vos questions, échangez avec la communauté.</p>
            <p style="animation-delay: 0.9s;">🤝 Ensemble, nous sommes plus forts !</p>
            <p style="animation-delay: 1.1s;">🌈 Trouvez l'espoir et des conseils précieux auprès de personnes qui comprennent votre situation.</p>
            <p style="animation-delay: 1.3s;">💪 Chaque jour est une nouvelle opportunité de progresser et de s'entraider.</p>
            <p style="animation-delay: 1.5s;">🌻 Ici, vous n'êtes jamais seul(e). Rejoignez une communauté bienveillante et solidaire.</p>
            <a href="index.php" class="btn btn-primary mt-4" style="animation-delay: 1.8s; animation: fadeIn 1.5s ease-in-out forwards;">Rejoindre le Forum</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
