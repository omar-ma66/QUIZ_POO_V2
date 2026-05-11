<?php
class ThemeMapper implements MapperInterface{

 #[Override]
 public function mapToObjet(array $data): Theme
 {
    return new Theme($data["id"],$data["theme"]);
 }

 
 public function mapToArray(object $objet):array
 {
    return ["id"=>$objet->getThemeID(),"theme"=>$objet->getTheme()] ;

 }
    
    
}