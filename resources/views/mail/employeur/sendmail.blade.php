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
    <h3>Bonjour Mme/Mr,

        <p>Votre OTP est: <span style="font-weight: bold; color: red;">{{ $otp }}</span></p>

        <p>Si vous souhaitez faire une reclamation, veuillez <a
                href="https://www.reclamations.cnssgn.com/reclamation/create">Cliquez ici</a></p>
        <p>NB: Veuilliez ne pas repondre a ce mail.</p>

</body>

</html>
