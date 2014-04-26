<?php

$loader = new \Phalcon\Loader();

// Register the Facebook library
$loader->registerClasses(
    array(
        "Facebook" => $config->application->libraryDir.'/facebook/facebook.php',
    )
);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->formsDir
    )
)->register();
