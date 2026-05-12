<?php
//  require("../../utils/autoload.php");
class UsersMapper implements MapperInterface 
{
    public function mapToObjet(array $data): Users
    {
       return new Users($data['id'], $data['pseudo']);
    }

    
    public function mapToArray(object $obj): array
    {
        return [
            'id' => $obj->getId(),
            'pseudo' => $obj->getPseudo()
        ];
    }
        
}