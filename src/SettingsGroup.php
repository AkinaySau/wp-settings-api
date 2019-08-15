<?php


namespace Sau\WP\SettingsAPI;


use Sau\WP\SettingsAPI\Fields\SettingsField;

class SettingsGroup
{
    /**
     * @var string|null
     */
    private $id;
    /**
     * @var string|null
     */
    private $title;
    /**
     * @var array|callable|null
     */
    private $callback;
    /**
     * @var string|null
     */
    private $page;
    /**
     * @var string|null
     */
    private $description;
    /**
     * @var array Registered fields
     */
    private $fields;

    /**
     * SettingsGroup constructor.
     *
     * @param string $id
     * @param string $title
     * @param string $description Use html for render description section
     * @param string $page
     */
    public function __construct(
        string $id,
        string $title,
        string $page = 'general',
        ? $description = null
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->page        = $page;
        $this->callback    = function () {
            if ($this->description) {
                if (is_string($this->description)) {
                    echo $this->description;
                } elseif (is_callable($this->description)) {
                    call_user_func($this->description);
                }
            }
        };
        add_action(
            'admin_init',
            function () {
                add_settings_section($this->id, $this->title, $this->callback, $this->page);
                foreach ($this->getFields() as $field) {
                    $field->add($this->getPage(), $this->getId());
                }
            }
        );
    }

    public function addField(SettingsField $field)
    {
        $this->fields[ $field->getId() ] = $field;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return array|callable|null
     */
    public function getCallback()
    {
        return $this->callback;
    }

    /**
     * @return string|null
     */
    public function getPage(): ?string
    {
        return $this->page;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }


}
