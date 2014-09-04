<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:46
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


class WidgetFactory {

    public static function create($type)
    {
        switch ($type)
        {
            case "ckeditor":

                break;

            default:
                return new Text();
        }
    }
}
