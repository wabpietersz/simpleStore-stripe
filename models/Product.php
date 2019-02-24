<?php
class Product{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public Function addProduct($data){

         //prepare query
         $this->db->query('INSERT INTO stores (product,type,amount,currency,stock) VALUES (:product, :type, :amount, :currency, :stock)');


        //Bind values
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':stock', $data['stock']);



        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateProduct($product,$stock){
        $this->db->query('UPDATE stores SET stock = stock +'.$stock.' WHERE product ="'.$product.'"');
        $this->db->execute();
    }

    public function getProducts(){
        $this->db->query('SELECT * FROM stores');

        $results = $this->db->resultset();
        return $results;
    }

    public function getProductsAvailable(){
        $this->db->query('SELECT * FROM stores WHERE stock > 0');

        $results = $this->db->resultset();
        return $results;
    }

    public function stockReduce($id){
        $this->db->query('UPDATE stores SET stock = stock - 1 WHERE id ='.$id);
        $this->db->execute();
    }

    
    public function productAvailable($name){
        $name = strval($name);
        $query = $this->db->query('SELECT stock FROM stores WHERE product ="'.$name.'"');
        $this->db->execute($query);
        $rows = $this->db->rowCount();

        if($rows > 0){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
}