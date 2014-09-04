<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 14:49
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


use Codeception\Actor;

class SchedulerSettings extends Widget
{
    public function fill(Actor $I, array $value)
    {
        $I->fillField("#edit-publish-on-datepicker-popup-0", $value['publish_on']['date']);
        $I->fillField("#edit-unpublish-on-datepicker-popup-0", $value['unpublish_on']['date']);
    }
}
