<?php

require_once 'vendor/autoload.php';
$faker = Faker\Factory::create();

include 'properties.inc.php';

$driver = $properties['xpdo_driver'];
$xpdo = new xPDO(
    $properties[$driver . '_string_dsn_test'],
    $properties[$driver . '_string_username'],
    $properties[$driver . '_string_password']
);

// Then create the object containers
$packageBasePath = __DIR__ . '/test_package/model/';
$xpdo->setPackage('demo', $packageBasePath);
$xpdo->getManager()->createObjectContainer(User::class);

for ($i = 0; $i < 10; $i++) {
    $userInfo = [
        'name' => $faker->name,
        'description' => $faker->optional()->paragraph,
        'address' => $faker->address,
    ];

    /** @var User $xpdoUser */
    $xpdoUser = $xpdo->newObject(User::class);
    $xpdoUser->fromArray($userInfo);
    $xpdoUser->save();
}

// If we want to remove them (after e.g testing)
$xpdo->getManager()->removeObjectContainer(User::class);

// Now lets use xpdo adapter

$xpdo->getManager()->createObjectContainer(Comment::class);
$xpdo->getManager()->createObjectContainer(User::class);

$faker = Faker\Factory::create();

$populator = new \SpringbokAgency\Faker\ORM\xPDO\Populator($faker, $xpdo);

$populator->addEntity(User::class, 10, [
    'name' => function() use ($faker) {
        return $faker->name;
    },
]);

$insertedPKs = $populator->execute();

$xpdo->getManager()->removeObjectContainer(Comment::class);
$xpdo->getManager()->removeObjectContainer(User::class);

