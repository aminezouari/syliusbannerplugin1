<?php

namespace Black\SyliusBannerPlugin\Entity;
use Sylius\Component\Resource\Model\ResourceInterface;

interface ContentInterface extends ResourceInterface
{
    public function getId();
}
