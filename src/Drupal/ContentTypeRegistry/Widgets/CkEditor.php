<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:51
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


class CkEditor extends Widget
{
    public function fill($value)
    {
        $I = $this->I;

        $sel = $this->getFormItemSelector("und", 0);

        if (!($name = $I->grabAttributeFrom("$sel iframe", "name"))) {
            $name = uniqid();
            $I->executeJs("jQuery('$sel iframe').attr('name', '$name')");
        }
        $I->switchToIframe($name);
        $I->fillField("body", $value);
        // The below crashes phantomjs - was worth a shot.
        //$I->executeJS("window.parent.jQuery('body').html('foo bar')");
        $I->see($value, "body");
        $I->switchToIframe();
    }
}
