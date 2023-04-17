<?php

declare(strict_types=1);

use Black\SyliusBannerPlugin\EventListener\ImageUploadListener;
use Black\SyliusBannerPlugin\EventListener\SlideTranslationEventListener;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;
use Sylius\Bundle\CoreBundle\EventListener\ImagesUploadListener;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();



//    $services->set('black_sylius_banner.listener.slide_translation_image_upload', 'Sylius\Bundle\CoreBundle\EventListener\ImagesUploadListener')
//        ->parent('sylius.listener.images_upload')
//        ->public(false)
//        ->tag('kernel.event_listener', [
//            'event' => 'black_sylius_banner.slide_translation.pre_create',
//            'method' => 'uploadImages',
//        ])
//        ->tag('kernel.event_listener', [
//            'event' => 'black_sylius_banner.slide_translation.pre_update',
//            'method' => 'uploadImages',
//        ]);
    $services->set('black_sylius_banner.listener.slide_translation_image_upload', ImageUploadListener::class)
        ->arg('$uploader', service('sylius.image_uploader'))
        ->public(false)
        ->tag('kernel.event_listener', [
            'event' => 'black_sylius_banner.banner.pre_create',
            'method' => 'uploadImage',
        ])
    ->tag('kernel.event_listener', [
        'event' => 'black_sylius_banner.banner.pre_update',
        'method' => 'uploadImage',
    ]);
};
