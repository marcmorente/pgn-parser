<?php //declare(strict_types=1);

namespace PGNParser;

final class PGN
{
    private array $games;

    /**
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->games = Parser::parseGames($filePath);
    }

    /**
     * @return array
     */
    public function getGames(): array
    {
        return $this->games;
    }

    public function getRawMoves(array $game): string
    {
        return $game['moves'];
    }

    public function getMoves(array $game): string
    {
        return preg_replace('/{[^}]*}+|\([^)]*\)+/m', '', $game['moves']);
    }

    public function metaData(array $game): MetaData
    {
        return new MetaData($game['metaData']);
    }
}