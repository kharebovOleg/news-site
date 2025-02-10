<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    'NAME' => 'Случайные элементы',
    'DESCRIPTION' => 'Выводит несколько случайных элементов инфоблока',
    'PATH' => array(
        'ID' => 'other_components',
        'NAME' => 'Прочие компоненты',
        'CHILD' => array(
            'ID' => 'other_iblock',
            'NAME' => 'Информационный блок'
        )
    )
);