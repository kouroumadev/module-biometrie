<!DOCTYPE html>
<html>

<head>
    <title>Mail</title>
</head>

<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo" style="width: 1000" height="120">
    </p>
    <h3>Bonjour Mme/Mr,

        <p>Votre demande d'enrollement a bien été reçu, pour l'entreprise <strong> {{ $raison_sociale }}</strong></p>
        <p> Notre équipe vous contactera par e-mail ou téléphone pour un rendez-vous merci</p>

        <p>Si vous souhaitez faire une reclamation, veuillez <a
                href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
        <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
