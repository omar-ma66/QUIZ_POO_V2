<?php
class ScoreRepository extends AbstractRepository
{

 public function selectByID(int $id){} 
 


 public function select()
 {
   $result =  $this->bdd->query("SELECT * FROM $this->tableName ORDER BY nb_reponse DESC ,duree ASC LIMIT 1");
  
   $data = $result->fetchAll(PDO::FETCH_NUM);
                if( $result->rowCount() > 0)
                    {
                        return new Score($data[0],$data[1],$data[2],$data[3],$data[4]);
                    }
  return null;
 }

 public function selectAll()
 {
   $result =  $this->bdd->query("SELECT * FROM $this->tableName ORDER BY nb_reponse DESC ,duree ASC LIMIT 5");
  
   $data = $result->fetchAll(PDO::FETCH_NUM);
                if( $result->rowCount() > 0)
                    {
                        // return new Score($data);
                        return;
                    }
  return null;
 }
 public function deleteByID(){}
 public function insert(){}
 public function insertScore(int $them_id,int $nb_reponse,int $duree,int $user_id):?Score
 {
  $smt =  $this->bdd->prepare("INSERT INTO $this->tableName (theme_id,nb_reponse,duree,user_id)VALUES(:theme_id,:nb_reponse,:duree,:user_id)");
  $smt->bindParam(":theme_id",$them_id,PDO::PARAM_INT);
  $smt->bindParam(":nb_reponse",$nb_reponse,PDO::PARAM_INT);
  $smt->bindParam(":duree",$duree,PDO::PARAM_INT);
  $smt->bindParam(":user_id",$user_id,PDO::PARAM_INT);

  $smt->execute();
                    if($this->bdd->lastInsertId() > 0)
                        {
                            return new Score($this->bdd->lastInsertId(),$them_id,$nb_reponse,$duree,$user_id);
                        }
 return null;
 
  }
 public function updateByID(){}
}