<?php

namespace APIClient\View;


/**
 * Class JournalDisplay
 * @package APIClient\View
 */
class JournalDisplay
{
    /**
     * JournalDisplay constructor.
     */
    public function __construct()
    {
        $this->defaultTemplateDir = "../templates/";
    }

    /**
     * @param mixed $displayArr
     */
    public function showItems($displayArr)
    {
        $contentHtml = '';
        $contentValues = file_get_contents($this->defaultTemplateDir . "view_items.php");
        //var_dump($displayArr);
        foreach ($displayArr as $singleListItem) {
            $contentHtml .= "<h4>{$singleListItem->title}</h4>
            <p>{$singleListItem->excerpt}</p>
            <img src='{$singleListItem->image->medium->image}' title='{$singleListItem->title}' style='width:{$singleListItem->image->medium->width};height:{$singleListItem->image->medium->height};' alt='image' />";
        }
        $displayValues = str_replace("{{ content }}", $contentHtml, $contentValues);
        echo($displayValues);
    }

    /**
     * @param string $statusCode
     * @param string $content
     */
    public function errorMessage($statusCode = '', $content = '')
    {
        $contentValues = file_get_contents($this->defaultTemplateDir . "view_errors.php");
        $contentHtml = str_replace("{{ status_code }}", $statusCode, $contentValues);
        $displayValues = str_replace("{{ error_description }}", $content, $contentValues);
        echo($displayValues);
    }
}