<?php


class QuestionService
{

  private QuestionRepository $questionRepo;
  private ReponseRepository $reponseRepo;
  // private   $dataID = [];
  // private    $dataQuestions = [];
  // private    int $limit;
  // private    int $index;
  // private    Theme $theme;

  public function __construct()
  {
    $this->questionRepo = new QuestionRepository();
    $this->reponseRepo = new ReponseRepository();
    // $this->limit = $limit;
    // $this->index = 0;
    // $this->theme = $theme;
  }

  public function generate(Theme $theme, int $limit): array
  {

 

    $questions = $this->questionRepo->getRandQuestionsForTheme($theme->getThemeID(), $limit);    // signature de la question id question theme_id

    /** @var Questions $question */
    foreach ($questions as $question) {

      $reponses = $this->reponseRepo->getReponsesForQuestion($question->getId());
      $question->setReponses($reponses);
    }
        
    return $questions;

    // if ($this->index < $this->limit) {
    //   $fin = false;
    //   while ($fin === false) {
    //     $questionTemps = $this->objRipo->selectByThemeID($this->theme);
    //     if (!in_array($questionTemps->getId(), $this->dataID)) {
    //       array_push($this->dataID, $questionTemps->getId());
    //       array_push($this->dataQuestions, $questionTemps);
    //       $this->index++;
    //       $fin = true;
    //     }
    //   }

    //   return true;
    // }
    // return false;
  }

  // public function getQuestion(int $index): ?Questions
  // {
  //   if ($index >= $this->limit || $index < 0 || $index >= $this->index) {
  //     return null;
  //   } else
  //     return $this->dataQuestions[$index];
  // }
}
