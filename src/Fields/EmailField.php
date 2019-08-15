<?php


namespace Sau\WP\SettingsAPI\Fields;


class EmailField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null)
    {
        $args[ 'type' ] = 'email';
        parent::__construct($id, $title, $args);
    }
}
