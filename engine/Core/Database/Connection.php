<?php

namespace Engine\Core\Database;

use \PDO;

class Connection
{
   private $link;

    /**
     * Connection __construct()
     */

    // Вызываем функцию connect()
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */

    // Подключаемся к PDO и передаем в link
    private function connect()
    {
        //$config = require_once 'database.php';

        // Заглушка, нужно переписать
        $config = [
            'host'      => '127.0.0.1', // При localhost выдаст ошибку Uncaught PDOException: SQLSTATE[HY000] [2002] No such file or directory используем пока что 127.0.0.1 ;)
            'db_name'   => 'edgard',
            'username'  => 'root',
            'password'  => '10184902125410',
            'charset'   => 'utf8'

        ];

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */

    // Выполняем запросы
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $sth->exexute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) {
            return [];
        }

        return $result;
    }
}