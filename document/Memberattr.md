# 用户信息

`Version: 1.0`

## 1、获取扩展属性列表

`Action: getExtList`

**方法参数**

无

**返回参数**

| 参数   | 类型   | 说明                     |
| ------ | ------ | ------------------------ |
| 属性值 | string | 属性字段（详见下方说明） |

***属性字段：***jobNumber、jobRank、nature、education、maritalStatus、bankCardId、bankName、afAccount、recruitmentChannel、personalEmail、leaveDate、custom1、custom2、custom3、custom4、custom5、custom6、custom7、custom8、custom9、custom10

***属性值说明***

| 参数      | 类型   | 说明                               |
| --------- | ------ | ---------------------------------- |
| attr_name | string | 属性名称                           |
| attr_type | int    | 属性类型（1=系统属性；2=扩展属性） |

**返回值示例**

```
[
    'jobNumber' => [
        'attr_name' => '工号',
        'attr_type' => 2
    ],
    'jobRank' => [
        'attr_name' => '职级',
        'attr_type' => 2
    ],
]
```

## 2、格式化扩展属性数据

`Action: formatExtData`

**方法参数**	

| 参数 | 必填 | 类型   | 说明                         |
| ---- | ---- | ------ | ---------------------------- |
| uid  | 是   | string | 用户UID                      |
| data | 是   | array  | 扩展属性数据（详见下方说明） |

*data说明*

| 参数       | 必填 | 类型   | 说明                                      |
| ---------- | ---- | ------ | ----------------------------------------- |
| memUid     | 是   | string | 用户UID                                   |
| memWeixin  | 否   | string | 微信号（手机/微信号/邮箱,不可同时为空）   |
| memMobile  | 否   | string | 手机号码（手机/微信号/邮箱,不可同时为空） |
| memEmail   | 否   | string | 邮箱地址（手机/微信号/邮箱,不可同时为空） |
| memActive  | 否   | string | 是否在职(0=已离职，1=在职)                |
| memAdmincp | 否   | string | 是否管理员(0=非管理员，1=管理员)          |
| memGender  | 否   | string | 性别(0=未知，1= 男，2= 女)                |
| memExt1    | 否   | string | 预留字段                                  |

**返回参数**

| 参数     | 类型   | 说明         |
| -------- | ------ | ------------ |
| memUid   | string | 用户UID      |
| extKey   | string | 扩展属性字段 |
| extValue | string | 扩展属性值   |