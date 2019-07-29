<?php


namespace Sau\WP\SettingsAPI\Exceptions;

class SelectFieldEmptyOptionsException extends BaseException
{
    public function __construct($field_id, $section_id, $page)
    {
        parent::__construct(
            sprintf('In %3$s(page)->%2$s(section)->%1$s(field) options is empty', $field_id, $section_id, $page)
        );
    }
}
