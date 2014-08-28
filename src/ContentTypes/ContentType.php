<?php
/**
 * @file
 * Base class for content types.
 */

namespace Codeception\Module\Drupal\ContentTypeRegistry;

/**
 * Class ContentType
 *
 * @package Codeception\Drupal
 */
class ContentType
{
    /**
     * The human-readable name of the content type.
     *
     * @var string
     */
    protected $humanName;

    /**
     * The machine-readable name of the content type.
     *
     * @var string
     */
    protected $machineName;

    /**
     * An array of Field objects representing the fields on this content type.
     *
     * The array is keyed by field machine name.
     *
     * @var Field[]
     */
    protected $fields = array();

    /**
     * Get the content type human name.
     *
     * @return string
     */
    public function getHumanName()
    {
        return $this->humanName;
    }

    /**
     * Set the content type human name.
     *
     * @param string $humanName
     */
    public function setHumanName($humanName)
    {
        $this->humanName = $humanName;
    }

    /**
     * Get the content type machine name.
     *
     * @return string
     */
    public function getMachineName()
    {
        return $this->machineName;
    }

    /**
     * Set the content type machine name.
     *
     * @param string $machineName
     */
    public function setMachineName($machineName)
    {
        $this->machineName = $machineName;
    }

    /**
     * Get all of the fields for this content type.
     *
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Set all of the fields for this content type.
     *
     * @param Field[] $fields
     */
    public function setAllFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Get a field with a specific machine name.
     *
     * @param string $fieldName
     * @return Field|null
     */
    public function getField($fieldName)
    {
        return isset($this->fields[$fieldName]) ? $this->fields[$fieldName] : null;
    }

    /**
     * Set a field on this content type.
     *
     * @param Field $field
     */
    public function setField($field)
    {
        $this->fields[$field->getMachine()] = $field;
    }

    /**
     * Set a group of fields at the same time.
     *
     * @param Field[] $fields
     *   An array of fields. Array keys do not matter.
     */
    public function setFields($fields)
    {
        foreach ($fields as $field) {
            $this->setField($field);
        }
    }

    /**
     * Construct a ContentType by parsing yaml configuration.
     *
     * @param array $yaml
     *   Yaml in a standard format as found in contentTypes.yml.
     * @param array $fields
     *   Yaml for the global fields in a standard format as found in contentTypes.yml.
     *
     * @return ContentType
     *   A fully populated ContentType object.
     */
    public static function parseYaml($yaml, $fields = array())
    {
        $contentType = new ContentType();
        $contentType->setHumanName($yaml['humanName']);
        $contentType->setMachineName($yaml['machineName']);

        if (isset($yaml['fields'])) {
            foreach ($yaml['fields'] as $key => $fieldData) {

                if ($key == 'globals') {
                    // Handle the list of global fields specially.
                    $fields = Field::parseGlobalFields($fieldData, $fields);
                    $contentType->setFields($fields);
                } else {
                    // Handle a single field definition.
                    $field = Field::parseYaml($fieldData, $fields);
                    $contentType->setField($field);
                }

            }
        }

        return $contentType;
    }
}
