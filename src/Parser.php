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
        $pgnFile->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);
        $re = '/\[Event\s|\[Site\s|\[Date\s|\[Round\s|\[White\s|\[Black\s|\[Result\s|\[ECO\s|\[WhiteElo\s|\[BlackElo\s/';
        while (!$pgnFile->eof()) {
            $line = trim($pgnFile->fgets());
            if ($line === '') continue;

            if (preg_match($re, $line)) {
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