
 
 
 <?php
$panier = array(
array('nom'=>'slip', 'qte'=>4, 'prixHT'=>2),
array('nom'=>'short', 'qte'=>2, 'prixHT'=>20),
array('nom'=>'lunettes', 'qte'=>1, 'prixHT'=>10)
);

$supertotal = 0;
echo "<table>";
echo "<tr><th>Article</th>
<th>Qté</th>
<th>Prix</th>
<th>Total</th>";

foreach ($panier as $article) { // boucle
    
        $total = $article['qte'] * $article['prixHT'];
        echo '<tr><td>' . $article['nom'] . '</td><td>' . $article['qte'] . '</td><td>' . $article['prixHT'] . ' €</td><td>' . $total . ' €</td></tr>' . "\r\n";
        $supertotal += $total;
}

echo '<tr><td colspan="3">Total final :</td><td><strong>' . $supertotal . ' €</strong></td></tr>'."\r\n";
echo '</table>';

?> 