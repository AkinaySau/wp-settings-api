<?php


namespace Sau\WP\SettingsAPI\Fields;


class PasswordField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null, $description = null)
    {
        $args = array_merge(['type' => 'password'],$args??[]);
        parent::__construct($id, $title, $args, $description);
    }
}
