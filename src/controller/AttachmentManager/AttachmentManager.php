<?php

  include "./../model/dao/Connection.php";
  include "./../model/bean/Attachment.php";

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

    public function updateProfilePhoto ($objectUser , $tmp_photo) {
      //Checks whether the object is null
      if (!empty($objectUser)) {
        $error = "Null object";
        return $erro;
      }

      //Checks if there is a user object
      if (get_class($objectUser) == "User") {
        $error = "Wrong object";
        return;
      }

      //Checks if the user is already saved in the BDA
      //A user object will only have an ID when it is saved on BDA
      //A new user should be saved with the default photo
      if (!empty($objectUser["id"])) {
        $error = "User without id";
        return $erro;
      }

      //Check if there is an image to save
      if (!empty($tmp_photo) {
        $error = "Nothing to save";
        return $erro;
      }

      //Check if there is an image
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $tmp_photo["type"])) {
				$error = "This is not a image";
        return $erro;
      }

      //Take the path where the file will be saved
      $directory = $this->PATH_PROFILE_PHOTO;

      //Take the extension of the image and put on $extension
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $tmp_photo["name"], $extension);

      //The filename will be user->id
      $filename = $objectUser["id"];

      //Verificar se existe um profile_photos deste usuario ja salvo no Banco
      //Se ja estiver salvo, atualizar
      //Senao criar um novo
      //Usar a this->loadProfilePhoto

      $attachment = new Attachment($directory , $filename , $extension);
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
