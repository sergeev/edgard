<?php

namespace Engine\Helper;

class Common
{
    // Проверям - это POST?
    /**
     * @return bool
     */
    function isPost()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool|string
     */
    function getPathUrl()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        // Передаем строку и проверяем знак ?, если найден то брезаем строку с 0 символа
        if($position = strpos($pathUrl, '?'))
        {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }
}