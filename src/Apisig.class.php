<?php
/**
 * ApiSig.class.php
 * 全局 Api 签名验证算法
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Apisig
{

    /**
     * 秘钥
     *
     * @var $secret
     */
    protected $secret = '';

    /**
     * 签名有效时间(单位: 秒)
     *
     * @var $expire
     */
    protected $expire = 600;

    /**
     * 实例化
     *
     * @param string $secret
     *            秘钥
     * @param int $expire
     *            有效时间
     *
     * @return ApiSig
     */
    public static function &instance($secret = '', $expire = 600)
    {
        static $instance;
        // 有效时间
        $expire = empty($expire) ? Config::instance()->apiSigExpire : $expire;
        // 秘钥
        $secret = empty($secret) ? Config::instance()->apiSecret : $secret;
        // 根据秘钥初始化
        $md5 = md5($secret);
        if (empty($instance[$md5])) {
            $instance[$md5] = new self($secret, $expire);
        }

        return $instance[$md5];
    }

    public function __construct($secret, $expire)
    {
        $this->secret = $secret;
        $this->expire = $expire;
    }

    /**
     * 生成签名
     *
     * @param mixed $obj
     *            签名数据
     * @param array $params
     *            参数
     *
     * @return string
     */
    public function getSig($obj, $params = array())
    {

        // 签名步骤一：按字典序排序参数
        if (!isset($obj['timestamp'])) {
            $obj['timestamp'] = !empty($params['timestamp']) ? $params['timestamp'] : round(microtime(true), 3) * 1000;
        }
        if (!isset($obj['key'])) {
            $obj['key'] = !empty($params['key']) ? $params['key'] : Config::instance()->enumber;
        }
        if (isset($obj['sign'])) {
            unset($obj['sign']);
        }
        $stringA = http_build_query($this->formatBizQueryParaMap($obj));

        Logger::debug("stringA: {$stringA}");

        // 签名步骤二：在string后加入KEY
        $stringSignTemp = $stringA . '&secret=' . $this->secret;

        Logger::debug("stringSignTemp: {$stringSignTemp}");

        // 签名步骤三: 加密字符串,并大写
        $sign = strtoupper(md5($stringSignTemp));

        Logger::debug("sign: {$sign}");

        return $sign;
    }

    /**
     * 格式化参数
     *
     * @param
     *            $paraMap
     * @param
     *            $urlencode
     *
     * @return string
     */
    protected function formatBizQueryParaMap($paraMap)
    {
        ksort($paraMap);
        // 参数数组
        $arr = [];
        foreach ($paraMap as $_key => $_value) {
            if ($_value === '' || $_value === null) {
                continue;
            }
            if (is_array($_key)) {
                $arr[$_key] = $this->formatBizQueryParaMap($_value);
            } else {
                $arr[$_key] = $_value;
            }
        }

        return $arr;
    }

    /**
     * 获取签名等参数并验证
     *
     * @param array $data
     *            要签名的数组
     * @param string $method
     *            获取数据的方式 GET | POST
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function getParamAndCheck($data, $method = 'POST')
    {
        if (empty($data)) {
            // 获取数据
            $data = $method == 'POST' ? $_POST : $_GET;
        }

        // 验证签名
        if ($this->check($data)) {
            return $data;
        }

        return false;
    }

    /**
     * 检查默认 sig
     *
     * @param
     *            $param
     *
     * @return bool
     * @throws \ucSDK\Exception
     */
    public function check($param)
    {

        // 检查时间
        if (($param['timestamp'] / 1000) + $this->expire < time()) {
            throw new Exception(Error::APISIG_REQUEST_EXPIRED);
            return false;
        }

        // 如果签名不相等
        if ($param['sign'] != $this->getSig($param)) {
            throw new Exception(Error::APISIG_ERROR);
            return false;
        }

        return true;
    }
}
