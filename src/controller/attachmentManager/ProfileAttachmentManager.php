<?php

  include_once __DIR__ . "/../../model/dao/AttachmentDAO.php";
  include_once __DIR__ . "/../../model/bean/Attachment.php";
  include_once __DIR__ . "/../../model/bean/User.php";

  class ProfileAttachmentManager{

    //Constantes que definem o diretório de onde os arquivos serão armazenados e recuperados.
    const PATH_PROFILE_PHOTO = "resources/image/profile_photos";
    const PATH_PROFILE_THUMBNAIL = "resources/image/profile_thumbnails";

    const THUMBNAIL_WIDTH = 200; // Pixels
    const THUMBNAIL_HEIGTH = 200; // Pixels

    const ATTACHMENT_NAME_DEFAULT_PHOTO     = "default";
    const ATTACHMENT_NAME_DEFAULT_THUMBNAIL = "default";

    private $thumbnail;
    private $photo;

    public function __construct() {
      //Construction default
    }

    public function updateProfilePhoto($objectUser , $tmp_photo) {
      $testGD = get_extension_funcs("gd"); // Grab function list
      if (!$testGD){
        echo "GD não foi instalado no servidor -> Galera do Linux, tente isso -> sudo apt-get install php7.2-gd. <br>Se não funcionar tente ajuda em -> http://php.net/manual/en/image.installation.php";exit;
      }

      //Verifica se o arquivo é do tipo imagem
      if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $tmp_photo["type"])) {
				return FALSE;
      }

      //Pega o endereço aonde será salvo o arquivo
      $directory = ProfileAttachmentManager::PATH_PROFILE_PHOTO;

      //Pega a extensão do arquivo e coloca em $extension
      preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $tmp_photo["name"], $extension);
      $extension = $extension[0];

      //O nome do arquivo será o ID do usuário
      $filename = $objectUser->getId();

      $dao = new AttachmentDAO();
      $attachment = $dao->loadFilename($directory , $filename , $extension);

      if (!$attachment) {
        //Caso o usuário ainda não tenha um foto, deve salvar um novo registro
        $attachment = new Attachment(-1 , $directory , $filename , $extension);
        $dao->save($attachment);
      }else{
        //Caso o usuário ja tenha um registro salvo, deve atualizar o registro
        $dao->update($attachment);
      }

      $this->photo = $attachment;

      //Salva a foto no servidor
      move_uploaded_file($tmp_photo["tmp_name"], __DIR__ . "/../../" . $attachment->getAddress());

      $thumbnail = $this->generateThumbnail($attachment);
    }

    private function generateThumbnail($attachment) {
      // Largura e altura máximos (máximo, pois como é proporcional, o resultado varia)
      $width  = ProfileAttachmentManager::THUMBNAIL_WIDTH;
      $height = ProfileAttachmentManager::THUMBNAIL_HEIGTH;

      // Endereço completo da imagem Ex: resources/img/exemplo.png
      $address = "./../../" . $attachment->getDirectory() . "/" . $attachment->getFullFilename();

      // Obtendo o tamanho original
      list($width_orig, $height_orig) = getimagesize($address);

      // Calculando a proporção
      $ratio_orig = $width_orig/$height_orig;

      if ($width/$height > $ratio_orig) {
        $width = $height*$ratio_orig;
      }else{
        $height = $width/$ratio_orig;
      }

      // O resize propriamente dito. Na verdade, estamos gerando uma nova imagem.
      $image_p = imagecreatetruecolor($width, $height);
      $image = imagecreatefromjpeg($address);
      imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

      // Salvando a imgem
      imagejpeg($image_p, ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL . "/" . $attachment->getFullFilename() , 75);

      // Atualiza os registros no banco
      $this->thumbnail = updateThumbnail($attachment->getFilename() , $attachment->getExtension());
    }

    private function updateThumbnail($filename , $extension) {

      $directory = ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      $dao = new AttachmentDAO();
      $thumbnail = $dao->load($directory , $filename , $extension);

      if (!$thumbnail) {
        //Caso o thumbnail ainda não exista, deve salvar um novo registro
        $attachment = new Attachment(-1 , $directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($attachment);
      }else{
        //Atualizando o registro já existente do thumbnail
        $dao->update($thumbnail);
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
      return new Attachment(1 , ProfileAttachmentManager::PATH_PROFILE_PHOTO     , ProfileAttachmentManager::ATTACHMENT_NAME_DEFAULT_PHOTO     , "png");
    }

    public static function getDefaultThumbnail() {
      return new Attachment(2 , ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL , ProfileAttachmentManager::ATTACHMENT_NAME_DEFAULT_THUMBNAIL , "png");
    }

  }

?>
