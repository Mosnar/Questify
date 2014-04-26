<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 1:00 AM
 */
$router = new \Phalcon\Mvc\Router();

$router->add("/company-login", array(
    'controller' => 'user',
    'action' => 'login',
));

$router->add("/logout", array(
    'controller' => 'user',
    'action' => 'logout',
));

$router->add("/register", array(
    'controller' => 'user',
    'action' => 'register',
));

$router->add(
    "/c/{company}",
    array(
        "controller" => 'Home',
        "action"     => 'index',
    )
);

$router->add(
    "/qadmin/view/{id}",
    array(
        "controller" => 'qadmin',
        "action"     => 'view',
    )
);

$router->add(
    "/quest/view/{id}",
    array(
        "controller" => 'quest',
        "action"     => 'view',
    )
);

$router->add(
    "/qadmin/delete/{id}",
    array(
        "controller" => 'qadmin',
        "action"     => 'delete',
    )
);


$router->add(
    "/login/{company}",
    array(
        "controller" => 'facebook',
        "action"     => 'login',
    )
);

/*
$router->add("/products/:action", array(
    'controller' => 'products',
    'action' => 1,
));
*/