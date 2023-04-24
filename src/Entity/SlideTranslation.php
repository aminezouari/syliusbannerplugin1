<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\AbstractTranslation;
use Symfony\Component\HttpFoundation\File\File;
use Sylius\Component\Core\Model\ImagesAwareInterface;
use Sylius\Component\Core\Model\ImageInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity
 */
class SlideTranslation extends AbstractTranslation implements SlideTranslationInterface
{

    /** @psalm-suppress PropertyNotSetInConstructor */
    public ?int $id;
    /**
     * @var Collection|ContentInterface[]
     */
    private Collection $contents;

    /**file name*/
    public ?\SplFileInfo $file = null;

    /**
     * @var Collection|ImageInterface[]
     */
    protected $images;

    public function __construct()
    {

        $this->images = new ArrayCollection();
        $this->contents = new ArrayCollection();
    }


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


    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * {@inheritdoc}
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function getImagesByType(string $type): Collection
    {
        return $this->images->filter(function (ImageInterface $image) use ($type) {
            return $type === $image->getType();
        });
    }

    /**
     * {@inheritdoc}
     */
    public function hasImages(): bool
    {
        return !$this->images->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasImage(ImageInterface $image): bool
    {
        return $this->images->contains($image);
    }

    /**
     * {@inheritdoc}
     */
    public function addImage(ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->images->add($image);
    }

    /**
     * {@inheritdoc}
     */
    public function removeImage(ImageInterface $image): void
    {
        if ($this->hasImage($image)) {
            $image->setOwner(null);
            $this->images->removeElement($image);
        }
    }


    public function removeContent(Content $content): void
    {
        if ($this->hasContent($content)) {
            $content->setSlideTranslation(null);
            $this->contents->removeElement($content);
        }
    }

    public function addContent(?Content $content): void
    {
        $this->contents->add($content);
        $content->setSlideTranslation($this);
    }

    public function getContents()
    {
        return $this->contents;
    }

    public function hasContent(Content $content): bool
    {
        return $this->contents->contains($content);
    }
}
