<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model
{
  public function getProducts(){
    $query = "SELECT * FROM products";
    return $this->db->query($query);
  }

  public function getProduct($prodID){
    $query = "SELECT * FROM products WHERE id = ?";
    return $this->db->query($query, [$prodID]);
  }

  public function saveProduct($data)
  {
    $query = "INSERT INTO products (product_name, product_code, price, stock) VALUES(?, ?, ?, ?)";
    $this->db->query($query, $data);
  }

  public function updateProduct($data)
  {
    $query = "UPDATE products SET product_name = ?, product_code = ?, price = ?, stock = ? WHERE id = ?";
    $this->db->query($query, $data);
  }

  public function checkProduct($prodCode, $prodID){
    $where  = "";
    $data[] = $prodCode;
    if(is_numeric($prodID)){
      $where  = "AND id != ?";
      $data[] = $prodID;
    }
    $query = "SELECT * FROM products WHERE product_code = ? $where";
    return $this->db->query($query, $data);
  }

  public function deleteProduct($prodID){
    $query = "DELETE FROM products WHERE id = ?";
    $this->db->query($query, $prodID);
  }
}

 ?>
