<?php


namespace Sau\WP\SettingsAPI\Fields;


class PasswordField extends SettingsField
{

    public function render()
    {
        echo sprintf(
            '<input name="%1$s" value="%2$s" type="password" %3$s/>',
            $this->getId(),
            $this->getValue(),
            $this->getArgsAsString()
        );
    }
}
