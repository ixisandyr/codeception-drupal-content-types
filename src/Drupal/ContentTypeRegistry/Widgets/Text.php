<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:51
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


use Codeception\Actor;

class Text extends Widget
{
    public function fill(Actor $I, $value)
    {
        $I->fillField($this->getFormFieldSelector(), $value);
    }
}
