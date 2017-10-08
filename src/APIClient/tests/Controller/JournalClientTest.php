<?php

class JournalClientTest extends PHPUnit_Framework_TestCase
{
    protected $client;
    protected function setUp()
    {
        $this->config = parse_ini_file('./config/config.ini', true);
        $this->client = new GuzzleHttp\Client([
            'base_uri' => $this->config['host'] . "/thejournal/",
            'auth' => [$this->config['username'], $this->config['password']],
            'headers' => ['Accept' => 'application/json']
        ]);
    }
    public function testConnectAPI()
    {
        $response = $this->client->get('/v3/thejournal/');
        $this->assertEquals(200, $response->getStatusCode());
        $data = json_decode($response->getBody(), true);
    }
    public function testCallAPI()
    {

    }
}