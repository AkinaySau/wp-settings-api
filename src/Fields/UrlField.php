<?php


namespace Sau\WP\SettingsAPI\Fields;


class UrlField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null)
    {
        $args[ 'type' ] = 'url';
        parent::__construct($id, $title, $args);
    }
}
