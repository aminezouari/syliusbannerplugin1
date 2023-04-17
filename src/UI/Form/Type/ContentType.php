<?php

namespace Black\SyliusBannerPlugin\UI\Form\Type;

use Black\SyliusBannerPlugin\Entity\Content;
use Black\SyliusBannerPlugin\Entity\SlideTranslationImage;
use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ContentType extends AbstractResourceType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    'label' => 'Text',


                ),))
            ->add('link', TextType::class, [
                'label' => 'Link',

            ])
            ->add('contentType', ChoiceType::class, [
                'choices' => [
                    'Mobile' => 'Mobile',
                    'Desktop' => 'Desktop',
                    'Tablette' => 'Tablette',
                ], 'label' => 'Content type',
                'multiple' => true
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'black_sylius_banner_slide_translation_content';
    }

}
