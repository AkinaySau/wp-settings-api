<?php


namespace Sau\WP\SettingsAPI\Fields;


class PageListField extends SettingsField
{
    /**
     * PageListField constructor.
     *
     * @param string               $id
     * @param string               $title
     * @param array|null           $args
     * @param string|callable|null $description
     *
     * @todo need merge args
     */
    public function __construct(string $id, string $title, ?array $args = null, $description = null)
    {
        parent::__construct($id, $title, $args, null, $description);
    }

    public function render()
    {
        $args = [
            'name'     => $this->getId(),
            'selected' => $this->getValue(),
        ];
        wp_dropdown_pages($args);
        $this->getDescription();
    }
}
