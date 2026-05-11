<?php

class Score
{
    private int $id;
    private int $themeID;
    private int $nbReponse;
    private int $duree;
    private int $userID;

    public function __construct(int $id, int $themeID, int $nbReponse, int $duree, int $userID)
    {
        $this->id = $id;
        $this->themeID = $themeID;
        $this->nbReponse = $nbReponse;
        $this->duree = $duree;
        $this->userID = $userID;
    }
    public function getScoreToArray()
    {
        return [
            "id" => $this->id,
            "themeID" => $this->themeID,
            "nbReponse" => $this->nbReponse,
            "duree" => $this->duree,
            "userID" => $this->userID
        ];
    }

    public function getID()
    {
        return $this->id;
    }
    public function getThemeID()
    {
        return $this->themeID;
    }
    public function getNbReponse()
    {
        return $this->nbReponse;
    }
    public function getDuree()
    {
        return $this->duree;
    }
    public function getUserID()
    {
        return $this->userID;
    }
}
