<?php
/**
 * ImageVerify.class.php
 * 积分操作类
 * This is NOT a freeware, use is subject to vchangyi.com.
 * @author vchangyi.com
 * @version $Id$
 */
namespace ucSDK;

class Integral
{

    /**
     * 积分获得类型:自动获取
     */
    const AUTO_GET_INTEGRAL = 1;

    /**
     * 积分获得类型:手动增加
     */
    const MANUAL_GET_INTEGRAL = 2;

    /**
     * 积分获得类型:手动扣减
     */
    const MANUAL_DEDUCT_INTEGRAL = 3;

    /**
     * 积分获得类型:兑换消耗
     */
    const MANUAL_EXCHAGE_INTEGRAL = 4;

    /**
     * 积分获得类型:兑换退回
     */
    const MANUAL_EXCHAGE_BACK_INTEGRAL = 5;

    /**
     * 是否是管理员拒绝兑换: 是
     */
    const IS_ADMIN_TRUE = 1;

    /**
     * 是否是管理员拒绝兑换: 否
     */
    const IS_ADMIN_FALSE = 2;

    /**
     * 启用状态: 1.
     * 启用 2. 禁用
     */
    const EIL_ENABLE_STATUS_OPEN = 1;

    const EIL_ENABLE_STATUS_OFF = 2;

    /**
     * 积分排名类型，1=总排行，2=日排行，3=周排行 ，4=月排行
     */
    const INTEGRAL_RANKING_TYPE_TOTAL = 1;

    const INTEGRAL_RANKING_TYPE_DAILY = 2;

    const INTEGRAL_RANKING_TYPE_WEEKLY = 3;

    const INTEGRAL_RANKING_TYPE_MONTHLY = 4;

    /**
     * 积分获得类型对应数据
     *
     * @var array
     */
    protected $integralTypeWithNumber = [
        'AUTO_GET_INTEGRAL' => 1,
        'MANUAL_GET_INTEGRAL' => 2,
        'MANUAL_DEDUCT_INTEGRAL' => 3,
        'MANUAL_EXCHAGE_INTEGRAL' => 4,
        'MANUAL_EXCHAGE_BACK_INTEGRAL' => 5
    ];

    /**
     * 积分获得类型对应名称
     *
     * @var array
     */
    protected $integralTypeWithChinese = [
        'AUTO_GET_INTEGRAL' => '自主获得',
        'MANUAL_GET_INTEGRAL' => '手动增加',
        'MANUAL_DEDUCT_INTEGRAL' => '手动扣减',
        'MANUAL_EXCHAGE_INTEGRAL' => '兑换消耗',
        'MANUAL_EXCHAGE_BACK_INTEGRAL' => '兑换退回'
    ];

    /**
     * 接口调用类
     *
     * @var object
     */
    private $serv = null;

    /**
     * 获取数据
     *
     * @param
     *            $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * 积分统计历史数据列表
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const HISTORY_TOTAL = '%s/integral/total-list';

    /**
     * 用户积分详情
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_DETAIL = '%s/integral/detail';

    /**
     * 用户积分操作明细接口
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_DETAILLIST = '%s/integral/detailList';

    /**
     * 获取企业积分策略配置
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const GET_STRATEGY_SETTING = '%s/integral/get-strategy-setting';

    /**
     * 用户积分查询
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_MEMBER_LIST = '%s/integral/member-list';

    /**
     * 用户积分基础信息查询
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_MEMBER_LIST_BASIC = '%s/integral/member-list-basic';

    /**
     * 获取指定用户的积分排名
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_RANKING = '%s/integral/getRanking';

    /**
     * 获取用户的所有积分排名
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_ALL_RANKING = '%s/integral/getAllRanking';

    /**
     * 获取不同范围的用户的积分排名
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_DIFFRANGE_RANKING = '%s/integral/getDiffRangeRanking';

    /**
     * 企业积分公共配置信息接口
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const GET_INTEGRAL_COMMON_SETTING = '%s/integral/common/get-setting';

    /**
     * 获取企业积分默认等级
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const LEVEL_GET_DEFAULT_LEVEL = '%s/integral/level/get-default-level';

    /**
     * 获取升级类型依据数据
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const LEVEL_GET_UPGRADE_TYPE = '%s/integral/level/get-upgrade-type';

    /**
     * 获取企业开启的计算积分等级状态
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const LEVEL_GET_CALC_TYPE = '%s/integral/level/get_calc_type';

    /**
     * 获取企业计算等级规则明细
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const LEVEL_LIST = '%s/integral/level/list';

    /**
     * 积分计算等级详情
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const LEVEL_DETAIL = '%s/integral/level/detail';

    /**
     * 企业默认积分策略 查询
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const DEFAULT_LIST = '%s/integral/default/list';

    /**
     * 企业默认积分策略 详情
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const DEFAULT_DETAIL = '%s/integral/default/detail';

    /**
     * 业务积分策略 查询
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_LIST_BUSINESS_STRATEGY = '%s/integral/list-business-strategy';

    /**
     * 业务积分策略 详情
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_GET_BUSINESS_STRATEGY = '%s/integral/get-business-strategy';

    /**
     * 积分策略支持的应用信息查询
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const INTEGRAL_DEFAULT_ALL_BUSINESS = '%s/integral/default/all-business';

    /**
     * 初始化
     *
     * @param object $serv
     *            接口调用类
     */
    public function __construct($serv)
    {
        $this->serv = $serv;
    }

    /**
     * 积分来源统计
     * %s = {apiUrl}/{enumber}/{app}
     *
     * @var string
     */
    const SOURCE_TOTAL = '%s/integral/source-total-list';

    /**
     * 用户积分查询
     *
     * @param array $condition
     *            条件
     *            + userName String 员工姓名
     *            + depId String 部门id
     *            + pageNum Int 当前页，空时默认为1
     *            + pageSize Int 页大小,空时默认为5,最大1000
     */
    public function integralList($condition)
    {
        return $this->serv->postSDK(self::INTEGRAL_LIST, $condition, 'generateApiUrlA');
    }

    /**
     * 用户积分查询
     *
     * @param array $condition
     *            条件
     *            + beginMitdTime String 统计开始时间戳（单位：毫秒）
     *            + endMitdTime String 统计结束时间戳（单位：毫秒）
     *            + pageNum Int 当前页，空时默认为1
     *            + pageSize Int 页大小,空时默认为20
     */
    public function historyTotal($condition)
    {
        return $this->serv->postSDK(self::HISTORY_TOTAL, $condition, 'generateApiUrlA');
    }

    /**
     * 用户积分查询
     *
     * @param array $condition
     *            条件
     *            + uid String 用户ID
     */
    public function detail($condition)
    {
        return $this->serv->postSDK(self::INTEGRAL_DETAIL, $condition, 'generateApiUrlA');
    }

    /**
     * 用户积分查询
     *
     * @param array $condition
     *            条件
     *            + uid String 用户ID
     *            + uName String 用户名
     *            + startTime Int 查询开始时间（毫秒）
     *            + endTime Int 查询结束时间（毫秒）
     *            + integralTypeId Int 积分获得类型(1: 自动获得, 2: 手动增加, 3: 手动扣减)
     *            + realName String 员工姓名
     *            + dpId String 部门主键
     *            + pageNum Int 当前页，空时默认为1
     *            + pageSize Int 页大小,空时默认为5,最大1000
     */
    public function detailList($condition)
    {
        return $this->serv->postSDK(self::INTEGRAL_DETAILLIST, $condition, 'generateApiUrlA');
    }

    /**
     * 获取企业积分策略配置
     *
     * @return mixed
     */
    public function getStrategySetting()
    {
        return $this->serv->postSDK(self::GET_STRATEGY_SETTING, [], 'generateApiUrlA');
    }

    /**
     * 用户积分查询
     *
     * @param $params +
     *            memUsername String 员工姓名
     *            + dpId String 部门id
     *            + memUids array 用户UID数组
     *            + miType String 积分类别，固定格式：mi_type[0-9]
     *            + pageNum Int 当前页，空时默认为1
     *            + pageSize Int 页大小,空时默认为20,最大1000
     * @return mixed
     */
    public function integralMemberList($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_MEMBER_LIST, $params, 'generateApiUrlA');
    }

    /**
     * 用户积分基本信息查询
     *
     * @param $params +
     *            memUsername String 员工姓名
     *            + dpId String 部门id
     *            + memUids array 用户UID数组
     *            + miType String 积分类别，固定格式：mi_type[0-9]
     *            + pageNum Int 当前页，空时默认为1
     *            + pageSize Int 页大小,空时默认为20,最大1000
     * @return mixed
     */
    public function integralMemberListBasic($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_MEMBER_LIST_BASIC, $params, 'generateApiUrlA');
    }

    /**
     * 获取指定用户的积分排名.
     *
     * @param
     *            $params
     * @return mixed
     */
    public function getRanking($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_RANKING, $params, 'generateApiUrlA');
    }

    /**
     * 获取所有用户的积分排名.
     *
     * @param
     *            $params
     * @return mixed
     */
    public function getAllRanking($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_ALL_RANKING, $params, 'generateApiUrlA');
    }

    /**
     * 获取不同范围的用户的积分排名.
     *
     * @param $params memUid
     *            人员ID
     *            dpIds 部门id数组
     *            jobId 岗位id
     *            roleId 角色id
     *            rankType 积分排名类型，1=总排行，2=日排行，3=周排行 ，4=月排行
     *            pageNum 当前页，空时默认为1
     *            pageSize 页大小,空时默认为20,最大1000
     * @return mixed
     */
    public function getDiffRangeRanking($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_DIFFRANGE_RANKING, $params, 'generateApiUrlA');
    }

    /**
     * 获取企业积分公共配置信息
     *
     * @return mixed
     */
    public function getEpIntegralCommonSetting()
    {
        return $this->serv->postSDK(self::GET_INTEGRAL_COMMON_SETTING, [], 'generateApiUrlA');
    }

    /**
     * 获取企业积分默认等级
     *
     * @return mixed
     */
    public function getDefaultLevel()
    {
        return $this->serv->postSDK(self::LEVEL_GET_DEFAULT_LEVEL, [], 'generateApiUrlA');
    }

    /**
     * 获取企业积分等级升级类型
     *
     * @return mixed
     */
    public function getUpgradeType()
    {
        return $this->serv->postSDK(self::LEVEL_GET_UPGRADE_TYPE, [], 'generateApiUrlA');
    }

    /**
     * 获取企业开启的计算积分等级状态
     *
     * @return mixed
     */
    public function getCalcType()
    {
        return $this->serv->postSDK(self::LEVEL_GET_CALC_TYPE, [], 'generateApiUrlA');
    }

    /**
     * 获取企业计算等级规则明细
     *
     * @param $params +
     *            eilType string 积分等级计算类型, 1:岗位,2:角色
     *            + pageNum int 当前页,空时默认为1
     *            + pageSize int 页大小,空时默认为20
     * @return mixed
     */
    public function levelList($params)
    {
        return $this->serv->postSDK(self::LEVEL_LIST, $params, 'generateApiUrlA');
    }

    /**
     * 积分计算等级详情
     *
     * @param $params +
     *            eilId string 主键id
     * @return mixed
     */
    public function levelDetail($params)
    {
        return $this->serv->postSDK(self::LEVEL_DETAIL, $params, 'generateApiUrlA');
    }

    /**
     * 企业默认积分策略查询
     *
     * @return mixed
     */
    public function defaultList()
    {
        return $this->serv->postSDK(self::DEFAULT_LIST, [], 'generateApiUrlA');
    }

    /**
     * 企业默认积分策略详情
     *
     * @return mixed
     */
    public function defaultDetail($params)
    {
        return $this->serv->postSDK(self::DEFAULT_DETAIL, $params, 'generateApiUrlA');
    }

    /**
     * 业务积分策略 查询
     *
     * @return mixed
     */
    public function listBusinessStrategy($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_LIST_BUSINESS_STRATEGY, $params, 'generateApiUrlA');
    }

    /**
     * 业务积分策略 详情
     *
     * @return mixed
     */
    public function getBusinessStrategy($params)
    {
        return $this->serv->postSDK(self::INTEGRAL_GET_BUSINESS_STRATEGY, $params, 'generateApiUrlA');
    }

    /**
     * 积分策略支持的应用信息查询
     *
     * @return mixed
     */
    public function defaultAllBusiness()
    {
        return $this->serv->postSDK(self::INTEGRAL_DEFAULT_ALL_BUSINESS, [], 'generateApiUrlA');
    }

    /**
     * 积分来源统计查询
     *
     * @param array $condition
     *            条件
     *            + businessKey String 统计指定业务key
     *            + beginTotalTime String 统计开始时间戳（单位：毫秒）
     *            + endTotalTime String 统计结束时间戳（单位：毫秒）
     */
    public function sourceTotal($condition)
    {
        return $this->serv->postSDK(self::SOURCE_TOTAL, $condition, 'generateApiUrlA');
    }
}
