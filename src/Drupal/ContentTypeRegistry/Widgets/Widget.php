<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:45
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;

use Codeception\Actor;

abstract class Widget
{
    /**
     * The actor.
     *
     * @var \Codeception\Actor
     */
    protected $I;

    /**
     * @var string
     *   The field name e.g. body, field_group, etc.
     */
    protected $fieldName;

    /**
     * @param Actor $I
     * @param $name
     * @param $lang
     * @param $pos
     */
    public function __construct(Actor $I, $name, $lang = "und", $pos = 0)
    {
        $this->I = $I;
        $this->fieldName = $name;
        $this->lang = $lang;
        $this->pos = 0;
    }

    public function getFormFieldName()
    {
        return sprintf(
            "%s[%s][%d][value]",
            $this->lang,
            str_replace("_", "-", strtolower($this->fieldName)),
            $this->pos
        );
    }

    public function getFormItemSelector()
    {
        return sprintf(
            ".form-item-%s-%s-%d-value",
            str_replace("_", "-", strtolower($this->fieldName)),
            $this->lang,
            $this->pos
        );
    }

    abstract public function fill($value);
}
