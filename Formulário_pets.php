<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

</head>

    <form method="post" action="Interface_principal.php">

        <input type="text" name="nome"> <br>

        <input type="date" name="nascimento"> <br>

        <select name="especie"> <br>
            <option value="1">Cachorro</option>
            <option value="2">Gato</option>
            <option value="3">Pássaro</option>
            <option value="4">Hamster</option>
            <option value="5">Coelho</option>
        </select><br>

        <input type="textarea" name="prontuario"> <br>

        <input type="radio" name="f" value="femea"> 
        <label for="femea">Fêmea</label><br>        
        <input type="radio" name="m" value="macho"> 
        <label for="macho">Macho</label><br>

    </form>

</html>