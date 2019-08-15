<?php


namespace Sau\WP\SettingsAPI\Fields;


class PasswordField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null)
    {
        $args[ 'type' ] = 'password';
        parent::__construct($id, $title, $args);
    }
}
