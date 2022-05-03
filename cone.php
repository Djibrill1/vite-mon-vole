<?php
    require_once('./connexion_bd.php');
    $m=$_GET['mail'];
    $p=$_GET['passe'];
    $a=0;
    $req="SELECT * FROM `utilisateur`";
    $re=$connexion->query($req);
    while($n=$re->fetch_array()){
        if($m==$n['mail']){
            if($p==$n['mdp']){
                $a=1;
            }
        }
    }
    if($a==1){
        echo 'connexion reussi';
    }
    else{
        echo 'echouer';
    }
?>