# Chess PGN parser in PHP

## Example Code
The code below parses a PGN file and prints the event, name of the white player, name of the black player, result and moves of each game.

```php
<?php

require __DIR__.'/vendor/autoload.php';
use PGNParser\PGN;

$filePath = __DIR__.'/tests/PGNFiles/randomEvents.pgn';
$pgn = new PGN($filePath);
$games = $pgn->getGames();

foreach ($games as $game) {
    echo $pgn->metaData($game)->getEvent(). PHP_EOL;
    echo $pgn->metaData($game)->getWhite(). PHP_EOL;
    echo $pgn->metaData($game)->getBlack(). PHP_EOL;
    echo $pgn->metaData($game)->getResult(). PHP_EOL;
    echo $pgn->getRawMoves($game). PHP_EOL;
    echo PHP_EOL;
}
```
