# 积分操作类

``version：1.0``

#### 1.用户积分查询

`Action: historyTotal`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数          | 必填 | 类型   | 说明                         |
| ------------- | ---- | ------ | ---------------------------- |
| beginMitdTime | 否   | String | 统计开始时间戳（单位：毫秒） |
| endMitdTime   | 否   | String | 统计结束时间戳（单位：毫秒） |
| pageNum       | 否   | String | 当前页，空时默认为1          |
| pageSize      | 否   | String | 页大小,空时默认为5,最大1000  |

##### 返回参数

| 参数                   | 类型   | 说明                                                         |
| ---------------------- | ------ | ------------------------------------------------------------ |
| mitdId                 | String | 积分统计id                                                   |
| epId                   | String | 企业id                                                       |
| miType                 | String | 积分类型                                                     |
| mitdTime               | Number | 统计日期时间戳（单位：毫秒）,每天开始时间（例如：2016-10-14 00:00:00） |
| mitdAddCount           | Number | 昨日新增积分总数                                             |
| mitdAvilableCount      | Number | 截止昨日当前可用总积分                                       |
| mitdTotalCount         | Number | 截止昨日累积产生总积分                                       |
| mitdExchangeCount      | Number | 昨日消耗积分                                                 |
| mitdExchangeTotalCount | Number | 截止昨日累计消耗总积分                                       |

#### 2.用户积分详情

``Action: detail``

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数   | 必填 | 类型   | 说明   |
| ------ | ---- | ------ | ------ |
| memUid | 否   | String | 用户ID |

##### 返回参数

| 参数                 | 类型   | 说明                                     |
| -------------------- | ------ | ---------------------------------------- |
| memUid               | String | 用户id                                   |
| memUsername          | string | 员工姓名                                 |
| dpName               | string | 部门名称(多个部门;号分隔)                |
| memMobile            | String | 手机号                                   |
| memEmail             | String | 电子邮箱                                 |
| memWeixin            | String | 微信号                                   |
| available            | int    | 当前积分                                 |
| total                | int    | 总积分                                   |
| miExchangeTotal      | int    | 兑换次数                                 |
| currentLevelName     | String | 当前等级名称                             |
| currentLevelRate     | int    | 当前等级经验值进度值(百分比)             |
| toNextLevelIntegral  | int    | 距离下一等级还有多少积分值               |
| currentLevelIcon     | String | 当前等级icon访问地址                     |
| currentLevelIconType | int    | 当前等级icon类型 1-系统默认 2-用户自定义 |

#### 3.用户积分操作明细接口

`Action: detailList`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数       | 必填 | 类型   | 说明                                                         |
| ---------- | ---- | ------ | ------------------------------------------------------------ |
| memUid     | 是   | string | 用户id                                                       |
| milOptType | 否   | int    | 积分获得类型(1: 自动获得, 2: 手动增加, 3: 手动扣减, 4:兑换消耗，5:兑换退回) |
| startTime  | 否   | int    | 查询开始时间（毫秒）                                         |
| endTime    | 否   | int    | 查询结束时间（毫秒）                                         |
| pageNum    | 否   | int    | 当前页，空时默认为1                                          |
| pageSize   | 否   | int    | 页大小,空时默认为5,最大1000                                  |

##### 返回参数

| 参数                 | 类型   | 说明             |
| -------------------- | ------ | ---------------- |
| pageNum              | int    | 当前页           |
| pageSize             | int    | 分页大小         |
| total                | int    | 总记录数         |
| list                 | array  | 积分明细列表数据 |
| milId                | string | 积分明细id       |
| milCreated           | long   | 创建时间         |
| milOptType           | int    | 积分获得类型id   |
| milChangeIntegral    | int    | 积分值           |
| milChangeDesc        | string | 备注             |
| milCreateMemUsername | String | 操作人           |
| memUsername          | String | 姓名             |
| dpName               | String | 部门名称         |
| memUid               | string | 用户id           |
| plName               | string | 应用名称         |
| plPluginid           | String | 应用id           |
| plIdentifier         | String | 应用标示符       |
| businessId           | string | 业务id           |

#### 4.获取企业积分策略配置

``Action: getStrategySetting``

##### 方法参数

无

##### 返回参数

| 参数             | 类型          | 说明                    |
| ---------------- | ------------- | ----------------------- |
| eirsId           | String        | 企业积分策略配置id      |
| epId             | String        | 企业id                  |
| eirsEnable       | Number        | 是否启用 1:启用 2：禁用 |
| eirsLastOpenTime | Number        | 最后开启时间            |
| eirsRuleSetList  | Array(Object) | 积分策略配置            |
| eirsDesc         | String        | 企业积分规则说明        |
| eirsTypeSetList  | Array(Object) | 积分类型配置            |
| openedRules      | Number        | 已开启了多少项策略      |

###### 企业积分策略配置－eirsRuleSetList:

| 参数           | 类型   | 说明                                                         |
| -------------- | ------ | ------------------------------------------------------------ |
| irId           | String | 积分策略id                                                   |
| miType         | String | 积分类型                                                     |
| enable         | Number | 是否启用 1:启用 2：禁用                                      |
| lastUpdateTime | Number | 最后更新时间                                                 |
| irKey          | String | 策略标识符                                                   |
| plPluginid     | String | 应用id                                                       |
| irName         | String | 积分策略名称                                                 |
| irDesc         | String | 积分策略描述                                                 |
| irCycle        | Stirng | 积分循环周期。`格式：<显示数量|单位>；例如：1|天、30|天、2|年。0 表示不限制` |
| irNumber       | Number | 积分数值                                                     |
| ir_count       | Number | 积分次数限制                                                 |

###### 积分类型－eirsTypeSetList:

| 参数   | 类型   | 说明                      |
| ------ | ------ | ------------------------- |
| key    | String | 积分类型标识 ms_type[0-9] |
| enable | Number | 是否启用 1:启用 2：禁用   |
| name   | String | 名称                      |
| desc   | String | 描述                      |

#### 5.用户积分查询接口

`Action: integralMemberList`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数             | 必填 | 类型   | 说明                                                         |
| ---------------- | ---- | ------ | ------------------------------------------------------------ |
| memUsername      | 否   | string | 员工姓名                                                     |
| memJob           | 否   | string | 员工岗位                                                     |
| memRole          | 否   | string | 员工角色                                                     |
| dpId             | 否   | string | 部门id                                                       |
| miType           | 否   | string | 积分类别，固定格式：mi_type[0-9]                             |
| upgradeType      | 否   | string | 积分等级升级类型，1-累计获得积分, 2-当前可用积分             |
| levelMaxIntegral | 否   | int    | 等级最大积分值                                               |
| levelMinIntegral | 否   | int    | 等级最小积分值 `upgradeType,levelMaxIntegral,levelMinIntegral必须同时传值才有效` |
| pageNum          | 否   | int    | 当前页，空时默认为1                                          |
| pageSize         | 否   | int    | 页大小,空时默认为20,最大1000                                 |

##### 返回参数

| 参数                 | 类型   | 说明                                     |
| -------------------- | ------ | ---------------------------------------- |
| pageNum              | int    | 当前页                                   |
| pageSize             | int    | 分页大小                                 |
| total                | int    | 总记录数                                 |
| list                 | array  | 积分列表数据                             |
| miId                 | string | 积分主键                                 |
| memUid               | String | 用户id                                   |
| memUsername          | string | 员工姓名                                 |
| memJob               | string | 员工岗位                                 |
| memRole              | string | 员工角色                                 |
| depName              | string | 部门名称(多个部门;号分隔)                |
| miType               | string | 积分类型                                 |
| available            | int    | 当前积分                                 |
| miExchangeTotal      | int    | 兑换次数                                 |
| total                | int    | 总积分                                   |
| milCreated           | long   | 创建时间                                 |
| currentLevelName     | String | 当前等级名称                             |
| currentLevelRate     | int    | 当前等级经验值进度值(百分比)             |
| currentLevelIcon     | String | 当前等级icon访问地址                     |
| currentLevelIconType | int    | 当前等级icon类型 1-系统默认 2-用户自定义 |

#### 6.用户积分操作明细接口

``Action: integralIndexList``

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数        | 必填 | 类型   | 说明                                                         |
| ----------- | ---- | ------ | ------------------------------------------------------------ |
| memUsername | 否   | string | 用户姓名                                                     |
| memJob      | 否   | string | 用户岗位                                                     |
| memRole     | 否   | string | 用户角色                                                     |
| businessKey | 否   | string | 业务key                                                      |
| businessAct | 否   | string | 业务行为                                                     |
| milOptType  | 否   | int    | 积分获得类型(1: 自动获得, 2: 手动增加, 3: 手动扣减, 4:兑换消耗，5:兑换退回, 99: 积分兑换) |
| dpId        | 否   | string | 部门主键                                                     |
| startTime   | 否   | long   | 查询开始时间（毫秒）                                         |
| endTime     | 否   | long   | 查询结束时间（毫秒）                                         |
| pageNum     | 否   | int    | 当前页，空时默认为1                                          |
| pageSize    | 否   | int    | 页大小,空时默认为5,最大1000                                  |

##### 返回参数:

| 参数                 | 类型   | 说明             |
| -------------------- | ------ | ---------------- |
| pageNum              | int    | 当前页           |
| pageSize             | int    | 分页大小         |
| total                | int    | 总记录数         |
| list                 | array  | 积分明细列表数据 |
| milId                | string | 积分明细id       |
| milCreated           | long   | 创建时间         |
| milOptType           | int    | 积分获得类型id   |
| milChangeIntegral    | int    | 积分值           |
| milChangeDesc        | string | 备注             |
| milCreateMemUsername | String | 操作人           |
| memUsername          | String | 姓名             |
| memJob               | string | 用户岗位         |
| memRole              | string | 用户角色         |
| businessKey          | string | 业务key          |
| businessName         | string | 业务名称         |
| businessAct          | string | 业务行为         |
| businessActName      | string | 业务行为名称     |
| dpName               | String | 部门名称         |
| memUid               | string | 用户id           |
| businessId           | string | 业务id           |
| plPluginid           | String | 应用id           |
| plIdentifier         | String | 应用标示符       |
| plName               | String | 应用名称         |

#### 7.获取指定用户的积分排名

`Action: getRanking`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数        | 必填 | 类型   | 说明                                                         |
| ----------- | ---- | ------ | ------------------------------------------------------------ |
| memUid      | *是* | String | 人员ID                                                       |
| rankingType | *是* | int    | 排名类型 1-总排行 2-日排行 3-周排行 4-月排行                 |
| dpIds       | *否* | array  | 部门id数组（空时默认查询全公司）                             |
| jobId       | *否* | String | 岗位id （岗位或角色ID只能使用一个，同时传值默认使用岗位ID ） |
| roleId      | *否* | String | 角色id （岗位或角色ID只能使用一个，同时传值默认使用岗位ID ） |

##### 返回参数

| 参数      | 类型   | 说明                             |
| --------- | ------ | -------------------------------- |
| available | int    | 可用积分                         |
| likeTotal | int    | 被点赞总数                       |
| status    | int    | 是否对自己点赞 1-是 2-否         |
| ranking   | int    | 排名                             |
| dpName    | String | 所属部门名称                     |
| iconUrl   | String | 等级icon访问地址                 |
| iconType  | int    | 等级icon类型 1-系统默认 2-自定义 |

#### 8.获取所有用户的积分排名

`Action: getAllRanking`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| memUid   | *是* | String | 人员ID                                                |
| -------- | ---- | ------ | ----------------------------------------------------- |
| dpIds    | *否* | array  | 部门id数组                                            |
| jobId    | *否* | String | 岗位id                                                |
| roleId   | *否* | String | 角色id                                                |
| rankType | *是* | String | 积分排名类型，1=总排行，2=日排行，3=周排行 ，4=月排行 |
| pageNum  | *否* | int    | 当前页，空时默认为1                                   |
| pageSize | *否* | int    | 页大小,空时默认为20,最大1000                          |

##### 返回参数

| 参数 | 类型  | 说明     |
| ---- | ----- | -------- |
| list | Array | 返回结果 |

###### list说明

| 参数      | 类型   | 说明                             |
| --------- | ------ | -------------------------------- |
| memUid    | String | 用户id                           |
| available | int    | 可用积分值                       |
| likeTotal | int    | 点赞总人数                       |
| dpName    | String | 部门名称，多部门逗号分隔         |
| iconUrl   | String | 等级图标                         |
| iconType  | int    | 等级图标类型 1-系统默认 2-自定义 |
| status    | int    | 点赞状态（1: 点赞， 2： 取消）   |

#### 9.获取不同范围的用户的积分排名

`Action: getDiffRangeRanking`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数     | 必填 | 类型   | 说明                                                  |
| -------- | ---- | ------ | ----------------------------------------------------- |
| memUid   | *是* | String | 人员ID                                                |
| dpIds    | *否* | Array  | 部门id                                                |
| jobIds   | *否* | Array  | 岗位id                                                |
| roleIds  | *否* | Array  | 角色id                                                |
| rankType | *是* | String | 积分排名类型，1=总排行，2=日排行，3=周排行 ，4=月排行 |
| pageNum  | *否* | int    | 当前页，空时默认为1                                   |
| pageSize | *否* | int    | 页大小,空时默认为20,最大1000                          |

##### 返回参数

| 参数 | 类型  | 说明     |
| ---- | ----- | -------- |
| list | Array | 返回结果 |

###### list说明

| 参数      | 类型   | 说明                             |
| --------- | ------ | -------------------------------- |
| memUid    | String | 用户id                           |
| available | int    | 可用积分值                       |
| likeTotal | int    | 点赞总人数                       |
| dpName    | String | 部门名称，多部门逗号分隔         |
| iconUrl   | String | 等级图标                         |
| iconType  | int    | 等级图标类型 1-系统默认 2-自定义 |
| status    | int    | 点赞状态（1: 点赞， 2： 取消）   |

#### 10.获取企业开启的计算积分等级状态

`Action: getCalcType`

##### 方法参数

无

##### 返回参数

| 参数 | 类型 | 说明                                     |
| ---- | ---- | ---------------------------------------- |
| data | Int  | 积分等级计算类型, 0: 默认, 1:岗位,2:角色 |

#### 11.获取企业计算等级规则明细

`Action: levelList`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数     | 必填 | 类型   | 说明                            |
| -------- | ---- | ------ | ------------------------------- |
| eilType  | *是* | string | 积分等级计算类型, 1:岗位,2:角色 |
| pageNum  | *否* | Int    | 当前页,空时默认为1              |
| pageSize | *否* | Int    | 页大小,空时默认为20             |

##### 返回参数

| 参数                  | 类型   | 说明                            |
| --------------------- | ------ | ------------------------------- |
| pageNum               | Int    | 当前页                          |
| pageSize              | Int    | 分页大小                        |
| total                 | Int    | 总记录数                        |
| list                  | Array  | 奖品列表数据                    |
| list. eilId           | String | 积分等级主键                    |
| list. epId            | String | 企业id                          |
| list. eilType         | int    | 积分等级计算类型, 1:岗位,2:角色 |
| list. eilObjId        | String | 岗位or角色id                    |
| list. objName         | String | 岗位or角色名称                  |
| list. eilLevelSetting | String | 等级配置，json格式              |
| list. eilEnableStatus | Int    | 启用状态, 1:启用, 2:禁用        |
| list. eilCreated      | Int    | 创建时间                        |
| list. eilUpdated      | Int    | 更新时间                        |

#### 12.获取企业计算等级规则明细

`Action: levelDetail`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数  | 必填 | 类型   | 说明   |
| ----- | ---- | ------ | ------ |
| eilId | *是* | string | 主键id |

##### 返回参数

| 参数            | 类型   | 说明                            |
| --------------- | ------ | ------------------------------- |
| eilId           | String | 积分等级主键                    |
| epId            | String | 企业id                          |
| eilType         | int    | 积分等级计算类型, 1:岗位,2:角色 |
| eilObjId        | String | 岗位or角色id                    |
| objName         | String | 岗位or角色名称                  |
| levels          | Array  | 等级配置                        |
| eilEnableStatus | Int    | 启用状态, 1:启用, 2:禁用        |
| eilCreated      | Int    | 创建时间                        |

#### 13.企业默认积分策略查询

`Action: defaultList`

##### 方法参数

无

##### 返回参数

| 参数                                 | 类型   | 说明                                                         |
| ------------------------------------ | ------ | ------------------------------------------------------------ |
| epId                                 | String | 企业id                                                       |
| enable                               | String | 是否可用【1：可用；2：禁用】                                 |
| lastOpenTime                         | Long   | 最后启用时间                                                 |
| businessKey                          | String | 业务key                                                      |
| businessName                         | String | 业务名称                                                     |
| businessAct                          | String | 业务行为key                                                  |
| businessActName                      | String | 业务行为名称                                                 |
| tips                                 | String | 业务规则描述                                                 |
| businessId                           | String | 业务id【空】                                                 |
| eibsId                               | String | 策略id【空】                                                 |
| triggers[]                           | Array  | 触发条件                                                     |
| triggers[].triggerKey                | String | 触发条件key                                                  |
| triggers[].triggerName               | Array  | 触发条件名称                                                 |
| triggers[].unit                      | Array  | 单位                                                         |
| triggers[].computeType               | int    | 计算类型计算类型【1：循环类型；2：枚举类型；3：自定义枚举类型；4：阈值类型；5：区间类型】 |
| triggers[].enabled                   | bool   | 是否启用【true：启用；false：禁用】                          |
| triggers[].applicableScope           | bool   | 适用范围【1：全局；2：单个】                                 |
| triggers[].couldLimit                | bool   | 是否可以设置限制【true：可以；false：禁用】                  |
| triggers[].triggerValue[]            | Array  | 触发值                                                       |
| triggers[].triggerValue[].condition  | Array  | 触发匹配规则值 【说明：这个根据计算类型数据格式会有不同。1循环：数值类型；2类型：特定字符串；3阈值：数值类型；4区间：[10,20]；】 |
| triggers[].triggerValue[].score      | int    | 改变积分值                                                   |
| triggers[].limitConditions[]         | Array  | 限制条件                                                     |
| triggers[].limitConditions[].type    | Array  | 限制条件类型【1：天；2：周；3：月；4：季；5：年；6：总计】   |
| triggers[].limitConditions[].numbers | Array  | 限制次数                                                     |
| triggers[].limitConditions[].limit   | Array  | 限制积分值                                                   |

#### 13.企业默认积分策略查询

`Action: defaultDetail`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数        | 必填 | 类型   | 说明        |
| ----------- | ---- | ------ | ----------- |
| businessKey | 是   | String | 业务key     |
| businessAct | 是   | String | 业务行为key |

##### 返回参数

| 参数                                 | 类型   | 说明                                                         |
| ------------------------------------ | ------ | ------------------------------------------------------------ |
| epId                                 | String | 企业id                                                       |
| enable                               | String | 是否可用【1：可用；2：禁用】                                 |
| lastOpenTime                         | Long   | 最后启用时间                                                 |
| businessKey                          | String | 业务key                                                      |
| businessName                         | String | 业务名称                                                     |
| businessAct                          | String | 业务行为key                                                  |
| businessActName                      | String | 业务行为名称                                                 |
| tips                                 | String | 业务规则描述                                                 |
| businessId                           | String | 业务id【空】                                                 |
| eibsId                               | String | 策略id【空】                                                 |
| triggers[]                           | Array  | 触发条件                                                     |
| triggers[].triggerKey                | String | 触发条件key                                                  |
| triggers[].triggerName               | Array  | 触发条件名称                                                 |
| triggers[].unit                      | Array  | 单位                                                         |
| triggers[].computeType               | int    | 计算类型计算类型【1：循环类型；2：枚举类型；3：自定义枚举类型；4：阈值类型；5：区间类型】 |
| triggers[].enabled                   | bool   | 是否启用【true：启用；false：禁用】                          |
| triggers[].applicableScope           | bool   | 适用范围【1：全局；2：单个】                                 |
| triggers[].couldLimit                | bool   | 是否可以设置限制【true：可以；false：禁用】                  |
| triggers[].triggerValue[]            | Array  | 触发值                                                       |
| triggers[].triggerValue[].condition  | Array  | 触发匹配规则值 【说明：这个根据计算类型数据格式会有不同。1循环：数值类型；2类型：特定字符串；3阈值：数值类型；4区间：[10,20]；】 |
| triggers[].triggerValue[].score      | int    | 改变积分值                                                   |
| triggers[].limitConditions[]         | Array  | 限制条件                                                     |
| triggers[].limitConditions[].type    | Array  | 限制条件类型【1：天；2：周；3：月；4：季；5：年；6：总计】   |
| triggers[].limitConditions[].numbers | Array  | 限制次数                                                     |
| triggers[].limitConditions[].limit   | Array  | 限制积分值                                                   |

#### 14.业务积分策略 查询

`Action: listBusinessStrategy`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数        | 是否必填 | 类型   | 说明                         |
| ----------- | -------- | ------ | ---------------------------- |
| eibsIds     | 否       | Array  | 策略ids 业务绑定的所有策略ID |
| businessKey | 是       | String | 业务key                      |

##### 返回参数

| 参数            | 类型   | 说明                      |
| --------------- | ------ | ------------------------- |
| enable          | String | 是否启用 1：启用；2：禁用 |
| lastOpenTime    | Long   | 最后启用时间              |
| businessKey     | String | 业务key                   |
| businessName    | String | 业务名称                  |
| businessAct     | String | 业务行为key               |
| businessActName | String | 业务行为名称              |
| tips            | String | 业务规则描述              |
| businessId      | String | 业务id                    |
| eibsId          | String | 策略id                    |
| triggers        | Array  | 触发条件                  |

###### triggers 

| triggers[0].triggerKey      | String | 触发条件key                                                  |
| --------------------------- | ------ | ------------------------------------------------------------ |
| triggers[0].triggerName     | String | 触发条件名称                                                 |
| triggers[0].unit            | String | 单位                                                         |
| triggers[0].computeType     | int    | 计算类型【1：循环触发；2：类型触发；3：阈值触发；4：区间触发】 |
| triggers[0].enabled         | bool   | 是否启用【true：启用；false：禁用】                          |
| triggers[0].applicableScope | int    | 适用范围【1：全局；2：单个】                                 |
| triggers[0]. couldLimit     | bool   | 是否可以设置限制【true：可以；false：禁用】                  |
| triggers[0].triggerValue    | Array  | 触发值                                                       |
| triggers[0].limitConditions | Array  | 限制条件                                                     |

###### triggerValue 

| triggerValue[0]. condition | Array | 触发匹配规则值 【说明：这个根据计算类型数据格式会有不同。1循环：数值类型；2类型：特定字符串；3阈值：数值类型；4区间：[10,20]；】 |
| -------------------------- | ----- | ------------------------------------------------------------ |
| triggerValue[0].score      | int   | 改变积分值                                                   |

###### limitConditions 

| limitConditions[0].type    | int  | 限制条件类型【1：天；2：周；3：月；4：季；5：年；6：总计】 |
| -------------------------- | ---- | ---------------------------------------------------------- |
| limitConditions[0].numbers | int  | 限制次数                                                   |
| limitConditions[0].limit   | int  | 限制积分值                                                 |

#### 15.业务积分策略 详情

`Action: getBusinessStrategy`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数        | 是否必填 | 类型   | 说明        |
| ----------- | -------- | ------ | ----------- |
| eibsId      | 是       | String | 策略id      |
| businessKey | 是       | String | 业务key     |
| businessAct | 是       | String | 业务行为key |

##### 返回参数

| 参数            | 类型   | 说明                      |
| --------------- | ------ | ------------------------- |
| enable          | String | 是否启用 1：启用；2：禁用 |
| lastOpenTime    | Long   | 最后启用时间              |
| businessKey     | String | 业务key                   |
| businessName    | String | 业务名称                  |
| businessAct     | String | 业务行为key               |
| businessActName | String | 业务行为名称              |
| tips            | String | 业务规则描述              |
| businessId      | String | 业务id                    |
| eibsId          | String | 策略id                    |
| triggers        | Array  | 触发条件                  |

###### triggers 

| triggers[0].triggerKey      | String | 触发条件key                                                  |
| --------------------------- | ------ | ------------------------------------------------------------ |
| triggers[0].triggerName     | String | 触发条件名称                                                 |
| triggers[0].unit            | String | 单位                                                         |
| triggers[0].computeType     | int    | 计算类型【1：循环触发；2：类型触发；3：阈值触发；4：区间触发】 |
| triggers[0].enabled         | bool   | 是否启用【true：启用；false：禁用】                          |
| triggers[0].applicableScope | int    | 适用范围【1：全局；2：单个】                                 |
| triggers[0]. couldLimit     | bool   | 是否可以设置限制【true：可以；false：禁用】                  |
| triggers[0].triggerValue    | Array  | 触发值                                                       |
| triggers[0].limitConditions | Array  | 限制条件                                                     |

###### triggerValue 

| triggerValue[0]. condition | Array | 触发匹配规则值 【说明：这个根据计算类型数据格式会有不同。1循环：数值类型；2类型：特定字符串；3阈值：数值类型；4区间：[10,20]；】 |
| -------------------------- | ----- | ------------------------------------------------------------ |
| triggerValue[0].score      | int   | 改变积分值                                                   |

###### limitConditions 

| limitConditions[0].type    | int  | 限制条件类型【1：天；2：周；3：月；4：季；5：年；6：总计】 |
| -------------------------- | ---- | ---------------------------------------------------------- |
| limitConditions[0].numbers | int  | 限制次数                                                   |
| limitConditions[0].limit   | int  | 限制积分值                                                 |

#### 16.积分策略支持的应用信息查询

`Action: defaultAllBusiness`

##### 方法参数

无

##### 返回参数

| 参数              | 类型   | 说明               |
| ----------------- | ------ | ------------------ |
| businessKey       | String | 业务key            |
| businessName      | String | 业务名称           |
| actions[]         | String | 业务支持的触发行为 |
| actions[].actKey  | String | 业务行为key        |
| actions[].actName | String | 业务行为名称       |

#### 17.积分来源统计查询

`Action: sourceTotal`

##### 方法参数

| 参数      | 必填 | 类型  | 说明                        |
| --------- | ---- | ----- | --------------------------- |
| condition | 是   | Array | 查询条件，详见condition说明 |

###### condition说明

| 参数           | 必填 | 类型   | 说明                                     |
| -------------- | ---- | ------ | ---------------------------------------- |
| businessKey    | *否* | String | 业务key 不为空时统计业务行为积分         |
| beginTotalTime | *否* | int    | 统计开始时间戳 单位：毫秒 空时默认近七天 |
| endTotalTime   | *否* | int    | 统计结束时间戳 单位：毫秒 空时默认近七天 |

##### 返回参数

| 参数                 | 类型   | 说明                             |
| -------------------- | ------ | -------------------------------- |
| miType               | String | 积分类别，固定格式：mi_type[0-9] |
| sourceTotalTimestamp | String | 积分来源统计日期时间戳           |
| sourceTotalDate      | String | 积分来源统计日期                 |
| sourceTotalList      | Array  | 积分来源统计数据                 |

###### sourceTotalList 

| sourceTotalList[0].businessKey         | String | 业务key                                       |
| -------------------------------------- | ------ | --------------------------------------------- |
| sourceTotalList[0].businessAct         | String | 业务行为key 请求参数businessKey不为空时才返回 |
| sourceTotalList[0].integralSourceTotal | int    | 业务来源总积分                                |

#### 18.获取企业积分公共配置信息

`Action: getEpIntegralCommonSetting`

##### 方法参数

无

##### 返回参数

| 参数       | 类型   | 说明         |
| ---------- | ------ | ------------ |
| eisId      | String | 积分配置ID   |
| eisKey     | String | 配置key      |
| epId       | String | 企业ID       |
| eisType    | int    | 积分配置类型 |
| eisValue   | String | 配置value    |
| eisComment | String | 积分配置说明 |

返回参数预览

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518402988874,
    "requestId": "87DEE2A5C0A8016B7E526F291EA3FC35",
    "data": [
        {
            "eisId": "2FE628E77F00000120F11B186888CF90",
            "eisKey": "custom_integral_flag",
            "epId": "2FE626CA7F00000120F11B1853491390",
            "eisType": 0,
            "eisValue": "1",
            "eisComment": "企业自建积分标识1-是 2-否"
        },
    ]
}
```



#### 19.获取企业积分默认等级

`Action: getDefaultLevel`

##### **方法参数**

无

##### **返回参数**

| 参数       | 类型   | 说明                         |
| ---------- | ------ | ---------------------------- |
| eisId      | String | 等级名称ID                   |
| levels     | Array  | 等级信息（详见下方参数说明） |
| eisUpdated | Int    | 修改时间                     |

**levels说明**

| 参数     | 类型   | 说明           |
| :------- | :----- | :------------- |
| name     | String | 等级名称       |
| max      | Int    | 等级范围最大值 |
| icon     | Int    | 等级图标       |
| iconType | String | 等级图标类型   |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518405709032,
    "requestId": "880863EFC0A8016B7E526F29BA113574",
    "data": {
        "eisId": "2FE6BECD7F00000128A8E476CE52F172",
        "levels": [
            {
                "name": "LV1",
                "max": 100,
                "icon": "level1",
                "iconType": 1
            },
        ],
        "eisUpdated": 1512632139467
    }
}
```



#### 20.获取企业积分等级升级类型

`Action: getUpgradeType`

##### **方法参数**

无

##### **返回参数**

| 参数        | 类型   | 说明                                             |
| ----------- | ------ | ------------------------------------------------ |
| eisId       | String | 等级名称ID                                       |
| upgradeType | String | 积分等级升级类型，1-累计获得积分, 2-当前可用积分 |

返回参数示例

```php
{
    "code": "SUCCESS",
    "msg": "成功",
    "timestamp": 1518406313949,
    "requestId": "8811A1A9C0A8016B7E526F293E425ED9",
    "data": {
        "eisId": "2FE6BEEC7F00000128A8E4765B6B146A",
        "upgradeType": "1"
    }
}
```

