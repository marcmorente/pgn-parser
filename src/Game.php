<?php

namespace PGNParser;

class Game
{
    private array $metaData;
    private $moves;

    /**
     * @return mixed
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * @param mixed $metaData
     */
    public function setMetaData($metaData): void
    {
        $this->metaData[] = $metaData;
    }

    /**
     * @return mixed
     */
    public function getMoves()
    {
        return $this->moves;
    }

    /**
     * @param mixed $moves
     */
    public function setMoves($moves): void
    {
        $this->moves = $moves;
    }
}