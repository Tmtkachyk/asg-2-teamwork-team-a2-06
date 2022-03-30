<?php
return [
  'database' => [
    'name' => $_ENV['DATABASE_NAME'] ?? 'movies',
    'username' => $_ENV['DATABASE_USER'] ?? 'root',
    'password' => $_ENV['DATABASE_PW'] ?? '',
    'connection' => $_ENV['DATABASE_CONNECTION'] ?? 'mysql:host=localhost'
<<<<<<< HEAD
  ]
=======
  ],

  'users' => [
    'name' => $_ENV['DATABASE_NAME'] ?? 'users',
    'username' => $_ENV['DATABASE_USER'] ?? 'root',
    'password' => $_ENV['DATABASE_PW'] ?? '',
    'connection' => $_ENV['DATABASE_CONNECTION'] ?? 'mysql:host=localhost'
  ]

>>>>>>> 7908d819d2ebe6a526921ee1c4f5eeeed879613f
];
