<?php

namespace APIClient\Controller;

use APIClient\Model\NewsItemModel;
use APIClient\Services\StringServices;
use APIClient\View\JournalDisplay;
use GuzzleHttp\Client;

/***
 * Journal API Client
 ***/
class JournalClient
{
    /**
     * @var array $config
     */
    private $config;
    /**
     * @var NewsItemModel
     */
    private $newsItemModel;
    /**
     * @var $urlConverter
     */
    private $urlConverter;

    /**
     * JournalClient constructor.
     */
    public function __construct()
    {
        $this->config = parse_ini_file('../config/config.ini', true);
        $this->newsItemModel = new NewsItemModel();
        $this->urlConverter = new StringServices();
        $this->display = new JournalDisplay();
    }

    /**
     * Call the Journal API
     * get an array of NewsItem entities
     * display them
     */
    public function CallAPI()
    {
        $apiResult = $this->connectAPI();
        $listItems = $this->newsItemModel->getItems($apiResult);
        $this->display->showItems($listItems);
    }

    /**
     * @return mixed
     */
    private function connectAPI()
    {
        // Create a client and provide a base URL
        $additionalValue = $this->urlConverter->routeConverter();
        $extendedValue = $this->config['host'] . $additionalValue;
        $requestResult = $this->authenticate($extendedValue);
        return \GuzzleHttp\json_decode($requestResult->getBody());
    }

    /**
     * Authenticate the credentials
     * @param $extendedValue
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    private function authenticate($extendedValue)
    {
        $client = new Client(array($this->config['host']));
        $result = $client->request('GET', $extendedValue, [
            'auth' => [$this->config['username'], $this->config['password']]
        ]);
        if ($result->getStatusCode() != 200) //Not a valid connection
        {
            $this->display->errorMessage($result->getStatusCode(), \GuzzleHttp\json_decode($result->getBody()));
            die;
        } else {
            return $result;
        }
    }
}