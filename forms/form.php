<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de Email</title>
</head>
<body>

    <form method="post" action="envio.php">
 
        <input type="text" name="nome" placeholder="nome">
        <input type="text" name="email" placeholder="E-mail">

        <textarea name="msg" id="msg"></textarea>

        <input type="submit" name="enviar" value="Enviar">
    </form>
    
</body>
</html>