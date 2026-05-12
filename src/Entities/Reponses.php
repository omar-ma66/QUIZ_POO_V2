<?php

class Reponses
{
    private int $id = 0;
    private int $questionID = 0;
    private string $reponse = "";
    private bool $estVrai = false;

    public function __construct(int $id, int $questionID, string $reponse, bool $estVrai)
    {
        $this->id = $id;
        $this->questionID = $questionID;
        $this->reponse = $reponse;
        $this->estVrai = $estVrai;
    }

    public function getID()
    {
        return $this->id;
    }
    
    public function getQuestionID()
    {
        return $this->questionID;
    }
    public function getReponse()
    {
        return $this->reponse;
    }
    public function isTrue()
    {
        return $this->estVrai;
    }
}
