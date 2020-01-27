<?php

class Items {

private $_db = null;
private $_itemsTable = "items";

  function __construct($db){
    $this->_db = $db;

    return  $this->_db;
  }

  function create(){

  	$stmt = $this->_db->prepare("
  		INSERT INTO ".$this->_itemsTable."(`title`, `description`, `price`, `available_stock`, `status`,`modified`)
  		VALUES(?,?,?,?,?,?)");

  	$this->description = htmlspecialchars(strip_tags($this->description));
  	$this->title = htmlspecialchars(strip_tags($this->title));
  	$this->price = htmlspecialchars(strip_tags($this->price));
  	$this->available_stock = htmlspecialchars(strip_tags($this->available_stock));
  	$this->status = htmlspecialchars(strip_tags($this->status));
  	$this->modified = htmlspecialchars(strip_tags($this->modified));


  	$stmt->bind_param("ssiiis", $this->title, $this->description, $this->price, $this->available_stock, $this->status, $this->modified);

  	if($stmt->execute()){
  		return true;
  	}

  	return false;
  }

  function read(){
  	if($this->id) {
  		$stmt = $this->_db->prepare("SELECT * FROM ".$this->_itemsTable." WHERE id = ?");
  		$stmt->bind_param("i", $this->id);
  	} else {
  		$stmt = $this->_db->prepare("SELECT * FROM ".$this->_itemsTable);
  	}
  	$stmt->execute();
  	$result = $stmt->get_result();
  	return $result;
  }

  function update(){

  	$stmt = $this->_db->prepare("
  		UPDATE ".$this->_itemsTable."
  		SET title = ?, description = ?, price = ?, available_stock = ?, status = ?, modified = ?
  		WHERE id = ?");

  	$this->id = htmlspecialchars(strip_tags($this->id));
  	$this->title = htmlspecialchars(strip_tags($this->title));
  	$this->description = htmlspecialchars(strip_tags($this->description));
  	$this->price = htmlspecialchars(strip_tags($this->price));
  	$this->available_stock = htmlspecialchars(strip_tags($this->available_stock));
  	$this->status = htmlspecialchars(strip_tags($this->status));
    $this->modified = date('Y-m-d H:i:s');

  	$stmt->bind_param("ssiiisi", $this->title, $this->description, $this->price, $this->available_stock, $this->status, $this->modified, $this->id);

  	if($stmt->execute()){
  		return true;
  	}

  	return false;
  }

  function delete(){

  	$stmt = $this->_db->prepare("
  		DELETE FROM ".$this->_itemsTable."
  		WHERE id = ?");

  	$this->id = htmlspecialchars(strip_tags($this->id));

  	$stmt->bind_param("i", $this->id);

  	if($stmt->execute()){
      if ($stmt->affected_rows <= 0) {
        return false;
      } else {
        return true;
      }
  	}
  	return false;
  }
}
 ?>
