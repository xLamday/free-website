<?php
$config = [
    'db_engine' => 'mysql',
    'db_host' => '127.0.0.1 (localhost)',
    'db_name' => 'yourdbname',
    'db_user' => 'yourdbuser',
    'db_password' => 'yourdbpassword (if you have one. If you do not have one, leave this blank',
];

$db_config = $config['db_engine'] . ":host=".$config['db_host'] . ";dbname=" . $config['db_name'];

try {
    $pdo = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);
        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossible connecting to database: " . $e->getMessage());
}
