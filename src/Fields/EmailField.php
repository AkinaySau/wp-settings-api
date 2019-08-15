<?php


namespace Sau\WP\SettingsAPI\Fields;


class EmailField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null, $description = null)
    {
        $args = array_merge(['type' => 'email'],$args??[]);
        parent::__construct($id, $title, $args, $description);
    }
}
