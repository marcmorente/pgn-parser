<?php declare(strict_types=1);

use PGNParser\Email;
use PGNParser\PGN;
use PHPUnit\Framework\TestCase;


final class ParsePGNTest extends TestCase
{
    public function testCanBeCreatedFromValidPGNFile(): void
    {
        $filePath = dirname(__DIR__).'/tests/PGNFiles/test.pgn';
        $this->assertInstanceOf(
            PGN::class,
            new PGN($filePath)
        );
    }

    public function testShouldGetGamesFromPGNFile(): void
    {
        $filePath = dirname(__DIR__).'/tests/PGNFiles/test.pgn';
        $parser = new PGN($filePath);
        $this->assertNotEmpty($parser->getGames());
    }
}
