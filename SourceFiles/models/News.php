<?php

class news
{
    //returns news specified by id
    public static function getNewsItemById($id)
    {
        $id = intval($id);
        if($id)
            {
                $db = Db::getConnection();

                $result = $db->query('SELECT * FROM news WHERE id='.$id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                $newsItem = $result->fetch();
                return $newsItem;
            }



    }


    //returns an array of news items
    public static function getNewsList()
    {
        $db = Db::getConnection();


        $newsList = array();

        $result = $db->query('SELECT  id, title, date, short_content, author_name '
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
            $newsList[$i]['author_name'] = $row['author_name'];

            $i++;
        }
        return $newsList;

    }
}