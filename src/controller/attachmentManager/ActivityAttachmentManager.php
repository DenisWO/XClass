<?php

  include_once __DIR__ . "./../../model/bean/Attachment.php";
  include_once __DIR__ . "./../../model/dao/AttachmentDAO.php";

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
