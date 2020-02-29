<?php


namespace Evrinoma\RpnBundle;


use Evrinoma\RpnBundle\DependencyInjection\EvrinomaRpnExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EvrinomaRpnBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaRpnExtension();
        }
        return $this->extension;
    }
}