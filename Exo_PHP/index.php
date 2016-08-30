<!DOCTYPE html>

<html>

<head>
    <title>Panier</title>
    <meta charset="utf-8" />
</head>

<body>
    <form method="post" id="myForm">

        <p>
            <label for="produit">Chaussette</label>
            <input type="text" name="prix" id="prix" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prix'])){echo $_POST['prix'];} ?>" />
            <input type="text" name="TVA" id="TVA" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVA'])){echo $_POST['TVA'];} ?>" />
            <input type="text" name="quantite" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantite'])){echo $_POST['quantite'];} ?>" />
        </p>
        <p>
            <label for="produit">Slip</label>
            <input type="text" name="prixF" id="prixF" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prixF'])){echo $_POST['prixF'];} ?>" />
            <input type="text" name="TVAF" id="TVAF" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVAF'])){echo $_POST['TVAF'];} ?>" />
            <input type="text" name="quantiteF" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantiteF'])){echo $_POST['quantiteF'];} ?>" />
        </p>
        <p>
            <label for="produit">Chaussette</label>
            <input type="text" name="prixS" id="prix" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prixS'])){echo $_POST['prixS'];} ?>" />
            <input type="text" name="TVAS" id="TVA" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVAS'])){echo $_POST['TVAS'];} ?>" />
            <input type="text" name="quantiteS" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantiteS'])){echo $_POST['quantiteS'];} ?>" />
        </p>

        <select name="mois">
           <?php
            for($j=1; $j<13; $j++){
                echo "<option value='$j'";
                if ($_POST['mois']==$j  ) {
                    echo "selected='selected'";
                }
                echo ">$j</option>";
            }
            ?>
        </select>
        <select name="annee">
           <?php
            for($i=2016; $i<2029; $i++){
                echo "<option value='$i'";
                if ($_POST['annee']==$i ) {
                    echo "selected='selected'";
                }
                echo ">$i</option>";
            }
            ?>
            
        </select>
        <p>
            <label for="anniversaire">Date de naissance</label>
            <input type="text" name="naissance" placeholder="(JJ/MM/AAAA)" value="<?php if (isset($_POST[ 'naissance'])){echo $_POST[ 'naissance'];} ?>">
        </p>
        <p>
            <label for="anniversaire">Ajouté 2 nombres :</label>
            <input type="text" name="nombreP" placeholder="Entrer le premier chiffre" value="<?php if (isset($_POST[ 'nombreP'])){echo $_POST[ 'nombreP'];} ?>">
            <input type="text" name="nombreS" placeholder="Entrer le deuxieme chiffre" value="<?php if (isset($_POST[ 'nombreS'])){echo $_POST[ 'nombreS'];} ?>">
        </p>
        <p>
            <input type="submit" value="Calculer" name="envoyer" />
        </p>
    </form>

    <?php
        
session_start();
if(isset ($_POST["envoyer"])){
    
$prix = $_POST['prix'];
$tva = $_POST['TVA'];
$quantite = $_POST['quantite'];
$prixF = $_POST['prixF'];
$tvaF = $_POST['TVAF'];
$quantiteF = $_POST['quantiteF'];
$prixS = $_POST['prixS'];
$tvaS = $_POST['TVAS'];
$quantiteS = $_POST['quantiteS'];

$prixtotal = ($prix + ($tva*$prix)/100) * $quantite;


$prixtotalF = ($prixF + ($tvaF*$prixF)/100) * $quantiteF;


$prixtotalS = ($prixS + ($tvaS*$prixS)/100) * $quantiteS;

$supertotal = ($prixtotal + $prixtotalF + $prixtotalS);
echo ("Le prix total TTC : $supertotal"). "<br>";

 $tab = array($prixtotal, $prixtotalF, $prixtotalS);
    print_r("Le prix le plus élevé est de ");
    echo (max($tab)) ."<br>";
    
 $tab = array($prixtotal, $prixtotalF, $prixtotalS);
    print_r("Le prix le moins élevé est de ");
    echo (min($tab));  

$annee = ($_POST['annee']);
$mois = ($_POST['mois']);
    
$number = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
echo "</br> Il y a $number jours en $month $annee.";
    

$date = ($_POST['naissance']);
if (preg_match('#^([0-9]{2})([/-])([0-9]{2})\2([0-9]{4})$#', $date, $m) == 1 && checkdate($m[3], $m[1], $m[4])) 
{
  echo "</br> Votre date de naissance est OK !";
}
else
{
  echo "</br> Votre date de naissance est érronée !";
}
 
$premierNombre = ($_POST['nombreP']);
$n = ($_POST['nombreS']);
 
for ($i = $premierNombre; $i <= $n; $i++){
    if ($i%2==0){
        echo "<p class='pair'>$i</p>";
    }
    else {
        echo "<p class='impair'>$i</p>";
    }
        $racine = (sqrt($i));
        if (is_int($racine) == "true"){
            echo "<p class='carre'>$i</p>";

        }
    }
   
}
    
    
 /* 2e algo - OK   
$number = range($premierNombre,$n);
print_r($number);

}
    
/*

    $premierNombre = ($_POST['nombreP']);
    $secondNombre = ($_POST['nombreS']);
    $tab = array();
    array_push($tab, $secondNombre);
    array_unshift($tab, $premierNombre);
    print_r ($tab);
    
if ( $mois == '1'){
    $month = "janvier";
}
if ( $mois == '2'){
    $month = "février";
}
if ( $mois == '3'){
    $month = "mars";
}
if ( $mois == '4'){
    $month = "avril";
}
if ( $mois == '5'){
    $month = "mai";
}
if ( $mois == '6'){
    $month = "juin";
}
if ( $mois == '7'){
    $month = "juillet";
}
if ( $mois == '8'){
    $month = "août";
}
if ( $mois == '9'){
    $month = "septembre";
}
if ( $mois == '10'){
    $month = "octobre";
}
if ( $mois == '11'){
    $month = "novembre";
}
if ( $mois == '12'){
    $month = "décembre";
}*/
?>
<style>
    .pair {
        color:blue;
    }
    .impair {
        color: orange;
    }
    
    .carre {
        font-weight: bold;
    }
    
    
    </style>
</body>

</html>