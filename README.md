# weapp-analysis-php

微信小程序数据分析 PHP SDK

### 环境要求
PHP >= 5.6

### 安装
```
$ composer require  "tumobi/weapp-analysis"
```

### 使用
```php
<?php
require 'vendor/autoload.php';

use Tumobi\WeappAnalysis\WeappAnalysis;

$analysis = new WeappAnalysis('你的 appid', '你的 secret');

$result = $analysis->getdDailySummaryTrend('20180411', '20180411');
print_r($result);
```

### 接口列表
```php
// 概况趋势（天）
$dailySummaryTrend = $analysis.getdDailySummaryTrend($begin_date, $end_date);

// 访问趋势（日趋势）
$dailyVisitTrend = $analysis.getDailyVisitTrend($begin_date, $end_date);

// 访问趋势（周趋势）
$weeklyVisitTrend = $analysis.getWeeklyVisitTrend($begin_date, $end_date);

// 访问趋势（月趋势）
$monthlyVisitTrend = $analysis.getMonthlyVisitTrend($begin_date, $end_date);

// 访问分布
$visitDistribution = $analysis.getVisitDistribution($begin_date, $end_date);

// 访问留存（日留存）
$dailyRetainInfo = $analysis.getDailyRetainInfo($begin_date, $end_date);

// 访问留存（周留存）
$weeklyRetainInfo = $analysis.getWeeklyRetainInfo($begin_date, $end_date);

// 访问留存（月留存）
$monthlyRetainInfo = $analysis.getMonthlyRetainInfo($begin_date, $end_date);

// 访问页面 
$visitPage = $analysis.getVisitPage($begin_date, $end_date);

// 用户画像 
$userPortrait = $analysis.getUserPortrait($begin_date, $end_date);

```
### 详细接口文档
[数据 · 小程序](https://developers.weixin.qq.com/miniprogram/dev/api/analysis.html)
