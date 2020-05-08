<?php
$xpdo_meta_map['User']= array (
  'package' => 'demo',
  'version' => '1.1',
  'table' => 'users',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'InnoDB',
  ),
  'fields' => 
  array (
    'name' => '',
    'description' => NULL,
    'address' => '',
  ),
  'fieldMeta' => 
  array (
    'name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => true,
    ),
    'address' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
  'aggregates' => 
  array (
    'Comments' => 
    array (
      'class' => 'comment',
      'local' => 'id',
      'foreign' => 'author',
      'cardinality' => 'many',
      'owner' => 'local',
    ),
  ),
);
