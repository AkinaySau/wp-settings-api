<?php


namespace Sau\WP\SettingsAPI\Fields;


use Sau\WP\SettingsAPI\Exceptions\SelectFieldEmptyOptionsException;

class SelectField extends SettingsField
{
    /**
     * @var array
     */
    private $options;

    /**
     * SelectField constructor.
     *
     * @param string               $id
     * @param string               $title
     * @param array|null           $args
     * @param array|null           $options
     * @param string|callable|null $description
     */
    public function __construct(
        string $id,
        string $title,
        ?array $args = null,
        ?array $options = null,
        $description = null
    ) {
        $this->options = $options;
        parent::__construct($id, $title, $args, $description);
    }

    public function render()
    {
        $selected = $this->getValue();
        $options  = $this->getOptions();
        if (is_null($options) or ! count($options)) {
            throw new SelectFieldEmptyOptionsException($this->getId(), $this->getSection(), $this->getPage());
        }
        foreach ($options as $val => &$option) {
            $option = sprintf(
                '<option value="%1$s" %3$s>%2$s</option>',
                $val,
                $option,
                $val == $selected ? ' selected' : ''
            );
        }
        printf(
            '<select name="%1$s" %2$s>%3$s</select>',
            $this->getId(),
            $this->getArgsAsString(),
            implode('', $options)
        );
        $this->getDescription();
    }

    /**
     * @return array
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param array $options
     *
     * @return SelectField
     */
    protected function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

}
