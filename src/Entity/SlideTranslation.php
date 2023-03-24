<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;

/**
 * @ORM\Entity
 */
class SlideTranslation extends AbstractTranslation implements SlideTranslationInterface
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    public ?int $id;

    public ?string $content = null;

    /**file name*/    
    public ?\SplFileInfo $file = null;

    public function getFile(): ?\SplFileInfo
    {
        return $this->file;
    }

    public function setFile(?\SplFileInfo $file): void
    {
        $this->file = $file;
    }
    public function hasFile(): bool
    {
        return null !== $this->file;
    }
    /**add the path to the translation */

    /**
     * @ORM\Column(type="string",nullable="true")
     */

    public ?string $path = null;

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function hasPath(): bool
    {
        return null !== $this->path;
    }

    
    /**
     * @ORM\Column(type="string")
     */
    public ?string $link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }
}
