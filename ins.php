<?php
    require_once('./connexion_bd.php');
    $nom=$_GET['nom'];
    $prenom=$_GET['prenom'];
    $m=$_GET['mail'];
    $mdp=$_GET['passe'];
    $a=0;
    $req="SELECT * FROM `utilisateur`";
    $re=$connexion->query($req);
    while($n=$re->fetch_array()){
        if($m==$n['mail']){
            $a=1;
        }
    }
    if($a==0){
        echo 'inscription  reussi';
        $req="INSERT INTO `utilisateur_circuit`(`id`, `date_reservation`, `id_utilisateur`, `id_circuit`)
         VALUES ('".$nom."','".$prenom."','".$m."','".$mdp."')";
    }
    else{
        echo ' inscription echouer';
    }
?>