<?php
declare(strict_types=1);

namespace Black\SyliusBannerPlugin\UI\Form\Type;

use Black\SyliusBannerPlugin\Entity\BannerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormError;

final class BannerType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->add('name', TextType::class, [
                'label' => 'black_sylius_banner.form.banner.name.label',
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'sylius.ui.enabled',
            ])
            ->add('channels', ChannelChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'label' => 'black_sylius_banner.form.banner.channels.label',
            ])
            ->add('slides', CollectionType::class, [
                'entry_type' => SlideType::class,
                'required' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'black_sylius_banner.form.banner.slides.label',
                'block_name' => 'entry',
            ]);
    }

//    public function configureOptions(OptionsResolver $resolver): void
//    {
//        parent::configureOptions($resolver);
//
//        $resolver->setDefaults([
//            'validation_groups' => function (FormInterface $form): array {
//                /** @var BannerInterface|null $banner */
//                $banner = $form->getData();
//                if ($slides = $banner->getSlides()) {
//                    if ($banner->getName() == null) {
//                        $form->get('name')->addError(new FormError('Name  Cannot be null'));
//                    }
//
//                    if ($banner->getCode() == null) {
//                        $form->get('code')->addError(new FormError('code  Cannot be null'));
//                    }
//                    foreach ($slides as $slide) {
//                        if ($translations = $slide->getTranslations()) {
//                            foreach ($translations as $translation) {
//
//                                if ($contents = $translation->getContents()) {
//                                    if (empty($contents)) {
//                                        $form->get('slides')->addError(new FormError('Contents inside Translations Content Cannot be null'));
//
//                                    }
//                                    foreach ($contents as $content) {
//                                        if (isset($content['link'])
//                                            || $content->getLink() == null) {
//                                            $form->get('slides')->addError(new FormError('Field Link inside Translations Content Cannot be null'));
//                                        }
//                                        if ($content->getText() == null) {
//                                            $form->get('slides')->addError(new FormError('Field Text inside Translations Content Cannot be null'));
//                                        }
//                                        if ($content->getContentType() == null) {
//                                            $form->get('slides')->addError(new FormError('Field Text inside Translations Content Cannot be null'));
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }
//                }
//                return array_merge($this->validationGroups, ['images']);
//
//            },
//
//        ]);
//    }
}
