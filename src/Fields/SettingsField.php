<?php


namespace Sau\WP\SettingsAPI\Fields;


abstract class SettingsField
{

    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $page;
    /**
     * @var string
     */
    private $section;
    /**
     * @var array
     */
    private $args;

    public function __construct(string $id, string $title, ?array $args = null)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->args  = $args ?? [];
    }

    public function add(string $page, string $section)
    {

        $this->page    = $page;
        $this->section = $section;
        add_settings_field($this->id, $this->title, [$this, 'render'], $this->page, $this->section, $this->args);
        register_setting($this->page, $this->id);
    }

    abstract public function render();

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @return string
     */
    public function getSection(): string
    {
        return $this->section;
    }

    /**
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    public function getValue()
    {
        return get_option($this->getId());
    }

    public function getArgsAsString(): string
    {
        $params = [];
        foreach ($this->getArgs() as $key => $val) {
            if ( ! $val) {
                $params [] = $key;
            } else {
                $params [] = sprintf('%s="%s"', $key, $val);
            }
        }

        return implode(" ", $params);
    }
}
