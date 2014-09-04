<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:46
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


use Codeception\Module\Drupal\ContentTypeRegistry\Fields\Field;

class WidgetFactory
{
    public static function create(Field $field, $lang = "und", $pos = 0)
    {
        switch ($field->getWidget())
        {
            case "ckeditor":
                return new CkEditor($field, $lang, $pos);
                break;

            default:
                return new Text($field, $lang, $pos);
        }
    }
}
