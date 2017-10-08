<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/10/2017
 * Time: 18:58
 */

namespace APIClient\Model;


use APIClient\Entity\NewsItem;

class NewsItemModel
{
    /**
     * @var array $listing
     */
    public $listItems;

    public function getItems($listItems)
    {
        return $this->convertList($listItems);
    }
    /********************************************************************/
    /***********************Convert array into usable format)
     * /********************************************************************/
    private function convertList($listItems)
    {
        foreach ($listItems->response->articles as $singleItemKey => $singleItemValue) {
            $images = (array)$singleItemValue->images;
            if (is_array($images)) {
                $images = array_values($images)[0];
            }
            $itemListArr[] = new NewsItem($singleItemValue->title, $singleItemValue->excerpt, $singleItemValue->images);
        }
        return $itemListArr;
    }
}