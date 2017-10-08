<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/10/2017
 * Time: 18:54
 */

namespace APIClient\Entity;


class NewsItem
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $excerpt;
    /**
     * @var string
     */
    public $image;

    /**
     * NewsItem constructor.
     * @param string $title
     * @param string $excerpt
     * @param string $image
     */
    public function __construct($title, $excerpt, $image)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->image = $image;
    }
}