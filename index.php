<?php
session_start();

require_once 'src/AutoLoader.php';
AutoLoader::register();

use Game\Vehicule\Vehicule;
use Game\Vehicule\Motorcycle;
use Game\Vehicule\Car;
use Game\Vehicule\Truck;
use Game\Gameplay\Race;
use Game\Gameplay\Player;
use Game\Entity\Track;

Track::connect();

$players = Player::restore();

$tesla = new Car( 'Mustang Shelby GT', Vehicule::SUPERPOWER );
$mustang = new Motorcycle( 'Ducati Monstro', Vehicule::MEDIUM );
$dbs = new Truck( 'Scania R', Vehicule::HIGH );
$twingo = new Car( 'Aston Martin DBS', Vehicule::LOW );

$robert = new Player( 'Robert de Niro', $dbs );
$ouioui = new Player( 'Oui-Oui', $tesla, 'Team Champignon', 2 );
$holmes = new Player( 'Sherlock Holmes', $mustang, 'Team Detective', 5 );
$franklin = new Player( 'Franklin', $twingo, 'Team Chaussure' );
$bob = new Player( 'Bob Leponge', $twingo, '' );

Player::save( $ouioui );
Player::save( $bob );

$monza = new Race( Track::getRandom(), 5 );
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

        <h2><?php echo $randRace->getTrack()->getName(); ?></h2>
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

        <h2>Les circuits du championnat</h2>
        <ul>
            <?php foreach( Track::getAll() as $track ){ ?>
                <li>
                    <?php echo $track->getName() . ' - ' . $track->getLocation(); ?>
                </li>
            <?php } ?>
        </ul>
    </body>
</html>
