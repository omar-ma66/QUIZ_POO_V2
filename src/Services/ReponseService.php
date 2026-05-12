<?php
class ReponseService
{
    private ReponseRepository $objRepo;
    private Questions $question;
    private $dataReponse = [];
    private $data = [];
    private int $nbReponse = 0;
    private int $index = 0;

    public function __construct(ReponseRepository $objRepo, Questions $question, int $nbReponse = 4)
    {
        $this->objRepo = $objRepo;
        $this->question = $question;
        $this->nbReponse  = $nbReponse;
        $this->index = 0;
    }


    public function generate(): bool
    {
        if ($this->index < $this->nbReponse) {

            $fin = false;
            while ($fin === false) {
                $reponseTemps = $this->objRepo->selectByQuestionID($this->question);
                if (!in_array($reponseTemps->getID(), $this->data)) {
                    array_push($this->data, $reponseTemps->getID());
                    array_push($this->dataReponse, $reponseTemps);
                    $this->index++;
                    $fin = true;
                }
            }
            return true;
        }
        return false;
    }

    public function getReponse(int $index): ?Reponses
    {
        if ($index < 0 || $index >= $this->nbReponse || $index >= $this->index)
            return null;
        else
            return $this->dataReponse[$index];
    }
}
