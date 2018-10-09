<?php

  class AttachmentManager{

    public function __construct() {
      // Construction default
    }

    // Constantes que definem o diretorio aonde os arquivos serão armazenados e recuperados.
    private const PATH_PROFILE_PHOTO = "./../resources/image/profile_photos";
    private const PATH_PROFILE_THUMBNAIL = "./../resources/image/profile_thumbnails";
    private const ACTIVIES_DELIVERY = "./../resources/image/activies_delivery";

    public function PATH_PROFILE_PHOTO () {
      return PATH_PROFILE_PHOTO;
    }

    public function PATH_PROFILE_THUMBNAIL () {
      return PATH_PROFILE_THUMBNAIL;
    }

    public function ACTIVIES_DELIVERY () {
      return ACTIVIES_DELIVERY;
    }

    public function saveProfilePhoto ($objectUser) {
      echo "saveProfilePhoto";
    }

    public function loadProfilePhoto ($objectUser) {
      echo "loadProfilePhoto";
    }

    public function saveActivityDelivery ($objectActivityDelivery) {
      echo "saveActivityDelivery";
    }

    public function loadActivityDelivery ($objectActivityDelivery) {
      echo "loadActivityDelivery";
    }

    private function generateThumbnail($valor){
      echo "generateThumbnail";
    }

    private function loadThumbnail($valor){
      echo "loadThumbnail";
    }

  }

?>
