<?php

class StringServicesTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests routeConverter()
     * @dataProvider provider
     */
    public function testRouteConverter($input, $expected)
    {
        $ss = new \APIClient\Services\StringServices();
        $_SERVER['REQUEST_URI'] = $input;
        $this->assertSame($expected, $ss->routeConverter());
    }
    public static function provider()
    {
        return [
            [
                "/google/", "/tag/google/"],[
                "", "thejournal"
            ]
        ];
    }
}