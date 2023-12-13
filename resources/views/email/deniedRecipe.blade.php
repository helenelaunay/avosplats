<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message</title>
</head>
<body>
    <h2>Nouveau message via le formulaire de contact</h2>
    
    <p><strong>Nom :</strong> {{ $data['nom'] }}</p>
    <p><strong>Prénom :</strong> {{ $data['prenom'] }}</p>
    <p><strong>E-mail :</strong> {{ $data['email'] }}</p>
    
    <p><strong>Message :</strong></p>
    <p>{{ $data['message'] }}</p>

</body>
</html>
