<?php

class UserRepository extends AbstractRepository
{
 private UsersMapper $mapper;


 public function __construct()
 {
  $this->mapper = new UsersMapper();
  return parent::__construct("users");
 }
 /*---------------------------------------------------------------------------------*/
 public function selectByID(int $id):?Users
 {
 $smt =   $this->bdd->prepare("SELECT * FROM $this->tableName WHERE id = :id");
 $smt->bindParam(":id",$id,PDO::PARAM_INT);
 $smt->execute();
 $user = $smt->fetch(PDO::FETCH_ASSOC);
                if($smt->rowCount() === 1)
                    {
                                
                        return   $this->mapper->mapToObjet($user);
                      
                    }
            return null;
 }
 public function selectAll(){}

 public function deleteByObjet(Users $obj)
 {
   $smt =   $this->bdd->prepare("DELETE FROM $this->tableName WHERE pseudo = :pseudo");
   $pseudo = $obj->getPseudo();
    $smt->bindParam(":pseudo",$pseudo,PDO::PARAM_STR);
  $rep =  $smt->execute();
 }
 /*---------------------------------------------------------------------------------*/
 public function deleteByID(int $id){
 $smt =   $this->bdd->prepare("DELETE FROM $this->tableName WHERE id = :id");
    $smt->bindParam(":id",$id,PDO::PARAM_INT);
  $rep =  $smt->execute();
                      
          return $rep ;
 }
 /*---------------------------------------------------------------------------------*/
 public function insert()
 {}
 /*---------------------------------------------------------------------------------*/
 public function create(string $name):?Users
 {
   $smt =  $this->bdd->prepare("INSERT INTO $this->tableName(  pseudo) VALUES( :pseudo)");
   $smt ->bindParam(":pseudo",$name,PDO::PARAM_STR); 
   $smt->execute();
            if($this->bdd->lastInsertId() != null)
              {

                    
                        return       $this->mapper->mapToObjet(["id"=>$this->bdd->lastInsertId(),"pseudo"=>$name]);
                      
            }
            return null;
}
 /*---------------------------------------------------------------------------------*/
 public function updateByID(){}
 /*---------------------------------------------------------------------------------*/
}