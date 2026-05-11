<?php
interface MapperInterface
{
    public function  mapToObjet(array $data):object ;
    public function  mapToArray(object $obj):array ;
} 
