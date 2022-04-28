<?php

namespace app\controllers;

use app\models\Products;


class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {


        $page = $_GET['page'] ?? 0;

       // $catalog = Products::getAll();
        $catalog = Products::getLimit(($page + 1) * 2); //2 4 6 8

       // $user = Users::getWhere('login', 'admin');
        echo $this->render('product/catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard() {

        $id = $_GET['id'];

        $product = Products::getOne($id);

        echo $this->render('product/card', [
            'product' => $product
        ]);
    }


}