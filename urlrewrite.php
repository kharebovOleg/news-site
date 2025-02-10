<?php
$arUrlRewrite= [
  [
  'CONDITION' => '#^/news/detail/#',
  'RULE' => 'CODE=$1',
  'ID' => '',
  'PATH' => '/news/detail_info.php',
  'SORT' => 100,
  ],
  [
  'CONDITION' => '#^/news/#',
  'RULE' => 'CODE=$1',
  'ID' => '',
  'PATH' => '/news/index.php',
  'SORT' => 100,
  ],
];
