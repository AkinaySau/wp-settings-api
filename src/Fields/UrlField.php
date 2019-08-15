<?php


namespace Sau\WP\SettingsAPI\Fields;


class UrlField extends TextField
{
    public function __construct(string $id, string $title, ?array $args = null, $description = null)
    {
        $args = array_merge(['type' => 'url'],$args??[]);
        parent::__construct($id, $title, $args, $description);
    }
}
