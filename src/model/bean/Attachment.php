<?php

  class Attachment{

    var $id;
    var $directory
    var $filename
    var $extension
    var $created_at
    var $updated_at

    public function __construct( $directory , $filename , $extension ) {
      // Construction default
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

    public function getUpdated_at() {
      return $this->updated_at;
    }

  }

?>
