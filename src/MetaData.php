<?php

namespace PGNParser;

class MetaData
{
    private string $event;
    private string $site;
    private string $date;
    private string $round;
    private string $white;
    private string $black;
    private string $result;
    private string $eco;
    private string $whiteelo;
    private string $blackelo;

    private array $metaData;

    public function __construct(array $metaData)
    {
        $this->metaData = $metaData;
        $this->buildMetaData();
    }

    private function buildMetaData(): void
    {
        foreach ($this->metaData as $data) {
            $this->setTags($data);
        }
    }

    private function setTags($data)
    {
        $tagPattern = '/"(?!.*\?)[^"]+"/mi';
        $tags = ['Event ', 'Site ', 'Date ', 'Round ', 'White ', 'Black ', 'Result ', 'ECO ', 'WhiteElo ', 'BlackElo '];
        foreach ($tags as $tag) {
            if (strpos($data, $tag) !== false) {
                preg_match($tagPattern, $data, $match);
                $tag = trim(strtolower($tag));
                $this->{$tag} = $match[0] ?? '';
            }
        }
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event ?? '';
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site ?? '';
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date ?? '';
    }

    /**
     * @return string
     */
    public function getRound(): string
    {
        return $this->round ?? '';
    }

    /**
     * @return string
     */
    public function getWhite(): string
    {
        return $this->white ?? '';
    }

    /**
     * @return string
     */
    public function getBlack(): string
    {
        return $this->black ?? '';
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result ?? '';
    }

    /**
     * @return string
     */
    public function getECO(): string
    {
        return $this->ECO ?? '';
    }

    /**
     * @return string
     */
    public function getWhiteElo(): string
    {
        return $this->whiteelo ?? '';
    }

    /**
     * @return string
     */
    public function getBlackElo(): string
    {
        return $this->blackelo ?? '';
    }
}