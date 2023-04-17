<?php

namespace Black\SyliusBannerPlugin\Entity;

class Content implements ContentInterface
{
    private ?int $id;
    private array $contentType;
    private string $text;
    private string $link;
    private ?SlideTranslationInterface $slideTranslation = null;

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function setSlideTranslation(SlideTranslationInterface $slideTranslation)
    {
        $this->slideTranslation = $slideTranslation;
    }

    public function getSlideTranslation(): ?SlideTranslationInterface
    {
        return $this->slideTranslation;
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    public function getContentType(): array
    {
        return $this->contentType;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->link;
    }
}
