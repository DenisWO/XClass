<?php

  include "./../model/dao/Connection.php";
  include "./../model/bean/Attachment.php";

  class ActivityAttachmentManager{
    const PATH_ACTIVIES_DELIVERY = "./../resources/image/activies_delivery";

    public function __construct() {
      //Construction default
    }

    public function saveActivityDelivery ($objectActivityDelivery) {
      echo "saveActivityDelivery";
    }

    public function loadActivityDelivery ($objectActivityDelivery) {
      echo "loadActivityDelivery";
    }

  }

?>
