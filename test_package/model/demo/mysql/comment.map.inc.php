<?php
$xpdo_meta_map['Comment']= array (
  'package' => 'demo',
  'version' => '1.1',
  'table' => 'comments',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'author' => 0,
    'body' => '',
  ),
  'fieldMeta' => 
  array (
    'author' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'body' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
  'aggregates' => 
  array (
    'Author' => 
    array (
      'class' => 'User',
      'local' => 'author',
      'foreign' => 'id',
      'cardinality' => 'one',
      'owner' => 'foreign',
    ),
  ),
);
