<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:51
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


use Codeception\TestCase\Shared\Actor;

class Text extends Widget
{
    public function fill($value)
    {
        $this->I->fillField($this->name, $value);
    }
}
