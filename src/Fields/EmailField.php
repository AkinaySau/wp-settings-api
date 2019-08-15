<?php


namespace Sau\WP\SettingsAPI\Fields;


class EmailField extends SettingsField
{

    public function render()
    {
        echo sprintf(
            '<input name="%1$s" value="%2$s" type="email" %3$s/>',
            $this->getId(),
            $this->getValue(),
            $this->getArgsAsString()
        );
    }
}
