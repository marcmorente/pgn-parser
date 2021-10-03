<?php declare(strict_types=1);

use PGNParser\MetaData;
use PGNParser\PGN;
use PHPUnit\Framework\TestCase;


final class ParsePGNTest extends TestCase
{
    public function testCanBeCreatedFromValidPGNFile(): void
    {
        $filePath = dirname(__DIR__).'/tests/PGNFiles/randomEvents.pgn';
        $this->assertInstanceOf(
            PGN::class,
            new PGN($filePath)
        );
    }

    public function testCanGetGamesFromPGNFile(): void
    {
        $filePath = dirname(__DIR__).'/tests/PGNFiles/randomEvents.pgn';
        $parser   = new PGN($filePath);
        $this->assertIsArray($parser->getGames());
        $this->assertGreaterThan(0, count($parser->getGames()));
    }

    public function testCanGetMetaDataFromGame(): void
    {
        $filePath = dirname(__DIR__).'/tests/PGNFiles/fins2015.pgn';
        $pgn      = new PGNParser\PGN($filePath);
        $games    = $pgn->getGames();

        foreach ($games as $game) {
            $this->assertInstanceOf(
                MetaData::class,
                $pgn->metaData($game)
            );
        }
    }

    public function testShouldGetCorrectNumbersOfGamesFromPGNFile(): void
    {
        $dir   = dirname(__DIR__).'/tests/PGNFiles';
        $files = array(
            'recullhistoric.pgn'    => 8878,
            'fins2010.pgn'          => 10272,
            'fins2015.pgn'          => 14968,
            'LligaCatalana2018.pgn' => 870,
            'andorra2018.pgn'       => 220,
            'lligacatalana2019.pgn' => 760,
            'lligacatalana2020.pgn' => 560,
            'randomEvents.pgn'      => 202
        );

        foreach ($files as $file => $expectedCount) {
            $filePath = $dir.'/'.$file;
            $pgn      = new PGNParser\PGN($filePath);
            $games    = $pgn->getGames();
            $this->assertCount($expectedCount, $games);
        }
    }
}
