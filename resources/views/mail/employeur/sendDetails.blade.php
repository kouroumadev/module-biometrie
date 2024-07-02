<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
</head>
<body>
    <p>
        <img src="{{ $message->embed(public_path('new logo.jpeg')) }}" alt="here logo">
    </p>
    <h3>Bonjour {{ $data['name'] }},</h3>
    <p>Votre dossier pour la demande de biometrie numero:  <span style="font-weight: bold; color: red;">{{ $data['num'] }}</span> a été traité par la Caisse Nationale de Sécurité Sociale (CNSS)</p>
    <p>{{ $data['content'] }}</p>
    <p>La CNSS vous remercie pour votre patience et votre bonne comprehension.</p>
    <p>Si vous souhaitez prendre un rendez-vous, veuillez <a href="https://www.reclamations.cnssgn.com/rendezvous/prendre">Cliquez ici</a></p>
    <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>
</html>
