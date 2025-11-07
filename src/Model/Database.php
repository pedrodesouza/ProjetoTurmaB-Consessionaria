<?php

namespace Concessionaria\Projetob\Model;
use PDO;
use PDOException;

class Database{
    private static ?PDO $conexao = null;
    private static string $host = "localhost";
    private static string $dbname = "PRJ2DS";
    private static string $usuario = "Aluno2DS";
    private static string $senha = "SenhaBD2";
    private static string $charset = "utf8mb4";

    public static function getConexao(): PDO
    {
        if (self::$conexao === null) {

            $dsn = "mysql:host=" . self::$host .
                   ";dbname=" . self::$dbname .
                   ";charset=" . self::$charset;

            try {
                self::$conexao = new PDO($dsn, self::$usuario, self::$senha, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_PERSISTENT => false
                ]);
            } catch (PDOException $e) {
                throw new \Exception("Falha ao conectar ao banco", 500);
            }
        }

        return self::$conexao;
    }
}