<?php 

class ProductController{
    public function index(){
        $db= new Product;

        $data['product']= $db->getAllProduct();
        // var_dump($db->getAllProduct());

        View::load('product/index', $data);
    }

    public function add(){
        $db= new Product;

        $data['product']= $db->getAllProduct();
        // var_dump($db->getAllProduct());

        View::load('product/add');
    }
}







?>