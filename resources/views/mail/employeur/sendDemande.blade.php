<!DOCTYPE html>
<html>

<head>
    <title>Mail</title>
</head>

<body>
    <div style="width: 500px; height:200px">
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo" style="width: inherit"
            height="inherit">
    </div>
    <h3>Bonjour,

        <p>Votre demande d'enrollement a bien été reçu, pour l'entreprise <strong> {{ $raison_sociale }}</strong></p>
        <p> Notre équipe vous contactera par e-mail ou téléphone pour un rendez-vous merci</p>

        <p>Si vous souhaitez faire une reclamation, veuillez <a
                href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
        <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
