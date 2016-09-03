<?php

return array(

    //'news/([0-9]+)' => 'news/view/$1',

   // 'news' => 'news/index', //actionIndex в NewsController
   // 'products' => 'product/list', //actionList в ProductController
    'product/([0-9]+)' => 'product/view/$1',
    'catalog'=>'catalog/index',
    'category/([0-9]+)'=> 'catalog/category/$1',
    '' => 'site/index',//action Index SiteController


);