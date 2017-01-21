<?php
/**
 * @author Jenner <hypxm@qq.com>
 * @blog http://www.huyanping.cn
 * @license https://opensource.org/licenses/MIT MIT
 * @datetime: 2015/11/25 10:55
 */

spl_autoload_register(function ($class) {
    if (strpos($class, 'Jenner\\SimpleFork\\') === 0) {
        $class = str_replace('Jenner\\SimpleFork\\', '', $class);
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file  = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }
});