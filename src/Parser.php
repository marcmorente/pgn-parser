<?php

namespace PGNParser;

use SplFileObject;

final class Parser
{

    /**
     * @param $filePath
     * @return array
     */
    static function parseGames($filePath): array
    {
        $i = 0;
        $games = [];
        $moves = false;
        $strMoves = '';
        $pgnFile = new SplFileObject($filePath);
        while (!$pgnFile->eof()) {
            $line = trim($pgnFile->fgets());
            if ($line === '') continue;

            if (preg_match('/\[\w+\s+"[^"]*"]/', $line)) {
                if ($moves) {
                    $i++;
                    $moves = false;
                    $strMoves = '';
                }
                $games[$i]['metaData'][] = $line;
            } else {
                $moves = true;
                $strMoves .= $line;
                $games[$i]['moves'] = $strMoves;
            }
        }
        $pgnFile = null;

        return $games;
    }
}