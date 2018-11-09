<?php

  include_once __DIR__ . "/../../model/dao/AttachmentDAO.php";
  include_once __DIR__ . "/../../model/bean/Attachment.php";

  class ProfileAttachmentManager{

    //Constantes que definem o diretório de onde os arquivos serão armazenados e recuperados.
    const PATH_PROFILE_PHOTO = "./../resources/image/profile_photos";
    const PATH_PROFILE_THUMBNAIL = "./../resources/image/profile_thumbnails";

    const THUMBNAIL_WIDTH = 200; // Pixels
    const THUMBNAIL_HEIGTH = 200; // Pixels

    const ATTACHMENT_NAME_DEFAULT_PHOTO     = "default";
    const ATTACHMENT_NAME_DEFAULT_THUMBNAIL = "default";

    private $thumbnail;
    private $photo;

    public function __construct() {
      //Construction default
    }

    public function getAttachmentById($id) {

    }

    //Esta função pode lançar as seguintes exceções:
    //CannotConnectSQLException, SQLException, Created_atException, WrongObjectException, NullException e NotAImageException
    public function updateProfilePhoto($objectUser , $tmp_photo) {

      //Check if there is an image
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $tmp_photo["type"])) {
				return FALSE;
      }

      //Take the path where the file will be saved
      $directory = ProfileAttachmentManager::PATH_PROFILE_PHOTO;

      //Take the extension of the image and put on $extension
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $tmp_photo["name"], $extension);

      //The filename will be user->id
      $filename = $objectUser["id"];

      $dao = new AttachmentDAO();
      $attachment = $dao->loadFilename($directory , $filename , $extension);

      //Caso o usuário ja tenha um registro salvo, deve atualizar o registro
      $dao->update($attachment);
      if ($dao) {
        //Caso o usuário ainda não tenha um foto, deve salvar um novo registro
        $attachment = new Attachment($directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($attachment);
      }

      $this->photo = $attachment;

      $thumbnail = generateThumbnail($attachment);
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
      $this->thumbnail = updateThumbnail($attachment->getFilename() , $attachment->getExtension());
    }

    private function updateThumbnail($filename , $extension) {

      $directory = ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      $dao = new AttachmentDAO();
      $thumbnail = $dao->load($directory , $filename , $extension);

      //Atualizando o registro já existente do thumbnail
      $dao->update($thumbnail);
      if ($dao) {
        //Caso o thumbnail ainda não exista, deve salvar um novo registro
        $thumbnail = new $thumbnail($directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($attachment);
      }

      return $thumbnail;
    }

    public function getPhoto() {
      return $this->photo;
    }

    public function getThumbnail() {
      return $this->thumbnail;
    }

    public static function getDefaultPhoto() {
      return new Attachment(-1 , ProfileAttachmentManager::PATH_PROFILE_PHOTO     , ProfileAttachmentManager::ATTACHMENT_NAME_DEFAULT_PHOTO     , "png");
    }

    public static function getDefaultThumbnail() {
      return new Attachment(-1 , ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL , ProfileAttachmentManager::ATTACHMENT_NAME_DEFAULT_THUMBNAIL , "png");
    }

  }

?>
