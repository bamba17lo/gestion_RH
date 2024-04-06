<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Attestation de travail</title>
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    h1 {
        text-align: center;
    }
    .section {
        margin-bottom: 20px;
    }
    .section h2 {
        border-bottom: 1px solid #000;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }
    .section p {
        margin-bottom: 10px;
    }
    .signature {
        margin-top: 50px;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Attestation de travail</h1>
    <div class="section">
        <h2>Employeur</h2>
        <p>Raison sociale : Afrik-Connect</p>
        <p>Adresse : Dakar</p>
        <p>Téléphone : 761545566</p>
        <p>Email : afrik.connect@gmail.com</p>
    </div>
    <div class="section">
        <h2>Employé</h2>
        <p>Nom complet : {{$user->nom_prenom}}</p>
        <p>Date de naissance : {{$user->donnee_personnelle->date_naissance}}</p>
        <p>Adresse : {{$user->donnee_personnelle->adresse}}</p>
      
    </div>
    <div class="section">
        <h2>Informations sur l'emploi</h2>
        <p>Poste occupé : {{$user->donnee_professionnelle->emploi}}</p>
        <p>Date de début : {{$user->donnee_professionnelle->contrat->date_debut}}</p>
        <p>Date de fin (le cas échéant) : {{$user->donnee_professionnelle->contrat->date_fin}}</p>
        
    </div>
    <div class="section signature">
        <p>Fait à [Dakar], le [{{now()}}]</p>
        <p>Signature de l'employeur : _______________________</p>
    </div>
</div>
</body>
</html>
