<?php
/**
 * Config.class.php
 * SDK配置
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

use ucSDK\Logger;

class Config
{

    /**
     * 附加配置信息
     * + apiSigExpire int api有效期, 默认值
     * + apiSecret string api秘钥
     * + apiUrl string 接口地址
     * + enumber string 企业账户(域名)
     * + pluginIdentifier string 应用唯一标识
     * + thirdIdentifier string 第三方唯一标识
     * + fileConvertApiUrl string 文件转换接口地址
     * + logPath string 日志目录
     * + logSize int 日志文件大小
     * + debug int 是否启用 debug 模式，1=启用；0=关闭
     *
     * @var array
     */
    private $config = array(
        'apiSigExpire' => 0,
        'apiSecret' => '',
        'apiUrl' => 'http://localhost',
        'appid' => '',
        'enumber' => '',
        'pluginIdentifier' => '',
        'thirdIdentifier' => 'qy',
        'fileConvertApiUrl' => '',
        'logPath' => '',
        'logSize' => 10485760,
        'debug' => 0
    );

    /**
     * 单例实例化
     *
     * @return null|Config
     */
    public static function &instance()
    {
        static $instance = null;
        if (empty($instance)) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * 构造方法
     */
    public function __construct()
    {
        /*
         * $logDir = dirname(__FILE__) . '/Logs/';
         * if (!is_dir($logDir)) {
         * mkdir($logDir, 0777, true);
         * }
         * // 指定错误日志目录
         * $this->config['logPath'] = $logDir;
         */
    }

    /**
     * 修改配置
     *
     * @param array $config
     *            配置数组
     * @return boolean
     */
    public function setConfig($config = array())
    {

        // 遍历配置数组, 逐个修改
        foreach ($config as $name => $value) {
            // 只更新已存在的配置
            if (array_key_exists($name, $this->config)) {
                $this->config[$name] = $value;
            }
        }
        return true;
    }

    /**
     * GET方法, 获取指定配置
     *
     * @param string $name
     *            配置名称
     *
     * @return multitype:|NULL
     */
    public function __get($name)
    {

        // 如果有该配置项, 则返回
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }

        Logger::warn([
            "message" => 'config "' . $name . '" not exists',
            "config" => $this->config
        ]);

        return null;
    }

    /**
     * SET方法, 设置配置值
     *
     * @param string $name
     *            键值
     * @param mixed $value
     *            值
     *
     * @return boolean
     */
    public function __set($name, $value)
    {

        // 如果有该配置项, 则修改
        if (isset($this->config[$name])) {
            $this->config[$name] = $value;
        }

        return true;
    }
}
