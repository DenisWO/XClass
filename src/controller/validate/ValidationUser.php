<?php

  include_once __DIR__ . "/../../errors/WrongObjectException.php";

  function validateFirstName($firstName){
    if(gettype($firstName) == string) return TRUE;
    else throw new WrongObjectException("Type Object not validated" , "string" , gettype($firstName));
  }
  function validateLastName($lastName){
    if(gettype($lastName) == string) return TRUE;
    else throw new WrongObjectException("Type Object not validated" , "string" , gettype($lastName));
  }
  function validateEmail($email){
    if(gettype($email) == string) return TRUE;
    else throw new WrongObjectException("Type Object not validated" , "string" , gettype($email));
  }

?>
