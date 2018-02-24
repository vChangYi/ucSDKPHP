<?php
/**
 * Member.class.php
 * 用户接口操作类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Member
{

    /**
     * 接口调用类
     *
     * @var object
     */
    private $serv = null;

    /**
     * SERVICE 类
     *
     * @var null
     */
    private $service = null;

    /**
     * 获取用户列表的接口地址(包含删除的用户)
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const ALL_LIST_URL = '%s/member/list';

    /**
     * 获取指定用户信息
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const GET_URL = '%s/member/get';

    /**
     * 获取用户和部门对照信息列表
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_DEPARTMENT_LIST_URL = '%s/member/get-member-conn-depart';

    /**
     * 获取用户和职位对照信息列表
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_JOB_LIST_URL = '%s/member/get-member-conn-job';

    /**
     * 获取用户列表
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const SEARCH_URL = '%s/search/list';

    /**
     * 查询用户扩展属性
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_EXT_GET_URL = '%s/member-ext/get';

    /**
     * 查询用户所有扩展属性
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_EXT_LIST_URL = '%s/member-ext/list';

    /**
     * 人员、已关注、未关注、禁用人员总数
     */
    const MEMBER_RELEVANT_TOTAL = '%s/statistics/user';

    /**
     * 在职情况统计
     */
    const MEMBER_ACTIVE_TOTAL = '%s/statistics/job';

    /**
     * 判断指定用户信息是否已存在
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const CHECK_INFO_EXIST_URL = '%s/member/check-info-exist';

    /**
     * 读取用户基本信息列表
     *
     * @var string
     */
    const MEMBER_IGNORE_PERMISSIONS_BASIC_LIST = '%s/member/basic-list';

    /**
     * 根据 OpenId 或者 UserId 查询用户详情
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_GET_BY_USERID = '%s/member/get-by-userid';

    /**
     * 企业用户关注状态统计接口（忽略权限过滤）
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_IGNORE_PERMISSIONS_STATUS_COUNT = '%s/member/status-count';

    /**
     * 获取没有部门的人员 (跳过鉴权)
     * %s = {apiUrl}/a/{enumber}/{pluginIdentifier}/{thirdIdentifier}
     *
     * @var string
     */
    const MEMBER_IGNORE_PERMISSIONS_GET_NO_DEPARTMENT_MEMBER = '%s/member/get-no-department-member';

    /**
     * 获取某时间段内人员数量
     */
    const MEMBER_COUNT_BY_DAY = '%s/subscribe/count-by-day';

    /**
     * 初始化
     *
     * @param Service $serv
     *            接口调用类
     */
    public function __construct($serv)
    {
        $this->serv = $serv;
        $this->service = new Service();
    }

    /**
     * 获取用户基本信息列表
     *
     * @param array $condition
     *            查询条件数据
     * @param mixed $orders
     *            排序字段
     * @param int $page
     *            当前页码
     * @param int $perpage
     *            每页记录数
     *
     * @return boolean|multitype:
     */
    public function listAllBasic($condition = array(), $page = 1, $perpage = 30, $orders = array())
    {

        // 查询参数
        $keyList = [];
        foreach ([
            'userids',
            'memUids'
        ] as $_key) {
            $this->service->setAndIsArr($condition, $_key, $keyList);
        }
        $this->service->getValue($condition, $keyList);
        $condition = $this->serv->mergeListApiParams($condition, $orders, $page, $perpage);
        $result = $this->serv->postSDK(self::MEMBER_IGNORE_PERMISSIONS_BASIC_LIST, $condition, 'generateApiUrlA');

        return $result;
    }

    /**
     * 获取用户列表
     *
     * @param array $condition
     *            查询条件数据
     * @param mixed $orders
     *            排序字段
     * @param int $page
     *            当前页码
     * @param int $perpage
     *            每页记录数
     *
     * @return array|bool
     */
    public function listUsersAll($condition = [], $page = 1, $perpage = 30, $orders = [])
    {

        // 查询参数
        $keyList = [];
        foreach ([
            'userids',
            'memUids'
        ] as $_key) {
            $this->service->setAndIsArr($condition, $_key, $keyList);
        }
        $this->service->getValue($condition, $keyList);
        $condition = $this->serv->mergeListApiParams($condition, $orders, $page, $perpage);
        $result = $this->serv->postSDK(self::ALL_LIST_URL, $condition, 'generateApiUrlA');

        if ($result['list'] && $result['memberExtList']) {
            $list = Common::array_combine_by_key($result['list'], 'memUid');

            // 把扩展属性合并到list
            foreach ($result['memberExtList'] as $v) {
                $memUid = $v['memUid'];
                $extKey = $v['extKey'];
                $extValue = $v['extValue'];
                $list[$memUid][$extKey] = $extValue;
            }

            unset($result['memberExtList']);
            $result['list'] = array_values($list);
        }

        return $result;
    }

    /**
     * 获取指定用户信息
     *
     * @param array $condition
     *            请求参数
     *            + memUid string 用户UID
     *
     * @return boolean|multitype:
     */
    public function fetch($condition)
    {
        $result = $this->serv->postSDK(self::GET_URL, $condition, 'generateApiUrlA');

        if ($result['memberExtList']) {
            // 把扩展属性合并到用户数据
            foreach ($result['memberExtList'] as $v) {
                $result[$v['extKey']] = $v['extValue'];
            }

            unset($result['memberExtList']);
        }

        $attr_keys = array_keys(Constant::userAttrs());
        $user_keys = array_keys($result);
        $diffs = array_diff($attr_keys, $user_keys);

        // 补全属性
        foreach ($diffs as $k) {
            $result[$k] = '';
        }

        return $result;
    }

    /**
     * 查询用户对应职位的列表
     *
     * @param array $condition
     *            查询条件
     *
     * @return bool|mixed
     * @throws \ucSDK\Exception
     */
    public function listJob($condition)
    {
        return $this->serv->postSDK(self::MEMBER_JOB_LIST_URL, $condition, 'generateApiUrlA');
    }

    /**
     * 用户列表
     *
     * @param $condition +
     *            array memUids memUid数组
     *            + int pageNum 页码
     *            + int pageSize 每页记录数
     *            + string|array name 搜索条件
     *
     * @return array|bool
     */
    public function searchList($condition)
    {
        $this->service->getValue($condition, [
            'memUids'
        ]);

        return $this->serv->postSDK(self::SEARCH_URL, $condition, 'generateApiUrlA');
    }

    /**
     * 查询用户扩展属性
     *
     * @param $param +
     *            string extId 扩展属性ID
     *
     * @return array|bool
     */
    public function getExt($param)
    {
        return $this->serv->postSDK(self::MEMBER_EXT_GET_URL, $param, 'generateApiUrlA');
    }

    /**
     * 查询用户所有扩展属性
     *
     * @param $param +
     *            string memUid 用户UID
     *
     * @return array|bool
     */
    public function listExt($param)
    {
        return $this->serv->postSDK(self::MEMBER_EXT_LIST_URL, $param, 'generateApiUrlA');
    }

    /**
     * 人员、已关注、未关注、禁用人员总数
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function memberRelevantTotal()
    {
        return $this->serv->postSDK(self::MEMBER_RELEVANT_TOTAL, [], 'generateApiUrlE');
    }

    /**
     * 在职情况统计
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function memberActiveTotal()
    {
        return $this->serv->postSDK(self::MEMBER_ACTIVE_TOTAL, [], 'generateApiUrlE');
    }

    /**
     * 判断指定用户信息是否已存在 (手机号, 邮箱, 微信号)
     *
     * @param
     *            $condition
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function checkMemInfoSingle($condition)
    {
        return $this->serv->postSDK(self::CHECK_INFO_EXIST_URL, $condition, 'generateApiUrlA');
    }

    /**
     * 根据 UserId 查询用户详情
     *
     * @param
     *            $condition
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function memberGetByUserId($condition)
    {
        return $this->serv->postSDK(self::MEMBER_GET_BY_USERID, $condition, 'generateApiUrlA');
    }

    /**
     * 企业用户关注状态统计接口（忽略权限过滤）
     *
     * @param
     *            $condition
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function memberStatusCount($condition)
    {
        return $this->serv->postSDK(self::MEMBER_IGNORE_PERMISSIONS_STATUS_COUNT, $condition, 'generateApiUrlA');
    }

    /**
     * 获取没有部门的人员 (跳过鉴权)
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function getNoPepartmentMember()
    {
        return $this->serv->postSDK(self::MEMBER_IGNORE_PERMISSIONS_GET_NO_DEPARTMENT_MEMBER, [], 'generateApiUrlA');
    }

    /**
     * 获取某时间段内人员数量
     *
     * @param
     *            $condition
     *
     * @return array|bool
     * @throws \ucSDK\Exception
     */
    public function memberCountByDay($condition)
    {
        return $this->serv->postSDK(self::MEMBER_COUNT_BY_DAY, $condition, 'generateApiUrlA');
    }
}
