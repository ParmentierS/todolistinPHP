

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Ajouter une tâche</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
try
{
    function sanitize($data) 
    {
        /*  https://www.w3schools.com/php/func_string_trim.asp 
        trim all of the following characters are removed:

        "\0" - NULL
        "\t" - tab
        "\n" - new line
        "\x0B" - vertical tab
        "\r" - carriage return
        " " - ordinary white space
        */
        $data = trim($data);
        /*https://www.php.net/manual/fr/function.stripslashes.php
        stripslashes delete antislashes \ from the string */  
        $data = stripslashes($data);
        /*htmlspecialchars transform <, > & ' and " characters */
        $data = htmlspecialchars($data);
        return $data;
    
    }
    
    //echo $_POST;
    /*foreach ($_POST as $key => $value) {
        echo " cle : $key -> value : $value ";
    }*/
    if($_POST && $_POST["list-item"])
    {
        echo "defini";
        $sanitized_item = sanitize($_POST["list-item"]);
        echo "<br>";
        echo $sanitized_item;
        /*$fp = fopen("todo.json","r");
        $i=0;
        while(!feof($fp)) 
        { 
            $i++;
            $fichier_texte=fgets($fp,1024);
            echo "$fichier_texte"; 
            echo "<br> $i";
        } 
        fclose($fp);
        */
        $json = file_get_contents('todo.json');

        //Decode JSON
        $json_data = json_decode($json,true);

        //Print data
        print_r($json_data);

        $new_data = new stdClass;
        $new_data-> aim = $sanitized_item;
        $new_data-> done = false;
        array_push($json_data, $new_data);

        $new_json = json_encode($json_data, JSON_PRETTY_PRINT);

        //write json data into data.json file
       if(file_put_contents('todo.json', $new_json)) 
        {
            echo 'Data successfully saved';
        }
        else 
            echo "error";



         
    }
    else
    {
        echo "pas defini";
    }

//function to sanitize the data (to strip it from SQL syntax, javascript code and html tags)





}
catch(Exception $e)
{
   echo "Erreur";
}

?>
    <h1>Ajouter une tache</h1>
    <form class="sending-form" method="POST">
        <h5>la tâche à effectuer</h5>
        <input type="textarea" id="list-item" name="list-item" placeholder="<o/ Entrez votre tâche \o>" class="form-control validate">
        <button class="btn" id="add-item" type="submit" name="submit">Ajouter</button>
    </form>
</body>