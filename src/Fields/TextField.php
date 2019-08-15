<?php


namespace Sau\WP\SettingsAPI\Fields;


class TextField extends SettingsField
{
    public function __construct(string $id, string $title, ?array $args = null, $description = null)
    {
        $args = array_merge(['type' => 'text'], $args ?? []);
        parent::__construct($id, $title, $args, $description);
    }

    public function render()
    {
        printf(
            '<input name="%1$s" value="%2$s" %3$s/>',
            $this->getId(),
            $this->getValue(),
            $this->getArgsAsString()
        );
        $this->getDescription();
    }
}
