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
            <input type="text" name="prix" id="prix" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prix'])){echo $_POST['prix'];} ?>"/>
            <input type="text" name="TVA" id="TVA" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVA'])){echo $_POST['TVA'];} ?>"/>
            <input type="text" name="quantite" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantite'])){echo $_POST['quantite'];} ?>"/>
        </p>
          <p>
            <label for="produit">Slip</label>
            <input type="text" name="prixF" id="prixF" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prixF'])){echo $_POST['prixF'];} ?>"/>
            <input type="text" name="TVAF" id="TVAF" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVAF'])){echo $_POST['TVAF'];} ?>"/>
            <input type="text" name="quantiteF" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantiteF'])){echo $_POST['quantiteF'];} ?>"/>
        </p>
          <p>
            <label for="produit">Chaussette</label>
            <input type="text" name="prixS" id="prix" placeholder="PrixHT" size="30" value="<?php if (isset($_POST['prixS'])){echo $_POST['prixS'];} ?>"/>
            <input type="text" name="TVAS" id="TVA" placeholder="TVA" size="30" value="<?php if (isset($_POST['TVAS'])){echo $_POST['TVAS'];} ?>"/>
            <input type="text" name="quantiteS" id="quantite" placeholder="Quantite" size="30" value="<?php if (isset($_POST['quantiteS'])){echo $_POST['quantiteS'];} ?>"/>
        </p>
                
    <select name="mois">
      <option value="impair" <?php if ($_POST['mois']=='impair') {echo "selected='selected'";}?>>Janvier</option>
      <option value="pair" <?php if ($_POST['mois']=='pair') {echo "selected='selected'";}?>>Février</option>
      <option value="impair" >Mars</option>
      <option value="pair" <?php if ($_POST['mois']=='pair') {echo "selected='selected'";}?> >Avril</option>
      <option value="impair">Mai</option>
      <option value="pair">Juin</option>
      <option value="impair">Juillet</option>
      <option value="impair">Août</option>
      <option value="pair">Septembre</option>
      <option value="imppair">Octobre</option>
      <option value="pair">Novembre</option>
      <option value="impair">Décembre</option>
    </select>
<p>
    <input type="submit" value="Calculer" name="envoyer"/>
</p>
        </form>

<?php
        
session_start();
       
if(isset($_POST['mois'])) {
    $mois = ($_POST['mois']);
} 
 
if($mois == "impair") {
    echo ("Le mois est en 31 jours") ."</br>";
} 

else {
    echo ("Le mois est en 30 jours") ."</br>";
}

        
//exercice 2        
        

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

// echo (max($prixtotal,$prixtotalF,$prixtotalS) . "<br>");
 $tab = array($prixtotal, $prixtotalF, $prixtotalS);
    print_r("Le prix le plus élevé est de ");
    echo (max($tab)) ."<br>";
    
 $tab = array($prixtotal, $prixtotalF, $prixtotalS);
    print_r("Le prix le moins élevé est de ");
    echo (min($tab));
    
}
 
?>
    </body>
</html>
