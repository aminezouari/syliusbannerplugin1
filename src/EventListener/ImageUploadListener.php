<?php

namespace Black\SyliusBannerPlugin\EventListener;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ImagesAwareInterface;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Webmozart\Assert\Assert;
final class ImageUploadListener
{
    /**
     * @var ImageUploaderInterface
     */
    private $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function uploadImage(ResourceControllerEvent $event): void
    {
        $banner = $event->getSubject();
        foreach ($banner->getSlides() as $slide){
            foreach ($slide->getTranslations() as $translation){
                if($translation->getImages())
                $this->uploadSubjectImages($translation);
            }
        }

    }
    private function uploadSubjectImages(ImagesAwareInterface $subject): void
    {
        $images = $subject->getImages();
        foreach ($images as $image) {
            if ($image->hasFile()) {
                $this->uploader->upload($image);
            }

            // Upload failed? Let's remove that image.
            if (null === $image->getPath()) {
                $images->removeElement($image);
            }
        }
    }
}
