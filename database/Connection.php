<?php
class Connection
{

  public static function connect($config)
  {
    $connectionString = $config['connection'] . ";dbname={$config['name']}" . ";charset=utf8mb4";
    try {
      return new PDO(
        $connectionString,
        $config['username'],
        $config['password']
      );
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
