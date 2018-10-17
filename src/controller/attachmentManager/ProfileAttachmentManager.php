<?php

  include "./../model/dao/Connection.php";
  include "./../model/bean/Attachment.php";

  class ProfileAttachmentManager{

    //Constantes que definem o diretório de onde os arquivos serão armazenados e recuperados.
    const PATH_PROFILE_PHOTO = "./../resources/image/profile_photos";
    const PATH_PROFILE_THUMBNAIL = "./../resources/image/profile_thumbnails";

    const THUMBNAIL_WIDTH = 200; // Pixels
    const THUMBNAIL_HEIGTH = 200; // Pixels

    public function __construct() {
      //Construction default
    }

    public function updateProfilePhoto ($objectUser , $tmp_photo) {
      //Esta função pode lançar as seguintes exceções CannotConnectSQLException, SQLException, Created_atException e WrongObjectException

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
      $directory = ProfileAttachmentManager::PATH_PROFILE_PHOTO;

      //Take the extension of the image and put on $extension
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $tmp_photo["name"], $extension);

      //The filename will be user->id
      $filename = $objectUser["id"];

      $attachment;
      try {
        $dao = new AttachmentDAO();
        $attachment = $dao->loadFilename($directory , $filename , $extension);

        //Caso o usuário ja tenha um registro salvo, deve atualizar o registro
        $dao->update($attachment);
      }catch(NotFoundSQLException $e) {
        //Caso o usuário ainda não tenha um foto, deve salvar um novo registro
        $attachment = new Attachment($directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($attachment);
      }

      generateThumbnail($attachment);
    }

    private function generateThumbnail($attachment){
      //Esta função pode lançar as seguintes exceções CannotConnectSQLException, SQLException, Created_atException e WrongObjectException

      // Largura e altura máximos (máximo, pois como é proporcional, o resultado varia)
      $width  = ProfileAttachmentManager::THUMBNAIL_WIDTH;
      $height = ProfileAttachmentManager::THUMBNAIL_HEIGTH;

      // Endereço completo da imagem Ex: resources/img/exemplo.png
      $address = $attachment->getDirectory() . "/" . $attachment->getFullFilename();

      // Obtendo o tamanho original
      list($width_orig, $height_orig) = getimagesize($address);

      // Calculando a proporção
      $ratio_orig = $width_orig/$height_orig;

      if ($width/$height > $ratio_orig) {
        $width = $height*$ratio_orig;
      }else{//Lança as seguintes exceções SQLException e Created_atException
        $height = $width/$ratio_orig;
      }

      // O resize propriamente dito. Na verdade, estamos gerando uma nova imagem.
      $image_p = imagecreatetruecolor($width, $height);
      $image = imagecreatefromjpeg($address);
      imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

      // Gerando a imagem de saída para ver no browser, qualidade 75%:
      header('Content-Type: image/jpeg');
      imagejpeg($image_p, null, 75);

      // Salvando a imgem
      imagejpeg($image_p, ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL . "/" . $attachment->getFullFilename() , 75);

      // Atualiza os registros no banco
      updateThumbnail($attachment->getFilename() , $attachment->getExtension());
    }


    private function updateThumbnail($filename , $extension) {
      //Esta função pode lançar as seguintes exceções CannotConnectSQLException, SQLException, Created_atException e WrongObjectException

      $directory = ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      try {
        $dao = new AttachmentDAO();
        $thumbnail = $dao->load($directory , $filename , $extension);

        //Atualizando o registro já existente do thumbnail
        $dao->update($thumbnail);
      }catch(NotFoundSQLException $e) {
        //Caso o thumbnail ainda não exista, deve salvar um novo registro
        $thumbnail = new $thumbnail($directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($attachment);
      }
    }

  }

?>
