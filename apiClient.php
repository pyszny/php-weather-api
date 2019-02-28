<?php

use Symfony\Component\Yaml\Yaml;

class apiClient {

    const BASE_URL = 'api.openweathermap.org/data/2.5/weather';
    private $key;

    private $response = [];

    public function __construct()
    {
        $this->key = Yaml::parseFile('config.yaml')['key'];
    }

    public function makeApiCall($params): array
    {
        foreach ($params as $param) {
            $url = $this->buildURI($param);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL,$url);
            $result=curl_exec($ch);
            curl_close($ch);
            $validatedResult = ResponseStatusValidator::decodeAndValidate($result, $param);
            array_push($this->response, $validatedResult);
        }

        return $this->response;
    }

    private function buildURI(int $cityId): string
    {
        return self::BASE_URL . "?id={$cityId}&APPID={$this->key}";
    }
}