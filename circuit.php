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
        $id_circuit=$_GET['id_circuit'];
    ?>
    <?php $requet="SELECT * FROM `circuit` where `id`=".$id_circuit."";
        $result=$connexion->query($requet);?>
    <?php while($a=$result->fetch_array(MYSQLI_ASSOC)):?>
        <p><?php echo $a['nom'];?></p> 
        <p><?php echo $a['description']?></p>
        <p><?php echo $a['nombre_place_total']?></p>
        <p><?php echo $a['date_debut']?></p>
        <p><?php echo $a['date_fin']?></p>
        <p><?php echo $a['prix']?></p>
    <?php endwhile;?>
    <?php
        $requet="SELECT * FROM `circuit_deplacement` where `id_circuit`=".$id_circuit."";
        $result= $connexion->query($requet);?>
    <p>liste des deplacemnt</p>
    <?php while($a=$result->fetch_array(MYSQLI_ASSOC)):?>
        <?php 
            $requet="SELECT * FROM `deplacement` where `id`=".$a['id_deplacement']."";
            $resulta= $connexion->query($requet);
        ?>
        <?php while($b=$resulta->fetch_array(MYSQLI_ASSOC)):?>
            <p>heur de depart:<?php echo $b['heure_depart'];?></p>
            <p>ville de depart:
                <?php
                    $requet="SELECT * FROM `ville` where `id`=".$b['id_ville_depart']."";
                    $re=$connexion->query($requet);
                    while($c=$re->fetch_array(MYSQLI_ASSOC)){
                        echo $c['nom'];
                    }
                ?>
            </p>
            <p>hotel de depart:
                <?php
                    $requet="SELECT * FROM `ville` where `id`=".$b['id_ville_depart']."";
                    $re=$connexion->query($requet);
                    while($c=$re->fetch_array(MYSQLI_ASSOC)){
                        echo $c['hotel'];
                    }
                ?>
            </p>
            <p>description:<?php echo $b['planning_jour']?></p>
            <p>heur d'arriver:<?php echo $b['heure_arrivee'];?></p>
            <p>ville d'arriver:
                <?php
                    $requet="SELECT * FROM `ville` where `id`=".$b['id_ville_arrivee']."";
                    $re=$connexion->query($requet);
                    while($c=$re->fetch_array(MYSQLI_ASSOC)){
                        echo $c['nom'];
                    }
                ?>
            </p>
            <p>hotel d'arriver:
                 <?php
                    $requet="SELECT * FROM `ville` where `id`=".$b['id_ville_arrivee']."";
                    $re=$connexion->query($requet);
                    while($c=$re->fetch_array(MYSQLI_ASSOC)){
                        echo $c['hotel'];
                    }
                ?>
            </p>
        <?php endwhile?>
    <?php endwhile?>
</body>
</html>