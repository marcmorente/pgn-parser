<?php
header('Content-Type: text/text');
ini_set('MAX_EXECUTION_TIME', '-1');
ini_set('memory_limit', '1G'); // or you could use 1G
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(0);
require 'vendor/autoload.php';

$filePath = __DIR__.'/tests/PGNFiles/randomEvents.pgn';
$pgn = new PGNParser\PGN($filePath);
$games = $pgn->getGames();

/*foreach ($games as $game) {
    echo $pgn->metaData($game)->getBlackElo()."\n";
}*/

print_r($games);