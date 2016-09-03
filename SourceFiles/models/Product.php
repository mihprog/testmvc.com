<?php


class Product
{
    const SHOW_BY_DEFAULT = 10;

//    returns an array of products

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query("SELECT id, name, image, price, is_new".
            " FROM product".
            " WHERE status = '1'".
            " ORDER BY id DESC".
            " LIMIT ".$count);

        $i = 0;

        while ($row = $result->fetch())
        {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function getProductsByCategory($categoryId)
    {
        if ($categoryId) {
            $db = Db::getConnection();

            $productsList = array();

            $result = $db->query("SELECT id, name, image, price, is_new" .
                " FROM product" .
                " WHERE status = '1' AND category_id = '$categoryId'" .
                " ORDER BY id DESC" .
                " LIMIT ".self::SHOW_BY_DEFAULT);

            $i = 0;

            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $productsList;
        }
    }
    public static function getProductsById($productId)
    {
        $productId = intval($productId);
        if ($productId) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM product WHERE id = '$productId'");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();

        }
    }

}