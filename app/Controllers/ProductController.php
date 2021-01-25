<?php 

class ProductController {

    public function index() {
        // echo 'Products';

        $db = new Product();
        $data['products'] = $db->getAllProducts();
        view::load('product/index', $data);
        
    }

    // Add new Product  and view add page
    public function add() {

        view::load('product/add');
    }




    // get data from form and store product info
    public function store() {
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            //echo $name . "=" .$price. "=" .$description;
            $data = Array ("name" => $name,
                    "price" => $price,
                    "description" => $description
                   );

            $db = new Product(); //connection established

            if($db->insertProduct($data)) {


                view::load("product/add", ["success"=>"Data Created Successfully"]);
            }
            else {
                view::load("product/add", ["error"=>"Data Created Unsuccessfully"]);
            }

        }
    }

    // give form details for edite product
    public function edit($id) {

        $db = new Product();
        //var_dump($db->getRow($id));
        if($db->getRow($id)) {
            $data['row'] = $db->getRow($id);
            view::load("product/edit", $data);
        }
        else {
            echo "Error";
        }
        
    }

    // Update the data of product
    public function update($id) {
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            //echo $name . "=" .$price. "=" .$description;
            $dataInsert = Array ("name" => $name,
                    "price" => $price,
                    "description" => $description
                   );

            $db = new Product(); //connection established

            if($db->updateProduct($id, $dataInsert)) {

                $data['row'] = $db->getRow($id);
                view::load("product/edit", ["success"=>"Data Updated Successfully", 'row'=>$db->getRow($id)]);
            }
            else {
                view::load("product/edit", ["error"=>"Data Updated Unsuccessfully", 'row'=>$db->getRow($id)]);
            }

        }
    }

    // delete product
    public function delete($id) {

        $db = new Product();
        if($db->deleteProduct($id)) {
            view::load("product/delete");
        }
        else {
            echo "Error";
        }
        
    }

    


}