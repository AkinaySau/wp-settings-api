<?php


namespace Sau\WP\SettingsAPI\Exceptions;

class SelectFieldException extends BaseException
{
    public function __construct($field_id, $section_id, $page)
    {
        parent::__construct(sprintf('Error in %3$s(page)->%2$s(section)->%1$s(field)', $field_id, $section_id, $page));
    }
}
