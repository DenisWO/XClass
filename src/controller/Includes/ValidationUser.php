<?php
  function validateName($name){
    if(gettype($name) == string) return TRUE;
    else return FALSE;
  }
  function validateEmail($email){
    if(gettype($email) == string) return TRUE;
    else return FALSE;
  }



?>
