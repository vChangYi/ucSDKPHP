<?php
/**
 * Service.class.php
 * 接口操作类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Service extends Base
{

    /**
     * 企业配置
     *
     * @var array
     */
    protected $_enterpriseConfig;

    /**
     * 单例实例化
     *
     * @return null|Service
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
     * Service constructor.
     */
    public function __construct()
    {

        // do nothing.
    }

    /**
     * 记录数据流
     */
    public function streamJsonData()
    {

        // 接收数据流
        $streamData = file_get_contents("php://input");
        Logger::info([
            "message" => '接收到 json 数据',
            "data" => $streamData
        ]);

        // 将Json转为array
        return json_decode($streamData, true);
    }

    /**
     * 初始化SDK相关信息
     *
     * @param
     *            $setting
     * @return bool
     */
    public function initSdk($setting)
    {
        if (!isset($setting['apiSecret'])) {
            throw new Exception('config "apiSecret" is null');
        }
        if (!isset($setting['apiUrl'])) {
            throw new Exception('config "apiUrl" is null');
        }
        if (!isset($setting['enumber'])) {
            throw new Exception('config "enumber" is null');
        }
        if (!isset($setting['pluginIdentifier'])) {
            throw new Exception('config "pluginIdentifier" is null');
        }
        if (!isset($setting['logPath'])) {
            throw new Exception('config "logPath" is null');
        }

        $config = array(
            'apiUrl' => $setting['apiUrl'],
            'enumber' => $setting['enumber'],
            'pluginIdentifier' => $setting['pluginIdentifier'],
            'logPath' => $setting['logPath'],
            'apiSecret' => $setting['apiSecret']
        );

        if (isset($setting['appid'])) {
            $config['appid'] = $setting['appid'];
        }
        if (isset($setting['fileConvertApiUrl'])) {
            $config['fileConvertApiUrl'] = $setting['fileConvertApiUrl'];
        }
        if (isset($setting['thirdIdentifier'])) {
            $config['thirdIdentifier'] = $setting['thirdIdentifier'];
        }
        if (isset($setting['apiSigExpire'])) {
            $config['apiSigExpire'] = $setting['apiSigExpire'];
        }
        if (isset($setting['debug'])) {
            $config['debug'] = $setting['debug'];
        }

        return $this->setConfig($config);
    }

    /**
     * 排除数组变为对象
     *
     * @param array $arrFrom
     * @param array $keyArr
     * @return bool
     */
    public function getValue(array &$arrFrom, array $keyArr)
    {
        if (empty($arrFrom) || empty($key)) {
            return false;
        }

        foreach ($arrFrom as $_key => &$value) {
            if (in_array($_key, $keyArr)) {
                $value = array_values($value);
            }
        }

        return true;
    }

    /**
     * 存在并且是数组
     *
     * @param array $arr
     *            判断的来源数组
     * @param string $setKey
     *            判断的键值
     * @param array $keyList
     *            存在并且是数组的键值数组
     *
     * @return bool
     */
    public function setAndIsArr($arr, $setKey, &$keyList)
    {
        if (isset($arr[$setKey]) && is_array($arr[$setKey])) {
            $keyList[] = $setKey;
        }

        return true;
    }
}
