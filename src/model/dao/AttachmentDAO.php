<?php

  include_once __DIR__ . '/../../connection/Connection.php';
  include_once __DIR__ . '/../bean/Attachment.php';
  class AttachmentDAO {
    private $conn;
    public function __construct() {
      $this->conn = getConnection();
    }

    //Save a new Attachment
    public function save($objectAttachment) {

      $sql = "INSERT INTO attachments (directory , filename , extension) VALUES ('{$objectAttachment->getDirectory()}','{$objectAttachment->getFilename()}','{$objectAttachment->getExtension()}')";
      $sql = "INSERT INTO Attachment (directory , filename , extension)
      VALUES (
        '{$objectAttachment->getDirectory()}',
        '{$objectAttachment->getFilename()}',
        '{$objectAttachment->getExtension()}'
      )";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Update an existing Attachment
    public function update($objectAttachment) {
      $sql = "UPDATE attachments SET directory = '{$objectAttachment->getDirectory()}', filename = '{$objectAttachment->getFilename()}', extension = '{$objectAttachment->getExtension()}' WHERE id= {$objectAttachment->getId()}";
      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

    //Load ALL Attachmentments
    public function loadAll() {
      $sql = "SELECT * FROM attachments";
      $stmt = $this->conn->query($sql);

      $attachments = array();

      while($dados = $stmt->fetch_array()){

        $attachment = new Attachment(
          $dados["id"],
          $dados["directory"],
          $dados["filename"],
          $dados["extension"]
        );

        array_push($attachments , $attachment);
    	}

      return $attachments;
    }

    //Loads only the id specific Attachment
    public function loadId($id) {
      $sql = "SELECT * FROM attachments WHERE id = {$id}";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $attachment = new Attachment(
          $dados["id"],
          $dados["directory"],
          $dados["filename"],
          $dados["extension"]
        );

        return $attachment;
    	}

      return FALSE;
    }

    //Loads only the filename specific Attachment
    public function loadFilename($filename) {
      $sql = "SELECT * FROM attachments WHERE filename = {$filename}";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $attachment = new Attachment(
          $dados["id"],
          $dados["directory"],
          $dados["filename"],
          $dados["extension"]
        );

        return $attachment;
    	}

      return FALSE;
    }

    public function load($directory , $filename , $extension) {
      $sql = "SELECT * FROM attachments WHERE directory = '{$directory}' AND filename = '{$filename}' AND extension = '{$extension}'";
      $stmt = $this->conn->query($sql);

      if($dados = $stmt->fetch_array()){

        $attachment = new Attachment(
          $dados["id"],
          $dados["directory"],
          $dados["filename"],
          $dados["extension"]
        );

        return $attachment;
    	}

      return FALSE;
    }

    //Delete an existing Attachment
    public function delete($objectAttachment) {
      $sql = "DELETE FROM attachments WHERE id = {$objectAttachment->id}";

      if ($this->conn->query($sql) === TRUE) {
          return TRUE;
      } else {
          return FALSE;
      }
    }

  }

?>
