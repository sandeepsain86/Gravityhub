<?php

function database_connection(): PDO
{
    static $connection = null;
    if ($connection instanceof PDO) {
        return $connection;
    }

    $localConfigPath = __DIR__ . '/config.local.php';
    $localConfig = is_file($localConfigPath) ? require $localConfigPath : [];
    if (!is_array($localConfig)) {
        throw new RuntimeException('The local database configuration must return an array.');
    }

    $host = getenv('ENERGYHUB_DB_HOST') ?: ($localConfig['host'] ?? '');
    $port = getenv('ENERGYHUB_DB_PORT') ?: ($localConfig['port'] ?? 3306);
    $database = getenv('ENERGYHUB_DB_NAME') ?: ($localConfig['database'] ?? '');
    $username = getenv('ENERGYHUB_DB_USER') ?: ($localConfig['username'] ?? '');
    $passwordFromEnvironment = getenv('ENERGYHUB_DB_PASSWORD');
    $password = $passwordFromEnvironment !== false
        ? $passwordFromEnvironment
        : ($localConfig['password'] ?? '');

    if ($host === '' || $database === '' || $username === '') {
        throw new RuntimeException(
            'Database is not configured. Set ENERGYHUB_DB_* environment variables or create includes/config.local.php.'
        );
    }

    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4',
        $host,
        (int) $port,
        $database
    );

    $connection = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    return $connection;
}
