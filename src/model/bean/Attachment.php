<?php

  include_once "./../../errors/Created_atException.php";

  class Attachment{

    var $id;
    var $directory;
    var $filename;
    var $extension;
    var $created_at; // Timestamp object
    var $updated_at; // Timestamp object

    public function __construct($id , $directory , $filename , $extension , $created_at , $updated_at) {
      $this->setId($id);
      $this->setDirectory($directory);
      $this->setFilename($filename);
      $this->setExtension($extension);
      $this->setCreated_at($created_at);
      $this->setUpdated_at($updated_at);
    }

    public function __construct( $directory , $filename , $extension ) {
      $this->setDirectory($directory);
      $this->setFilename($filename);
      $this->setExtension($extension);
      $this->setCreated_at();
      $this->setUpdated_at();
    }

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

    private function setCreated_at() {
      if (empty($this->created_at)) {
        $this->created_at = date('Y-m-d H:i:s');
      }else{
        throw new Created_atException();
      }
    }

    private function setCreated_at($date) {
      $this->created_at = $date
    }

    public function getUpdated_at() {
      return $this->updated_at;
    }

    public function setUpdated_at() {
      $this->updated_at = date('Y-m-d H:i:s');
    }

    private function setUpdated_at($date) {
      $this->updated_at = $date;
    }

  }

?>
