<?php

class ResponseEditor
{
    private $response;
    private $editedResponse = [];

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function getValues()
    {
        foreach ($this->response as $element) {
            $this->editedResponse["{$element['id']}"] = array(
                "City" => $element['name'],
                "Temperature" => $element['main']['temp'],
                "Sky" => $element['weather'][0]['main']
            );
        }

        return $this->editedResponse;
    }

}