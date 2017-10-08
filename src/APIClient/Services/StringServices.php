<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/10/2017
 * Time: 19:14
 */

namespace APIClient\Services;

/**
 * Class StringServices
 * @package APIClient\Services
 */
class StringServices
{
    /**
     * @var
     */
    private $url;

    /**
     * Get the route and return base or tag string
     * @return string
     */
    public function routeConverter()
    {
        $this->url = "thejournal";
        $currentURL = str_replace("journal/", "", $_SERVER['REQUEST_URI']);
        if ($currentURL  !== '') {
            $this->url = "/tag" . $currentURL;
        }
        return ($this->url);
    }
}