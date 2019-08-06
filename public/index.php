<?php

namespace App;

require __DIR__ . '/../vendor/autoload.php';

$faker = \Faker\Factory::create();
$faker->seed(1234);

$domains = [];
for ($i = 0; $i < 10; $i++) {
    $domains[] = $faker->domainName;
}

$phones = [];
for ($i = 0; $i < 10; $i++) {
    $phones[] = $faker->phoneNumber;
}

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

$app->get('/', function ($request, $response) {
    $response->write('go to the /phones or /domains');
});

$app->get('/phones', function ($request, $response) use ($phones) {
    $response->write(json_encode($phones));
});

$app->get('/domains', function ($request, $response) use ($domains) {
    $response->write(json_encode($domains));
});

$app->run();
