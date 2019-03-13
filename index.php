<?php
require_once './Race.php';
require_once './Player.php';
require_once './Vehicule.php';

$tesla = new Vehicule( 'Tesla Model S', 6 );
$mustang = new Vehicule( 'Mustang Shelby GT', 8 );
$dbs = new Vehicule( 'Aston Martin DBS', 7 );
$twingo = new Vehicule( 'Renault Twingo', 3 );

$robert = new Player( 'Robert de Niro', $dbs );
$ouioui = new Player( 'Oui-Oui', $tesla, 'Team Champignon', 2 );
$holmes = new Player( 'Sherlock Holmes', $mustang, 'Team Detective', 5 );
$franklin = new Player( 'Franklin', $twingo, 'Team Chaussure' );

$monza = new Race( 'Grand prix de Monza', 5 );
$monza->register( $robert );
$monza->register( $ouioui );
$monza->register( $holmes );
$monza->register( $franklin );

$monza->start();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CarOne</title>
    </head>
    <body>
        <h1><?php echo $monza->getTrack(); ?></h1>

        <ul>
            <?php foreach( $monza->getRanking() as $player ){ ?>
                <li>
                    <?php echo $player->getIdentity() . ' - ' . $player->getVehicule()->getModel(); ?>
                </li>
            <?php } ?>
        </ul>
    </body>
</html>
