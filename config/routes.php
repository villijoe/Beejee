<?php

return array(
    'edit' => 'site/edit',
    'sort\/([\d]+)\/([\d])' => 'site/sort/$1/$2',
    //'page\/([\d]+)(?:\/([\w]+)\/([\w]+)){0,}(?:\/([\w]+)\/([\d]+)){0,}' => 'site/index/$1/$2/$3/$4/$5/$6/$7',
    'page\/([\d]+)' => 'site/index/page/$1',
    'admin/logout' => 'admin/logout',
    'admin/login' => 'admin/login',
    'admin' => 'admin/index',
    'task/show' => 'task/show',
    'task/save' => 'task/save',
    'task/add' => 'task/add',
    '/' => 'site/index',
    '([\d\w\\:\/.]+)' => '$1'
);