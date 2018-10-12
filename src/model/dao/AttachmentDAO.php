<?php
  include './../connection/Connection.php';
  include './../bean/Attachment.php';

  class AttachmentDAO() {
    public function __construct() {
      //Default constructor
    }

    //Save a new Attachment
    public function save($objectAttachment) {
      if (get_class($objectAttachment) == "Attachment") {
        throw new WrongObjectException("Wrong object" , "Attachment" , get_class($objectAttachment));
      }

      if(empty($objectAttachment->getId())){
        $sql = 'INSERT INTO Attachment (directory , filename , extension , created_at , updated_at) VALUES (?,?,?,?,?)';
        $stmt = $conector->prepare($sql);
        $stmt->bind_param("sssss", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() , $objectAttachment->getCreated_at() , $objectAttachment->getUpdated_at() );
        $stmt->execute();
      }else{
        $this->update($objectAttachment);
      }
    }

    //Update an existing Attachment
    public function update($objectAttachment) {
      if (get_class($objectAttachment) == "Attachment") {
        throw new WrongObjectException("Wrong object" , "Attachment" , get_class($objectAttachment));
      }

      $sql = "UPDATE Attachment SET directory = ? , filename = ? , extension = ? , created_at = ? , updated_at = ? WHERE id = '$objectAttachment->getId()' "
      $stmt = $conector->prepare($sql);
      $stmt->bind_param("sssss", $objectAttachment->getDirectory(), $objectAttachment->getFilename() , $objectAttachment->getExtension() , $objectAttachment->getCreated_at() , $objectAttachment->getUpdated_at() );
      $stmt->execute();
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
      }
    }

    //Delete an existing Attachment
    public function delete() {

    }
  }

?>
