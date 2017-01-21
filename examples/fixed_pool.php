<?php
/**
 * @author Jenner <hypxm@qq.com>
 * @blog http://www.huyanping.cn
 * @license https://opensource.org/licenses/MIT MIT
 * @datetime: 2015/11/19 21:25
 */

require __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

class TestRunnable implements \Jenner\SimpleFork\Runnable
{

    /**
     * @return mixed
     */
    public function run()
    {
        sleep(2);
        echo getmypid() . ':done' . PHP_EOL;
    }
}

$pool = new \Jenner\SimpleFork\FixedPool(2);
$pool->execute(new \Jenner\SimpleFork\Process(new TestRunnable()));
$pool->execute(new \Jenner\SimpleFork\Process(new TestRunnable()));
$pool->execute(new \Jenner\SimpleFork\Process(new TestRunnable()));

$pool->wait(true);