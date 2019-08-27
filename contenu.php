

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Les taches à faire</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
try
{
    
    $json = file_get_contents('todo.json');
    //Decode JSON
    $json_data = json_decode($json,true);
    $size = count($json_data);


}
catch(Exception $e)
{
   echo "Erreur";
}

?>
    <h3>A Faire</h3>
    <section id="thingstodo">
        <ul>
            <?php 
                for($i=0;$i<$size;$i++)
                {
                    if(! $json_data[$i]["done"])
                    {
                        $aim = $json_data[$i]["aim"];
                        echo '<li>';
                        echo '<input type="checkbox" id="scales" name="scales"
                        >';
                        echo  '<label for="scales">';
                        echo $aim;
                        echo '</label>';
                        echo '</li>';
                    }
                }
            ?>
        </ul>
        <button class="btn" id="add-item" type="submit" name="submit">Enregistrer</button>
    </section>
    <h3>Archive</h3>
    <section id="thingsdone">
        <ul>
        <?php 
            for($i=0;$i<$size;$i++)
            {
                if($json_data[$i]["done"])
                {
                    $aim = $json_data[$i]["aim"];
                    echo '<li>';
                    echo '<input type="checkbox" id="scales" name="scales"
                    >';
                    echo  '<label for="scales">';
                    echo $aim;
                    echo '</label>';
                    echo '</li>';
                }
            }
        ?>
        </ul>
    </section>
    <script src="save.js"></script>
</body>