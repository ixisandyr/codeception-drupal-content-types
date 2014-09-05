<?php
/**
 * @file
 * Represents a poll choices widget on a Drupal entity form.
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;

/**
 * Class PollChoicesWidget
 *
 * @package Codeception\Module\Drupal\ContentTypeRegistry\Widgets
 */
class PollChoicesWidget extends Widget
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->name = 'Poll choices';
    }

    // @todo need to make a fill() method that works here.
}
