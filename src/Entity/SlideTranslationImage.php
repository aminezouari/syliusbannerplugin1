<?php

namespace Black\SyliusBannerPlugin\Entity;

use Sylius\Component\Core\Model\Image;

class SlideTranslationImage extends Image
{
    private array $device = [];
    private string $imagePath;

    public function getSlideTranslation(): ?SlideTranslationInterface
    {
        /** @var SlideTranslationInterface|null $slideTranslation */
        $slideTranslation = $this->getOwner();

        return $slideTranslation;
    }

    /**
     * {@inheritdoc}
     */
    public function setSlideTranslation(?SlideTranslationInterface $slideTranslation): void
    {
        $this->setOwner($slideTranslation);
    }

    public function getImagePath()
    {
        return '/media/image/' . $this->getPath();
    }

    public function getDevice()
    {
        return $this->device;
    }
    public function setDevice($device){
        $this->device = $device;
    }

}
