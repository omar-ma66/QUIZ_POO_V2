<?php
class ReponseService
{
private ReponseRepository $objRepo;
private Questions $question ;
private $dataReponse = [];
private $data = [];

public function __construct(ReponseRepository $objRepo, Questions $question, int $nbReponse = 4)
{
   $this->objRepo = $objRepo ;
   $this->question = $question; 
}
}