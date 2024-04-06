<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contrat de travail</title>
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
    <h1>Contrat de travail</h1>
    <div class="section">
        <h2>Objet</h2>
        <p>L'Employeur engage l'Employé en qualité de {{$user->donnee_professionnelle->emploi}} à compter du {{$user->donnee_professionnelle->contrat->date_debut}}.</p>
    </div>
    <div class="section">
        <h2>Durée du contrat</h2>
        <p>Le présent contrat est conclu et prend effet à compter du {{$user->donnee_professionnelle->contrat->date_debut}}. Il pourra être résilié conformément aux dispositions de l'article 2 du présent contrat.</p>
    </div>
    <!-- Ajoutez les autres sections du contrat ici -->
    <div class="signature">
        <p>Pour l'Employeur,</p>
        <p>{{Auth::user()->nom_prenom}}</p>
        <br>
        <p>Pour l'Employé,</p>
        <p>{{$user->nom_prenom}}</p>
    </div>
</div>
</body>
</html>
