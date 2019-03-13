<?php
require_once './Race.php';
require_once './Player.php';
require_once './Vehicule.php';

$tesla = new Vehicule( 'Tesla Model S', Vehicule::MEDIUM );
$mustang = new Vehicule( 'Mustang Shelby GT', Vehicule::SUPERPOWER );
$dbs = new Vehicule( 'Aston Martin DBS', Vehicule::HIGH );
$twingo = new Vehicule( 'Renault Twingo', Vehicule::LOW );

$robert = new Player( 'Robert de Niro', $dbs );
$ouioui = new Player( 'Oui-Oui', $tesla, 'Team Champignon', 2 );
$holmes = new Player( 'Sherlock Holmes', $mustang, 'Team Detective', 5 );
$franklin = new Player( 'Franklin', $twingo, 'Team Chaussure' );
$bob = new Player( 'Bob Leponge', $twingo, '' );


$monza = new Race( 'Grand prix de Monza', 5 );
$monza->register( $robert );
$monza->register( $ouioui );
$monza->register( $holmes );
$monza->register( $franklin );

$monza->start();

$randRace = Race::generate();
$randRace->register( $ouioui );
$randRace->register( $holmes );
$randRace->register( $bob );

$randRace->start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CarOne</title>
    </head>
    <body>
        <h2><?php echo $monza->getTrack(); ?></h2>
        <p>
            Il y a <?php echo $monza->countPlayers(); ?> participants et <?php echo Player::getCounter() - $monza->countPlayers(); ?> spectateurs
        </p>
        <ul>
            <?php foreach( $monza->getRanking() as $player ){ ?>
                <li>
                    <?php echo $player->getIdentity() . ' - ' . $player->getVehicule()->getModel(); ?>
                </li>
            <?php } ?>
        </ul>

        <h2><?php echo $randRace->getTrack(); ?></h2>
        <p>
            Il y a <?php echo $randRace->countPlayers(); ?> participants et <?php echo Player::getCounter() - $randRace->countPlayers(); ?> spectateurs
        </p>
        <ul>
            <?php foreach( $randRace->getRanking() as $player ){ ?>
                <li>
                    <?php echo $player->getIdentity() . ' - ' . $player->getVehicule()->getModel(); ?>
                </li>
            <?php } ?>
        </ul>
    </body>
</html>
