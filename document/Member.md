# 用户信息

`Version: 1.0`

## 1、获取用户基本信息列表

`Action: listAllBasic`

**方法参数**

| 参数      | 必填 | 类型  | 说明                                          |
| --------- | ---- | ----- | --------------------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明）              |
| page      | 否   | int   | 当前页码（默认：1）                           |
| perpage   | 否   | int   | 每页记录数（默认：30）                        |
| orders    | 否   | array | 排序字段（如：['aaa'=>'desc', 'bbb'=>'asc']） |

*condition说明*

| 参数                   | 必填 | 类型               | 说明                                                         |
| ---------------------- | ---- | ------------------ | ------------------------------------------------------------ |
| memUids                | 否   | array              | memUid数组                                                   |
| excludeMemuids         | 否   | array              | memoir排除数组                                               |
| pageNum                | 否   | int                | 页码                                                         |
| pageSize               | 否   | int                | 每页记录数                                                   |
| userids                | 否   | 数组               | 微信第三方 userid                                            |
| dpId                   | 否   | String             | 部门ID                                                       |
| dpIdList               | 否   | Array              | 部门IDS                                                      |
| departmentChildrenFlag | 否   | number             | 按部门条件查询时，表示部门是否递归查询人员 【0：不递归（默认值）、1：递归】 |
| memMobile              | 否   | String             | 用户手机号                                                   |
| memEmail               | 否   | String             | 用户邮箱                                                     |
| memUsername            | 否   | String             | 用户名称                                                     |
| memIndex               | 否   | String             | 索引标识                                                     |
| index                  | 否   | String             | 首字母                                                       |
| memSubscribeStatus     | 否   | number             | 关注状态 （微信公众号关注状态 1=已关注，2=已禁用，4=未关注） |
| memActive              | 否   | number             | 在职状态 （1=在职，0=离职）                                  |
| jobIdList              | 否   | 数组[HTML_REMOVED] | 所在岗位／职位列表                                           |
| roleIdList             | 否   | 数组[HTML_REMOVED] | 所在角色列表                                                 |
| isSearchTag            | 否   | int                | 是否需要获查询用户的标签信息(1= 查询， 2=不查（默认为2）)    |

**返回参数**

| 参数               | 类型   | 说明                                                     |
| ------------------ | ------ | -------------------------------------------------------- |
| memUid             | String | 用户ID                                                   |
| epId               | String | 企业ID，                                                 |
| memWeixin          | String | 微信ID                                                   |
| memUserid          | String | 微信企业号userid                                         |
| memEmail           | String | 用户邮箱                                                 |
| memMobile          | String | 手机号                                                   |
| memUsername        | String | 姓名                                                     |
| memIdcard          | String | 身份证号                                                 |
| memGender          | number | 性别, 0: 未知, 1:男; 2:女                                |
| memSubscribeStatus | number | 关注状态 1=已关注，2=已禁用，4=未关注                    |
| memWxActiveStatus  | number | 企业微信激活状态（0-未知，1=已激活，2=已禁用，4=未激活） |
| count              | int    | 成员总数                                                 |
| alreadyConcerned   | int    | 成员已关注数                                             |
| notConcerned       | int    | 成员未关注数                                             |
| disable            | int    | 成员禁用数                                               |

## 2、获取用户列表

`Action: listUsersAll`

请求参数

| 参数      | 必填 | 类型  | 说明                                          |
| --------- | ---- | ----- | --------------------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明）              |
| page      | 否   | int   | 当前页码（默认：1）                           |
| perpage   | 否   | int   | 每页记录数（默认：30）                        |
| orders    | 否   | array | 排序字段（如：['aaa'=>'desc', 'bbb'=>'asc']） |

*condition说明*

| 参数                   | 必填 | 类型   | 说明                                                         |
| ---------------------- | ---- | ------ | ------------------------------------------------------------ |
| memUids                | 否   | array  | memUid数组                                                   |
| excludeMemuids         | 否   | array  | memoir排除数组                                               |
| pageNum                | 否   | int    | 页码                                                         |
| pageSize               | 否   | int    | 每页记录数                                                   |
| userids                | 否   | array  | 微信第三方 userid                                            |
| dpId                   | 否   | string | 部门ID                                                       |
| dpIdList               | 否   | array  | 部门IDS                                                      |
| departmentChildrenFlag | 否   | number | 按部门条件查询时，表示部门是否递归查询人员 【0：不递归（默认值）、1：递归】 |
| memMobile              | 否   | string | 用户手机号                                                   |
| memEmail               | 否   | string | 用户邮箱                                                     |
| memUsername            | 否   | string | 用户名称                                                     |
| memIndex               | 否   | string | 索引标识                                                     |
| index                  | 否   | string | 首字母                                                       |
| memSubscribeStatus     | 否   | number | 关注状态 （微信公众号关注状态 1=已关注，2=已禁用，4=未关注） |
| memActive              | 否   | number | 在职状态 （1=在职，0=离职）                                  |
| jobIdList              | 否   | array  | 所在岗位／职位列表                                           |
| roleIdList             | 否   | array  | 所在角色列表                                                 |
| isSearchTag            | 否   | int    | 是否需要获查询用户的标签信息(1= 查询， 2=不查（默认为2）)    |
| resultFields           | 否   | array  | 需要返回字段的数组                                           |

返回参数

| 参数               | 类型       | 说明                                                     |
| ------------------ | ---------- | -------------------------------------------------------- |
| memUid             | String     | 用户ID                                                   |
| epId               | String     | 企业ID                                                   |
| memWeixin          | String     | 微信ID                                                   |
| memUserid          | String     | 微信企业号userid                                         |
| memEmail           | String     | 用户邮箱                                                 |
| memMobile          | String     | 手机号                                                   |
| memUsername        | String     | 姓名                                                     |
| memIdcard          | String     | 身份证号                                                 |
| memGender          | number     | 性别（0:=未知, 1=男， 2=女）                             |
| memSubscribeStatus | number     | 关注状态（1=已关注，2=已禁用，4=未关注）                 |
| memWxActiveStatus  | number     | 企业微信激活状态（0-未知，1=已激活，2=已禁用，4=未激活） |
| memDeviceid        | String     | 微信手机设备号                                           |
| dpName             | 数组Object | 所在部门-参考部门结构                                    |
| tagList            | array      | 所在标签                                                 |
| count              | int        | 成员总数                                                 |
| alreadyConcerned   | int        | 成员已关注数                                             |
| notConcerned       | int        | 成员未关注数                                             |
| disable            | int        | 成员禁用数                                               |

## 3、获取指定用户信息

`Action: fetch`

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数   | 必填 | 类型       | 说明    |
| ------ | ---- | ---------- | ------- |
| memUid | 是   | String(32) | 用户UID |

**返回参数**

| 参数               | 类型           | 说明                                                 |
| ------------------ | -------------- | ---------------------------------------------------- |
| memUid             | String         | 用户ID                                               |
| epId               | String         | 企业ID，                                             |
| memWeixin          | String         | 微信ID                                               |
| memUserid          | String         | 微信企业号userid                                     |
| memEmail           | String         | 用户邮箱                                             |
| memTelephone       | String         | 座机                                                 |
| memMobile          | String         | 手机号                                               |
| memUsername        | String         | 姓名                                                 |
| memFace            | String         | 头像URL                                              |
| memGender          | number         | 性别, 0: 未知, 1:男; 2:女                            |
| memDeviceid        | String         | 微信手机设备号                                       |
| memSubscribeStatus | 否             | number                                               |
| memWxActiveStatus  | number         | 企业微信激活状态 0-未知,1=已激活, 2=已禁用, 4=未激活 |
| memActive          | 否             | number                                               |
| dpName             | String(数组)   | 部门名称列表                                         |
| jobName            | String(数组)   | 职位名称列表                                         |
| tagName            | String(数组）  | 标签名称列表                                         |
| memLeadList        | Object（数组） | 直属上级                                             |

## 4、查询用户对应职位的列表

`Action: listJob`

请求参数

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数   | 必填 | 类型       | 说明    |
| ------ | ---- | ---------- | ------- |
| memUid | 是   | String(32) | 用户UID |

返回参数

| 参数      | 类型   | 说明     |
| --------- | ------ | -------- |
| mjId      | String | ID       |
| memUid    | String | 用户ID   |
| dpId      | String | 部门ID   |
| jobId     | String | 职位ID   |
| mjCreated | string | 创建时间 |
| mjUpdated | string | 更新时间 |

## 5、用户部门标签搜索接口

`Action: searchList`

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数     | 必填 | 类型           | 说明       |
| -------- | ---- | -------------- | ---------- |
| memUids  | 否   | array          | memUid数组 |
| pageNum  | 否   | int            | 页码       |
| pageSize | 否   | int            | 每页记录数 |
| name     | 是   | string / array | 搜索条件   |

**返回参数**

| 参数 | 类型   | 说明                           |
| ---- | ------ | ------------------------------ |
| id   | String | ID(对应 dpId,memUid,tagId)     |
| name | String | 名称，                         |
| flag | String | 标识（1=用户，2=部门，3=标签） |

## 6、用户扩展属性-查询用户扩展字段

`Action: getExt`

**请求参数**

| 参数  | 必填 | 类型  | 说明                             |
| ----- | ---- | ----- | -------------------------------- |
| param | 否   | array | 查询条件数据（详见下方参数说明） |

*param说明*

| 参数  | 必填 | 类型   | 说明       |
| ----- | ---- | ------ | ---------- |
| extId | 是   | string | 扩展属性ID |

**返回参数**

| 参数     | 类型   | 说明          |
| -------- | ------ | ------------- |
| extId    | string | 扩展字段ID    |
| memUid   | string | 用户ID        |
| extKey   | string | 扩展字段KEY   |
| extValue | string | 扩展字段Value |

## 7、用户扩展属性-查询用户所有扩展字段

`Action: listExt`

**请求参数**

| 参数  | 必填 | 类型  | 说明                             |
| ----- | ---- | ----- | -------------------------------- |
| param | 是   | array | 查询条件数据（详见下方参数说明） |

*param说明*

| 参数   | 必填 | 类型   | 说明   |
| ------ | ---- | ------ | ------ |
| memUid | 是   | String | 用户ID |

**返回参数**

| 参数     | 类型   | 说明          |
| -------- | ------ | ------------- |
| extId    | string | 扩展字段ID    |
| memUid   | string | 用户ID        |
| extKey   | string | 扩展字段KEY   |
| extValue | string | 扩展字段Value |

## 8、人员、已关注、未关注、禁用人员总数

`Action: memberRelevantTotal`

**请求参数**

无

**返回参数**

| 参数 | 类型 | 说明 |
| ---- | ---- | ---- |
| 无   | int  | 总数 |

## 9、在职情况统计

`Action: memberActiveTotal`

**请求参数**

无

**返回参数**

| 参数 | 类型 | 说明 |
| ---- | ---- | ---- |
| 无   | int  | 总数 |

## 10、判断指定用户信息是否已存在 (手机号, 邮箱, 微信号)

`Action: checkMemInfoSingle`

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数      | 必填 | 类型   | 说明   |
| --------- | ---- | ------ | ------ |
| memMobile | 否   | String | 手机号 |
| memEmail  | 否   | String | 邮箱   |
| memWeixin | 否   | String | 微信号 |

**返回参数**

| 参数      | 类型 | 说明                           |
| --------- | ---- | ------------------------------ |
| memMobile | int  | 是否存在（1=已存在，2=不存在） |
| memEmail  | int  | 是否存在（1=已存在，2=不存在） |
| memWeixin | int  | 是否存在（1=已存在，2=不存在） |

## 11、根据 UserId 查询用户详情

`Action: memberGetByUserId`

UC接口：member/get-by-userid

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数      | 必填 | 类型   | 说明             |
| --------- | ---- | ------ | ---------------- |
| memUserid | 是   | string | 用户的微信userid |

**返回参数**

同<u>获取指定用户信息</u>接口返回参数一致。

## 12、企业用户关注状态统计接口（忽略权限过滤）

`Action: memberStatusCount`

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 否   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数                   | 必填 | 类型   | 说明                                                         |
| ---------------------- | ---- | ------ | ------------------------------------------------------------ |
| memUids                | 否   | array  | memUid数组                                                   |
| excludeMemuids         | 否   | array  | memoir排除数组                                               |
| userids                | 否   | array  | 微信第三方 userid                                            |
| dpId                   | 否   | string | 部门ID                                                       |
| dpIdList               | 否   | array  | 部门IDS                                                      |
| departmentChildrenFlag | 否   | number | 按部门条件查询时，表示部门是否递归查询人员 【0：不递归（默认值）、1：递归】 |
| memMobile              | 否   | string | 用户手机号                                                   |
| memEmail               | 否   | string | 用户邮箱                                                     |
| memUsername            | 否   | string | 用户名称                                                     |
| memIndex               | 否   | string | 索引标识                                                     |
| index                  | 否   | string | 首字母                                                       |
| memSubscribeStatus     | 否   | number | 关注状态 （微信公众号关注状态 1=已关注，2=已禁用，4=未关注） |
| memActive              | 否   | number | 在职状态 （1=在职，0=离职）                                  |
| jobIdList              | 否   | array  | 所在岗位／职位列表                                           |
| roleIdList             | 否   | array  | 所在角色列表                                                 |

**返回参数**

| 参数             | 类型   | 说明     |
| ---------------- | ------ | -------- |
| amount           | number | 人员总数 |
| alreadyConcerned | number | 已关注数 |
| notConcerned     | number | 未关注数 |
| disable          | number | 禁用数   |

## 13、获取没有部门的人员 (跳过鉴权)

`Action: getNoPepartmentMember`

**请求参数**

无

**返回参数**

同<u>获取用户列表</u>接口返回参数一致。

## 14、获取某时间段内人员数量

`Action: memberCountByDay`

**请求参数**

| 参数      | 必填 | 类型  | 说明                             |
| --------- | ---- | ----- | -------------------------------- |
| condition | 是   | array | 查询条件数据（详见下方参数说明） |

*condition说明*

| 参数      | 必填 | 类型   | 说明                                   |
| --------- | ---- | ------ | -------------------------------------- |
| startTime | 是   | string | 开始时间（当天0点，毫秒级时间戳）      |
| endTime   | 是   | string | 结束时间（当天23:59:59，毫秒级时间戳） |

**返回参数**

| 参数  | 类型   | 说明                         |
| ----- | ------ | ---------------------------- |
| days  | string | 格式化日期（如：2018-01-01） |
| total | int    | 人员总数                     |

返回参数示例

```php
[
  'code' => 'SUCCESS',
  'msg' => '成功',
  'timestamp' => 1508748461504,
  'requestId' => '486A857E0A69249026DB87FA17A9ACC1',
  'data' => [
    [
      'days' => '2017-10-22',
      'total' => 200,
    ],
    [
      'days' => '2017-10-23',
      'total' => 217,
    ]
  ]
]
```

