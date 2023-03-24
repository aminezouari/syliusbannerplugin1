<?php

declare(strict_types=1);

use Black\SyliusBannerPlugin\EventListener\SlidesRemoveListener;
use Black\SyliusBannerPlugin\EventListener\SlidesUploadListener;
use Black\SyliusBannerPlugin\EventListener\SlidesTranslationRemoveListener;
use Black\SyliusBannerPlugin\EventListener\SlidesTranslationUploadListener;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    // $services
    //     ->set('black_sylius_banner.listener.slides_upload', SlidesUploadListener::class)
    //     ->args([
    //         service('black_sylius_banner.slide_uploader')
    //     ])
    //     ->tag('kernel.event_listener', [
    //         'event' => 'black_sylius_banner.banner.pre_create',
    //         'method' => 'uploadSlides'
    //     ])
    //     ->tag('kernel.event_listener',[
    //         'event' => 'black_sylius_banner.banner.pre_update',
    //         'method' => 'uploadSlides'
    //     ]);

    // $services
    //     ->set('black_sylius_banner.listener.slides_remove', SlidesRemoveListener::class)
    //     ->args([
    //         service('black_sylius_banner.slide_uploader'),
    //         service('liip_imagine.cache.manager'),
    //         service('liip_imagine.filter.manager')
    //     ])
    //     ->tag('doctrine.event_listener', [
    //         'event' => 'onFlush',
    //         'lazy' => true
    //     ])
    //     ->tag('doctrine.event_listener', [
    //         'event' => 'postFlush',
    //         'lazy' => true
    //     ]);
    $services
        ->set('black_sylius_banner.listener.slidestranslation_upload', SlidesTranslationUploadListener::class)
        ->args([
            service('black_sylius_banner.slidetranslation_uploader')
        ])
        ->tag('kernel.event_listener', [
            'event' => 'black_sylius_banner.banner.pre_create',
            'method' => 'uploadSlidesTranslation'
        ])
        ->tag('kernel.event_listener',[
            'event' => 'black_sylius_banner.banner.pre_update',
            'method' => 'uploadSlidesTranslation'
        ]);

    $services
        ->set('black_sylius_banner.listener.slidestranslation_remove', SlidesTranslationRemoveListener::class)
        ->args([
            service('black_sylius_banner.slidetranslation_uploader'),
            service('liip_imagine.cache.manager'),
            service('liip_imagine.filter.manager')
        ])
        ->tag('doctrine.event_listener', [
            'event' => 'onFlush',
            'lazy' => true
        ])
        ->tag('doctrine.event_listener', [
            'event' => 'postFlush',
            'lazy' => true
        ]);
};
