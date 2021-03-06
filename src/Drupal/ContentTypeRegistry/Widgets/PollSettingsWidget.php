<?php
/**
 * @file
 * Represents a poll settings widget on a Drupal entity form.
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry\Widgets;

/**
 * Class PollSettingsWidget
 *
 * @package Codeception\Module\Drupal\ContentTypeRegistry\Widgets
 */
class PollSettingsWidget extends Widget
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->name = 'Poll module settings';
    }

    // @todo need to make a fill() method that works here.
}
