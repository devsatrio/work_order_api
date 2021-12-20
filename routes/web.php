<?php
$router->get('/', function () {
    return 'API Work Order';
});
$router->get('/{unit}', 'workordercontroller@index');
$router->post('login', 'workordercontroller@login');
