<?php
/**
 * run.php
 * uc sdk 运行使用调试/演示
 * @author Deepseath
 * @version $Id$
 */
namespace ucSDK;

$configFile = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
if (!is_file($configFile)) {
    exit('File "/test/config/config.php" not exists!');
}

$config = require ($configFile);
unset($configFile);

$params = [];
if (PHP_SAPI === 'cli') {
    $params['className'] = isset($argv[1]) ? (string) $argv[1] : '';
    $params['functionName'] = isset($argv[2]) ? (string) $argv[2] : '';
    $params['params'] = isset($argv[3]) ? (string) $argv[3] : '';
} else {
    $params['className'] = isset($_POST['className']) ? (string) $_POST['className'] : '';
    $params['functionName'] = isset($_POST['functionName']) ? (string) $_POST['functionName'] : '';
    $params['params'] = isset($_POST['params']) ? (string) $_POST['params'] : '';
}

if (empty($params['className'])) {
    exit('param "className" is empty');
}
if (empty($params['functionName'])) {
    exit('param "functionName" is empty');
}

$classFile = libLoad($params['className']);
if (!is_file($classFile)) {
    exit('param "className" is error');
}

require (libLoad('Base'));
require (libLoad('Config'));
require (libLoad('Service'));
require (libLoad('Logger'));
require (libLoad('Error'));
require (libLoad('Exception'));
require (libLoad('Common'));
require (libLoad('Snoopy', 'Net'));
require (libLoad('Apisig'));
require ($classFile);

if (!empty($params['params'])) {
    $params['params'] = json_decode($params['params'], true);
    if (is_null($params['params'])) {
        $params['params'] = [];
    }
} else {
    $params['params'] = [];
}

$functionParams = array_values($params['params']);

try {

    echo 'request Class: ' . htmlspecialchars($params['className']) . "\r\n";
    echo 'request Function: ' . htmlspecialchars($params['functionName']) . "\r\n";
    echo 'request Params: ' . json_encode($params['params'], JSON_UNESCAPED_UNICODE);

    $service = &Service::instance();
    $service->initSdk($config);

    $className = "\\ucSDK\\" . ucwords($params['className']);
    $c = new $className($service);
    if (!empty($params['params'])) {
        $result = call_user_func_array([
            $c,
            $params['functionName']
        ], $params['params']);
    } else {
        $result = call_user_func([
            $c,
            $params['functionName']
        ]);
    }


    echo 'request result: ' . json_encode($result);
} catch (\ucSDK\Exception $e) {
    exit(json_encode([
        "errcode" => $e->getCode(),
        "errmsg" => $e->getMessage(),
        "requestId" => $e->getRequestID(),
        "data" => [
            "file" => $e->getFile(),
            "line" => $e->getLine(),
            "sdkCode" => $e->getSdkCode()
        ]
    ], JSON_UNESCAPED_UNICODE));
}

/**
 * 载入指定库文件
 *
 * @param string $labName
 * @param string $dirname
 */
function libLoad($labName, $dirname = '')
{
    if ($dirname !== '') {
        $dirname = $dirname . DIRECTORY_SEPARATOR;
    }
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $dirname . ucwords($labName) . '.class.php';
}
