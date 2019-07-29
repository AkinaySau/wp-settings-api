<?php


namespace Sau\WP\SettingsAPI\Fields;


class PageListField extends SettingsField
{
    /**
     * PageListField constructor.
     *
     * @param string $id
     * @param string $title
     */
    public function __construct(string $id, string $title)
    {
        parent::__construct($id, $title);
    }

    public function render()
    {
        $args = [
            'name'     => $this->getId(),
            'selected' => $this->getValue(),
        ];
        wp_dropdown_pages($args);
    }
}
