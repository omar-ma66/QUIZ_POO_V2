<?php
class Questions
{
    public int $id = 0;
    public string $question = "";
    public int  $themeID = 0; 
    public function __construct(int $id,string $question,int $themeID)
    {    
        $this->id = $id ;
        $this->question = $question;
        $this->themeID = $themeID;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getThemeID(): int
    {
        return $this->themeID;
    }
    public function getQuestion(): string
    {
        return  $this->question;
    }
}
