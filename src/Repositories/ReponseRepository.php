<?php

class ReponseRepository extends AbstractRepository
{
  private ReponsesMapper $reponsesMapper;

  public function __construct()
  {
    parent::__construct("reponses");
    $this->reponsesMapper = new ReponsesMapper;
  }

  public function selectByID(int $id) {}
  public function selectByQuestionIDAll(Questions $obj): ?Reponses
  {
    $smt =    $this->bdd->prepare("SELECT * FROM $this->tableName WHERE question_id = :id LIMIT 4");
    $smt->bindParam(":id", $obj->id, PDO::PARAM_INT);
    $smt->execute();
    $reponses = $smt->fetchAll(PDO::FETCH_ASSOC);
    if ($reponses) {
      // ici ca va posé un probleme  le mapper ne gere pas ce cas;

      return $this->reponsesMapper->mapToObjet($reponses);
    }
    return null;
  }

  public function selectByQuestionID(Questions $obj): ?Reponses
  {
    $smt =    $this->bdd->prepare("SELECT * FROM $this->tableName WHERE question_id = :id ORDER BY RAND() LIMIT 1");
    $smt->bindParam(":id", $obj->id, PDO::PARAM_INT);
    $smt->execute();
    $reponses = $smt->fetch(PDO::FETCH_ASSOC);
    if ($reponses) {

      return $this->reponsesMapper->mapToObjet($reponses);
    }
    return null;
  }

  public function getReponsesForQuestion(int $question_id): ?array
  {
    $smt = $this->bdd->prepare("SELECT * FROM $this->tableName WHERE question_id = :id");
    $smt->execute([
      "id" => $question_id,
    ]);

    $reponseDatas = $smt->fetchAll(PDO::FETCH_ASSOC);
    if ($reponseDatas) {
      $reponses = [];

      foreach ($reponseDatas as $data) {
        $reponses[] = $this->reponsesMapper->mapToObjet($data);
      }
      return $reponses;
    }
    return null;
  }

  public function selectAll() {}
  public function deleteByID(int $id) {}
  public function insert() {}
  public function updateByID() {}
}
