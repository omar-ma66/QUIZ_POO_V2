<?php
class Theme
{
    public int $id;
    public string $theme;
    public array  $themeArray = [];
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
    public function getThemeToArray()
    {
       return [$this->id,$this->theme];
    }
    public function getThemeToAsco(){ 
     return ["id"=>$this->id,"theme"=>$this->theme];
    }
}