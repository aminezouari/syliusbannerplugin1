<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;
use Sylius\Component\Core\Model\ImagesAwareInterface;


interface SlideTranslationInterface extends TranslationInterface, ResourceInterface,ImagesAwareInterface
{

    public function getLink(): ?string;

    public function setLink(?string $link): void;


}
