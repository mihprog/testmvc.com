<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();


        $CategoriesList = array();

        $result = $db->query('SELECT  id, name, sort_order, status '
            .'FROM category '
            .'ORDER BY sort_order ASC ');

        $i = 0;
        while ($row = $result->fetch())
        {
            $CategoriesList[$i]['id'] = $row['id'];
            $CategoriesList[$i]['name'] = $row['name'];
            $CategoriesList[$i]['sort_order'] = $row['sort_order'];
            $CategoriesList[$i]['status'] = $row['status'];

            $i++;
        }
        return $CategoriesList;
    }
}