<?php
/**
 * Member.class.php
 * 用户接口操作类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Memberattr
{

    /**
     * 属性类型，默认属性
     */
    const ATTR_TYPE_DEFAULT = 1;

    /**
     * 属性类型，扩展属性
     */
    const ATTR_TYPE_EXT = 2;

    /**
     * 获取扩展属性列表
     *
     * @return array
     */
    public function getExtList()
    {
        $user_attrs = Constant::userAttrs();
        $ext_attrs = [];
        
        foreach ($user_attrs as $k => $v) {
            if ($v['attr_type'] == self::ATTR_TYPE_EXT) {
                $ext_attrs[$k] = $v;
            }
        }
        
        return $ext_attrs;
    }

    /**
     * 格式化扩展属性数据
     *
     * @param string $uid
     *            用户UID
     * @param array $data
     *            扩展属性数据
     * @return array
     */
    public function formatExtData($uid, $data)
    {
        if ($uid) {
            $extData = [];
            
            foreach ($data as $k => $v) {
                $extData[] = [
                    'memUid' => $uid,
                    'extKey' => $k,
                    'extValue' => $v
                ];
            }
            
            return $extData;
        }
        
        return [];
    }
}
