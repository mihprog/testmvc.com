<?php

class news
{
    //returns news specified by id
    public static function getNewsItemById()
    {
        //Запрос к бд

    }


    //returns an array of news items
    public static function getNewsList()
    {
        $host = 'testmvc.com';
        $dbname = 'mvc_site';
        $user = 'root';
        $password = 'root';
        $db = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);

        $newsList = array();

        $result = $db->query('SELECT  id, title, date, short_content '
        .'FROM news '
        .'ORDER BY date DESC '
        .'LIMIT 10');
        //return $db->;

        $i = 0;
        while ($row = $result->fetch())
        {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;

    }
}