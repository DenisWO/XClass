<?php

  class Created_atException extends Exception{

    public function __construct($messageToUser , $messageToDeveloper) {
      parent::__construct($messageToUser, $messageToDeveloper);
    }

    public function __construct($messageToUserAndToDeveloper) {
      parent::__construct($messageToUserAndToDeveloper, $messageToUserAndToDeveloper);
    }

  }

?>
