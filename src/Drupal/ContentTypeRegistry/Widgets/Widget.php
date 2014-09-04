<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:45
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;

use Codeception\Actor;
use Codeception\Module\Drupal\ContentTypeRegistry\Fields\Field;

abstract class Widget
{
    /**
     * @var string
     *   The field name e.g. body, field_group, etc.
     */
    protected $fieldName;

    /**
     * @param $name
     * @param $lang
     * @param $pos
     */
    public function __construct(Field $field, $lang = "und", $pos = 0)
    {
        $this->field = $field;
        $this->lang = $lang;
        $this->pos = 0;
    }

    public function getFormFieldSelector()
    {
        return $this->field->getSelector();
    }

    abstract public function fill(Actor $I, $value);
}
