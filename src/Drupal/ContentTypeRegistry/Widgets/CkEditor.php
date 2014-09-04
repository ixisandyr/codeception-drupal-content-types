<?php
/**
 * Created by PhpStorm.
 * User: arigby
 * Date: 04/09/2014
 * Time: 11:51
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;


use Codeception\Actor;

class CkEditor extends Widget
{
    public function fill(Actor $I, $value)
    {
        $sel = $this->getFormItemSelector();

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

    protected function getFormItemSelector()
    {
        return sprintf(
            ".form-item-%s-%s-%d-value",
            str_replace("_", "-", strtolower($this->field->getMachine())),
            $this->lang,
            $this->pos
        );
    }
}
