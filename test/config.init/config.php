<?php
/**
 * config.php
 * ucSDK 加载配置
 * @author Deepseath
 * @version $Id$
 */
$config = [];

// 企业标识符
$config['enumber'] = '';

// 接口密钥
$config['apiSecret'] = '';

// 是否启用调试模式：1=启用；0=不启用
$config['debug'] = 1;

/**
 * 以下配置一般不需要调整
 */

// SDK 请求日志目录，请确保目录可写
$config['logPath'] = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Logs' . DIRECTORY_SEPARATOR;
// API URI（一般不需要调整）
$config['apiUrl'] = 'http://uc-open.vchangyi.com/v1/';
// API 签名有效期（一般不需要调整）
$config['apiSigExpire'] = 600;
// API 应用标识符
$config['pluginIdentifier'] = 'contact';

return $config;
