<?php

  include_once __DIR__ . "/../../errors/Created_atException.php";

  class Attachment{

    private $id;
    private $directory;
    private $filename;
    private $extension;
    private $created_at; // Timestamp object
    private $updated_at; // Timestamp object

    public function __construct($id , $directory , $filename , $extension , $created_at , $updated_at) {
      $this->setId($id);
      $this->setDirectory($directory);
      $this->setFilename($filename);
      $this->setExtension($extension);
      $this->setCreated_at($created_at);
      $this->setUpdated_at($updated_at);
    }

    /*public function __construct( $directory , $filename , $extension ) {
      $this->setDirectory($directory);
      $this->setFilename($filename);
      $this->setExtension($extension);
      $this->setCreated_at();
      $this->setUpdated_at();
    }*/

    public function getFullFilename() {
      return $this->getFilename() . "." . $this->getExtension();
    }

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getDirectory() {
      return $this->directory;
    }

    public function setDirectory($directory) {
      $this->directory = $directory;
    }

    public function getFilename() {
      return $this->filename;
    }

    public function setFilename($filename) {
      $this->filename = $filename;
    }

    public function getExtension() {
      return $this->extension;
    }

    public function setExtension($extension) {
      $this->extension = $extension;
    }

    public function getCreated_at() {
      return $this->created_at;
    }

    /*public function setCreated_at() {
      if (empty($this->created_at)) {
        $this->created_at = date('Y-m-d H:i:s');
      }else{
        throw new Created_atException();
      }
    }*/

    public function setCreated_at($date) {
      $this->created_at = $date;
    }

    public function getUpdated_at() {
      return $this->updated_at;
    }

    /*public function setUpdated_at() {
      $this->updated_at = date('Y-m-d H:i:s');
    }*/

    public function setUpdated_at($date) {
      $this->updated_at = $date;
    }

  }

?>
