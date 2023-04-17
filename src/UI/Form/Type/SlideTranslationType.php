<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\UI\Form\Type;

use Black\SyliusBannerPlugin\Entity\SlideTranslationImage;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


final class SlideTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('content', CKEditorType::class, array(
//                'config' => array(
//                    'uiColor' => '#ffffff',
//                    //...
//                ),))
            ->add('link', UrlType::class, [
                'label' => 'black_sylius_banner.form.slide.url.label',
                'required' => false,
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => SlideTranslationImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Image',
            ])
            ->add('contents', CollectionType::class, [
                'entry_type' => ContentType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'Content',
            ]);

    }
}
