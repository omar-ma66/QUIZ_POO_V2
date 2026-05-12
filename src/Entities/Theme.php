<?php
class Theme
{
    public int $id;
    public string $theme;

    public function __construct(int $id , string $theme)
    {
        $this->id = $id ;
        $this->theme = $theme;
    }

    public function getThemeID():int
    {
        return $this->id;
    }
    
    public function getTheme():string
    {
        return $this->theme;
    }
 
}