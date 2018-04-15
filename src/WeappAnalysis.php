<?php

namespace Tumobi\WeappAnalysis;

use GuzzleHttp\Client;

class WeappAnalysis
{

    private $appid = '';
    private $secret = '';
    private $client;

    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
        $this->client = new Client();
    }

    public function getAccessToken()
    {
        $result = $this->client->request('GET', Url::ACCESS_TOKEN, ['query' => [
            'grant_type' => 'client_credential',
            'appid' => $this->appid,
            'secret' => $this->secret
        ]]);
        $result = json_decode($result->getBody(), true);
        return $result['access_token'];
    }

    // 概况趋势（天）
    public function getdDailySummaryTrend($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::DAILY_SUMMARY_TREND, $param);
    }

    // 访问趋势（日趋势）
    public function getDailyVisitTrend($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::DAILY_VISIT_TREND, $param);
    }


    // 访问趋势（周趋势）
    public function getWeeklyVisitTrend($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::WEEKLY_VISIT_TREND, $param);
    }


    // 访问趋势（月趋势）
    public function getMonthlyVisitTrend($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::MONTHLY_VISIT_TREND, $param);
    }


    // 访问分布
    public function getVisitDistribution($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::VISIT_DISTRIBUTION, $param);
    }


    // 访问留存（日留存）
    public function getDailyRetainInfo($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::DAILY_RETAIN_INFO, $param);
    }


    // 访问留存（周留存）
    public function getWeeklyRetainInfo($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::WEEKLY_RETAIN_INFO, $param);
    }


    // 访问留存（月留存）
    public function getMonthlyRetainInfo($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::MONTHLY_RETAIN_INFO, $param);
    }


    // 访问页面
    public function getVisitPage($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::VISIT_PAGE, $param);
    }

    // 用户画像
    public function getUserPortrait($begin_date, $end_date)
    {
        $param = [
            'begin_date' => $begin_date,
            'end_date' => $end_date
        ];
        return $this->sendRequest(Url::USER_PORTRAIT, $param);
    }

    private function sendRequest($uri, $param)
    {
        $requestUri = $this->getRequestUri($uri);
        $res = $this->client->request('POST', $requestUri, ['json' => $param]);
        return json_decode($res->getBody(), true);
    }

    private function getRequestUri($uri)
    {
        $token = $this->getAccessToken($uri);
        return $uri . '?access_token=' . $token;
    }
}