<?php

class apiClient {

    const BASE_URL = 'api.openweathermap.org/data/2.5/weather';

    private $response = [];

    public function makeApiCall($params)
    {
        foreach ($params as $param) {
            $url = $this->buildURI($param);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL,$url);
            $result=curl_exec($ch);
            curl_close($ch);
            array_push($this->response, $result);
        }

        return $this->response;
    }

    private function buildURI(int $cityId): string
    {
        return self::BASE_URL . "?id={$cityId}&APPID=0374ff81755de6f7178fdc4ce19ffea9";
    }

}