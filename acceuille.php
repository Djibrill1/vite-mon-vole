<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        require_once('./connexion_bd.php');
        $requet="SELECT * FROM `circuit`";
        $result= $connexion->query($requet);
    ?>
    <?php  while($a=$result->fetch_array(MYSQLI_ASSOC)):?>
        <p><?php echo $a['nom'];?></p>
        <p><?php echo $a['description'];?></p>
        <p><a href="circuit.php?id_circuit=<?php echo $a['id']?>">plus</a></p>
    <?php endwhile ?>     
</body>
</html>
