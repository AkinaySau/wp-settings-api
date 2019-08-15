<?php


namespace Sau\WP\SettingsAPI\Fields;


class UrlField extends TextField
{

    public function __construct(string $id, string $title, ?array $args = null)
    {
        $args[ 'type' ] = 'url';
        parent::__construct($id, $title, $args);
    }

    public function render()
    {
        echo sprintf(
            '<input name="%1$s" value="%2$s" %3$s/>',
            $this->getId(),
            $this->getValue(),
            $this->getArgsAsString()
        );
    }
}
