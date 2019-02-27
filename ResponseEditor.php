<?php

class ResponseEditor
{
    private $response;
    private $decodedResponse = [];
    private $validatedResponse = [];
    private $editedResponse = [];

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function decodeResponse()
    {
        foreach ($this->response as $resp) {
            array_push($this->decodedResponse, json_decode($resp, true));
        }
    }

    public function validateResponse()
    {
        foreach ($this->decodedResponse as $response) {
            if ($response['cod'] == 200) {
                array_push($this->validatedResponse, $response);
            }
        }

        return $this->validatedResponse;
    }

    public function getValues()
    {
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