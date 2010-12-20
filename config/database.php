<?php

$db_connections = parse_ini_file(CONFIG_DIR . 'connections.ini', true);

// connect to database(s)
foreach ($db_connections as $connection_name => $db_params) {
	ClassLoader::import('DATABASE:adapter:' . $db_params['driver']);
	DBManager::addConnection($connection_name, $db_params);
}