<?php

namespace Engine\DI;

class DI{
    private  $container = [];

    // Добавление зависимости

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    // Получение зависимости

    /**
     * @param $key
     * @return bool
     */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return bool
     */

    // Проверяем есть ли ключ
    public function has($key)
    {
        return isset($this->container[$key]);
    }
}