<?php

  include_once './../../connection/Connection.php';
  include_once './../bean/Attachment.php';
  include_once './../../errors/WrongObjectException.php';
  include_once './../../errors/SQLException.php';
  include_once './../../errors/NotFoundSQLException.php';

  class AttachmentDAO() {

    public function __construct() {

    }

    //Save a new Attachment
    public function save($objectAttachment) {
      if (get_class($objectAttachment) == "Attachment") {
        throw new WrongObjectException("Attachment" , get_class($objectAttachment));
      }

      if(empty($objectAttachment->getId())){
        $sql = 'INSERT INTO Attachment (directory , filename , extension , created_at , updated_at) VALUES (?,?,?,?,?)';
        $stmt = $conector->prepare($sql);
        $stmt->bind_param("sssss", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() , $objectAttachment->getCreated_at() , $objectAttachment->getUpdated_at() );

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

      $sql = "UPDATE Attachment SET directory = ? , filename = ? , extension = ? , created_at = ? , updated_at = ? WHERE id = ? "
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("sssssi", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() , $objectAttachment->getCreated_at() , $objectAttachment->getUpdated_at() , $objectAttachment->getId() );

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
          $data["extension"],
          $data["created_at"],
          $data["updated_at"]
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
          $data["extension"],
          $data["created_at"],
          $data["updated_at"]
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
          $data["extension"],
          $data["created_at"],
          $data["updated_at"]
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
