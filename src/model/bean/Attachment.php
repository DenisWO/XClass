<?php

  class Attachment{

    private $id;
    private $directory;
    private $filename;
    private $extension;

    public function __construct($id , $directory , $filename , $extension) {
      $this->setId($id);
      $this->setDirectory($directory);
      $this->setFilename($filename);
      $this->setExtension($extension);
    }

    public function getAddress() {
      return $this->getDirectory() . "/" . $this->getFilename() . $this->getExtension();
    }

    public function getFullFilename() {
      return $this->getFilename() . $this->getExtension();
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

  }

?>
