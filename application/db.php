<?php
// ============================================================
//  Conexão com o banco de dados
//  Usa variáveis de ambiente injetadas pelo KaizenOps.
//  Fallback para valores locais (XAMPP) caso não existam.
// ============================================================

define('DB_HOST', getenv('DB_HOST') ?: 'db');
define('DB_NAME', getenv('DB_NAME') ?: 'app');
define('DB_USER', getenv('DB_USER') ?: 'app');
define('DB_PASS', getenv('DB_PASS') ?: 'app');

function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            die('Erro de conexão com o banco: ' . $e->getMessage());
        }
    }
    return $pdo;
}
