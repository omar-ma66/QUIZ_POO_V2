<?php

class Users {

private string $pseudo="";
private int $id =0; 

public function __construct(int $id, string $pseudo)
{
$this->id = $id ;
$this->pseudo  = $pseudo;
}  

public function getId():int
{
  return $this->id ;
}
public function getPseudo():string
{
  return $this->pseudo ;
}
}