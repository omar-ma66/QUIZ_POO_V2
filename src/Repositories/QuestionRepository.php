<?php
class QuestionRepository extends AbstractRepository
{
    private QuestionsMapper $mapper;


    public function __construct()
    {
        parent::__construct("questions");
        $this->mapper = new QuestionsMapper;
    }

    public function selectByID(int $id): ?Questions
    {
        $smt = $this->bdd->prepare("SELECT * FROM " . $this->tableName . " WHERE id= :id");
        $smt->bindParam(":id", $id, PDO::PARAM_INT);
        $smt->execute();
        $question = $smt->fetch(PDO::FETCH_ASSOC);
        if ($question) {
            $this->mapper = new QuestionsMapper();
            return $this->mapper->mapToObjet($question);
        }
        return null;
    }

    public function selectByThemeID(Theme $obj): ?Questions
    {
        $smt = $this->bdd->prepare("SELECT * FROM $this->tableName WHERE theme_id = :id  ORDER BY RAND() LIMIT 1");
        $smt->bindParam(":id", $obj->id, PDO::PARAM_INT);
        $smt->execute();
        $question = $smt->fetch(PDO::FETCH_ASSOC);
        if ($question) {
            $this->mapper = new QuestionsMapper();
            return $this->mapper->mapToObjet($question);
        }
        return null;
    }



    public function getRandQuestionsForTheme(int $theme_id, int $limit): ?array
    {


        $smt = $this->bdd->prepare("SELECT * FROM $this->tableName WHERE theme_id = :id  ORDER BY RAND() LIMIT :nb_question");

        // $smt->execute([
        //     ":id" => (int)$theme_id,
        //     ":nb_question" => (int)$limit
        // ]);

        $smt->bindParam(":id", $theme_id, PDO::PARAM_INT);
        $smt->bindParam(":nb_question", $limit, PDO::PARAM_INT);
        $smt->execute();

        $questionDatas = $smt->fetchAll(PDO::FETCH_ASSOC);
        if ($questionDatas) {
            $questions = [];

            foreach ($questionDatas as $data) {
                $questions[] = $this->mapper->mapToObjet($data);
            }
            return $questions;
        }
        return null;
    }


    public function selectAll() {}
    public function deleteByID(int $id) {}
    public function insert() {}
    public function updateByID() {}
}
