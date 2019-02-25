<?php

class ResponseEditor
{
    private $response;
    private $decodedResponse = [];
    private $editedResponse = [];

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function decodeAndGetValues()
    {
        foreach ($this->response as $resp) {
            array_push($this->decodedResponse, json_decode($resp, true));
        }

        foreach ($this->decodedResponse as $element) {
            $this->editedResponse["{$element['id']}"] = array(
                "City" => $element['name'],
                "Temperature" => $element['main']['temp'],
                "Sky" => $element['weather'][0]['main']
            );
        }

        return $this->editedResponse;
    }

}