<?php 

// create table
$table = [
    'users' => [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'name' => 'VARCHAR(255) NOT NULL',
        'email' => 'VARCHAR(255) NOT NULL',
        'password' => 'VARCHAR(255) NOT NULL',
        'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    ],
    'anime' => [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'title' => 'VARCHAR(255) NOT NULL',
        'description' => 'TEXT NOT NULL',
        'image' => 'VARCHAR(255) NOT NULL',
        'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    ],
    'episode' => [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'anime_id' => 'INT(11) NOT NULL',
        'title' => 'VARCHAR(255) NOT NULL',
        'description' => 'TEXT NOT NULL',
        'image' => 'VARCHAR(255) NOT NULL',
        'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    ],
    'episode_video' => [
        'id' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
        'episode_id' => 'INT(11) NOT NULL',
        'video_id' => 'VARCHAR(255) NOT NULL',
        'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        'updated_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
    ],
];