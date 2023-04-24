<?php

namespace Black\SyliusBannerPlugin\UI\Form\Type;

use Black\SyliusBannerPlugin\Entity\SlideTranslationImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

final class SlideTranslationImageType extends ImageType
{
    public function __construct()
    {
        parent::__construct(SlideTranslationImage::class);
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('device', ChoiceType::class, [
            'label' => 'Devices',
            'multiple'=>true,
            'choices' => [
                'Mobile' => 'Mobile',
                'Desktop' => 'Desktop',
                'Tablette' => 'Tablette',
            ],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'black_sylius_banner_slide_translation_image';
    }

}
