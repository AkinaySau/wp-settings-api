<?php


namespace Sau\WP\SettingsAPI\Fields;


class TextField extends SettingsField
{

    public function render()
    {
        echo sprintf(
            '<input name="%1$s" value="%2$s" type="text" %3$s/>',
            $this->getId(),
            $this->getValue(),
            $this->getArgsAsString()
        );
    }
}
