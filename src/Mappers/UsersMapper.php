<?php
//  require("../../utils/autoload.php");


class UsersMapper implements MapperInterface 
{
    public function mapToObjet(array $data): Users
    {
       return new Users($dataUser['id'],$dataUser['pseudo']);
    }

    public function mapToArray(Users $obj): array
    {
        return [
            'id' => $obj->getId(),
            'pseudo' => $obj->getPseudo()
        ];
    }
}