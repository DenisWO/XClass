<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/Attachment.php';
  include_once __DIR__ . '/../../errors/WrongObjectException.php';
  include_once __DIR__ . '/../../errors/SQLException.php';
  include_once __DIR__ . '/../../errors/NotFoundSQLException.php';

  class AttachmentDAO {
    private $conector;
    public function __construct() {
      $this->conector = getConnection();
    }
    
    //Save a new Attachment
    public function save($objectAttachment) {
      if (get_class($objectAttachment) == "Attachment") {
        throw new WrongObjectException("Attachment" , get_class($objectAttachment));
      }

      if(empty($objectAttachment->getId())){
        $sql = 'INSERT INTO Attachment (directory , filename , extension) VALUES (?,?,?)';
        $stmt = $conector->prepare($sql);
        $stmt->bind_param("sss", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() );

        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }

        $stmt->execute();

        if (!$stmt) {
          throw new SQLException($stmt , $sql);
        }
      }else{
        $this->update($objectAttachmenSQLExceptiont);
      }
    }

    //Update an existing Attachment
    public function update($objectAttachment) {
      if (get_class($objectAttachment) == "Attachment") {
        throw new WrongObjectException("Attachment" , get_class($objectAttachment));
      }

      //Refresh updated_at();
      $objectAttachment->setUpdated_at();

      $sql = "UPDATE Attachment SET directory = ? , filename = ? , extension = ? WHERE id = ? ";
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("sssssi", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() , $objectAttachment->getId() );

      if (!$stmt) {
        throw new SQLException($stmt , $sql);
      }

      $stmt->execute();

      if (!$stmt) {
        throw new SQLException($stmt , $sql);
      }
    }

    //Load ALL Attachmentments
    public function loadAll() {

    }

    //Loads only the id specific Attachment
    public function loadId($id) {
      $sql = "SELECT * FROM Attachment WHERE id = '$id'";
      $conect = $conector->query($sql);

      if($dados = $conector->query($sql) === TRUE){
        $attachment = new Attachment(
          $data["id"],
          $data["directory"],
          $data["filename"],
          $data["extension"]
        );
        return $attachment;
      }else{
        throw new SQLException($stmt , $sql);
      }

      throw new NotFoundSQLException($conect);
    }

    //Loads only the filename specific Attachment
    public function loadFilename($filename) {
      $sql = "SELECT * FROM Attachment WHERE filename = '$filename'";
      $conect = $conector->query($sql);

      if($dados = $conector->query($sql) === TRUE){
        $attachment = new Attachment(
          $data["id"],
          $data["directory"],
          $data["filename"],
          $data["extension"]
        );
        return $attachment;
      }else{
        throw new SQLException($stmt , $sql);
      }

      throw new NotFoundSQLException($conect);
    }

    public function load($directory , $filename , $extension) {
      $sql = "SELECT * FROM Attachment WHERE directory = '$directory' AND filename = '$filename' AND extension = '$extension'";
      $conect = $conector->query($sql);

      if($dados = $conector->query($sql) === TRUE){
        $attachment = new Attachment(
          $data["id"],
          $data["directory"],
          $data["filename"],
          $data["extension"]
        );
        return $attachment;
      }else{
        throw new SQLException($stmt , $sql);
      }

      throw new NotFoundSQLException($conect);
    }

    //Delete an existing Attachment
    public function delete() {

    }

  }

?>
