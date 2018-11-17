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
      if(!preg_match("/^image\/(jpeg|png)$/", $tmp_photo["type"])) {
        echo "Suportado apenas JPEG e PNG";
				return FALSE;
      }

      //Pega o endereço aonde será salvo o arquivo
      $directory = ProfileAttachmentManager::PATH_PROFILE_PHOTO;

      //Pega a extensão do arquivo e coloca em $extension
      preg_match("/\.(png|jpeg){1}$/i", $tmp_photo["name"], $extension);
      $extension = $extension[0];

      //O nome do arquivo será o ID do usuário
      $filename = $objectUser->getId();

      $dao = new AttachmentDAO();
      $attachment = $dao->load($directory , $filename , $extension);

      if (!$attachment) {
        //Caso o usuário ainda não tenha um foto, deve salvar um novo registro
        $attachment = new Attachment(-1 , $directory , $filename , $extension);
        $dao->save($attachment);
        $attachment = $dao->load($attachment->getDirectory() , $attachment->getFilename() , $attachment->getExtension());
      }else{
        //Caso o usuário ja tenha um registro salvo, deve atualizar o registro
        $dao->update($attachment);
      }

      $this->photo = $attachment;

      //Salva a foto no servidor
      move_uploaded_file($tmp_photo["tmp_name"], __DIR__ . "/../../" . $attachment->getAddress());

      if ($extension === ".jpeg") {
        $thumbnail = $this->generateThumbnailJPEG($filename);
      } else if ($extension === ".png") {
        $thumbnail = $this->generateThumbnailPNG($filename);
      } else{
        return FALSE;
      }

      return TRUE;
    }

    private function generateThumbnailJPEG($objectUser) {
      // O caminho da nossa imagem no servidor
      $fullFilename = $filename . ".jpeg";
      $backToRoot = "./../../";
      $caminho_imagem_foto = $backToRoot . ProfileAttachmentManager::PATH_PROFILE_PHOTO;
      $caminho_imagem_thumb = $backToRoot . ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      // Retorna o identificador da imagem
      $imagem = imagecreatefromjpeg($caminho_imagem_foto . "/" . $fullFilename);

      // Cria duas variáveis com a largura e altura da imagem
      list( $largura, $altura ) = getimagesize( $caminho_imagem_foto . "/" . $fullFilename );

      // Nova largura e altura
      $nova_largura = ProfileAttachmentManager::THUMBNAIL_WIDTH;
      $nova_altura = ProfileAttachmentManager::THUMBNAIL_HEIGTH;

      // Cria uma nova imagem em branco
      $nova_imagem = imagecreatetruecolor( $nova_largura, $nova_altura );

      // Copia a imagem para a nova imagem com o novo tamanho
      imagecopyresampled(
          $nova_imagem, // Nova imagem
          $imagem, // Imagem original
          0, // Coordenada X da nova imagem
          0, // Coordenada Y da nova imagem
          0, // Coordenada X da imagem
          0, // Coordenada Y da imagem
          $nova_largura, // Nova largura
          $nova_altura, // Nova altura
          $largura, // Largura original
          $altura // Altura original
      );

      // Cria a imagem
      imagejpeg( $nova_imagem , $caminho_imagem_thumb . "/" . $fullFilename , 1 );

      $this->thumbnail = $this->updateThumbnail($filename , ".jpeg");
    }

    private function generateThumbnailPNG($filename) {
      // O caminho da nossa imagem no servidor
      $fullFilename = $filename . ".png";
      $backToRoot = "./../../";
      $caminho_imagem_foto = $backToRoot . ProfileAttachmentManager::PATH_PROFILE_PHOTO;
      $caminho_imagem_thumb = $backToRoot . ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      // Retorna o identificador da imagem
      $imagem = imagecreatefrompng($caminho_imagem_foto . "/" . $fullFilename);

      // Cria duas variáveis com a largura e altura da imagem
      list( $largura, $altura ) = getimagesize( $caminho_imagem_foto . "/" . $fullFilename );

      // Nova largura e altura
      $nova_largura = ProfileAttachmentManager::THUMBNAIL_WIDTH;
      $nova_altura = ProfileAttachmentManager::THUMBNAIL_HEIGTH;

      // Cria uma nova imagem em branco
      $nova_imagem = imagecreatetruecolor( $nova_largura, $nova_altura );

      // Copia a imagem para a nova imagem com o novo tamanho
      imagecopyresampled(
          $nova_imagem, // Nova imagem
          $imagem, // Imagem original
          0, // Coordenada X da nova imagem
          0, // Coordenada Y da nova imagem
          0, // Coordenada X da imagem
          0, // Coordenada Y da imagem
          $nova_largura, // Nova largura
          $nova_altura, // Nova altura
          $largura, // Largura original
          $altura // Altura original
      );

      // Cria a imagem
      imagepng( $nova_imagem , $caminho_imagem_thumb . "/" . $fullFilename , 1 );

      $this->thumbnail = $this->updateThumbnail($filename , ".png");
    }

    private function updateThumbnail($filename , $extension) {

      $directory = ProfileAttachmentManager::PATH_PROFILE_THUMBNAIL;

      $dao = new AttachmentDAO();
      $thumbnail = $dao->load($directory , $filename , $extension);

      if (!$thumbnail) {
        //Caso o thumbnail ainda não exista, deve salvar um novo registro
        $thumbnail = new Attachment(-1 , $directory , $filename , $extension);
        $dao = new AttachmentDAO();
        $dao->save($thumbnail);
        $thumbnail = $dao->load($directory , $filename , $extension);
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
