<?php

/**
 * An extension of the SilverWare services config class to add lightGallery settings to site config.
 */
class LightGalleryConfig extends SilverWareServicesConfig
{
    private static $db = array(
        'LightGalleryCounter' => 'Boolean',
        'LightGalleryDownload' => 'Boolean',
        'LightGalleryAnimation' => 'Varchar(64)',
        'LightGalleryActiveColor' => 'Color'
    );
    
    private static $defaults = array(
        'LightGalleryCounter' => 1,
        'LightGalleryDownload' => 1,
        'LightGalleryAnimation' => 'lg-slide',
        'LightGalleryActiveColor' => '139fda'
    );
    
    /**
     * Updates the CMS fields of the extended object.
     *
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        // Update Field Objects (from parent):
        
        parent::updateCMSFields($fields);
        
        // Create Light Gallery Tab:
        
        $fields->findOrMakeTab(
            'Root.SilverWare.Services.LightGallery',
            _t('LightGalleryConfig.LIGHTGALLERY', 'LightGallery')
        );
        
        // Create Light Gallery Fields:
        
        $fields->addFieldsToTab(
            'Root.SilverWare.Services.LightGallery',
            array(
                ToggleCompositeField::create(
                    'LightGalleryAppearanceOptions',
                    _t('LightGalleryConfig.APPEARANCE', 'Appearance'),
                    array(
                        OptionsetField::create(
                            'LightGalleryAnimation',
                            _t('LightGalleryConfig.ANIMATION', 'Animation'),
                            $this->owner->getLightGalleryAnimationOptions()
                        ),
                        CheckboxField::create(
                            'LightGalleryCounter',
                            _t('LightGalleryConfig.SHOWCOUNTER', 'Show counter')
                        )
                    )
                ),
                ToggleCompositeField::create(
                    'LightGalleryColorOptions',
                    _t('LightGalleryConfig.COLORS', 'Colors'),
                    array(
                        ColorField::create(
                            'LightGalleryActiveColor',
                            _t('LightGalleryConfig.ACTIVETHUMBNAILBORDERCOLOR', 'Active thumbnail border color')
                        )
                    )
                ),
                ToggleCompositeField::create(
                    'LightGalleryDownloadOptions',
                    _t('LightGalleryConfig.DOWNLOAD', 'Download'),
                    array(
                        CheckboxField::create(
                            'LightGalleryDownload',
                            _t('LightGalleryConfig.SHOWDOWNLOADBUTTON', 'Show download button')
                        )
                    )
                )
            )
        );
        
    }
    
    /**
     * Answers the configuration array for the plugin.
     *
     * @return array
     */
    public function getLightGalleryConfigArray()
    {
        // Create Config Array:
        
        $config = array();
        
        // Define Default Selector:
        
        $config['selector'] = "a.image-link.popup";
        
        // Define Appearance Options:
        
        $config['mode'] = $this->owner->LightGalleryAnimation;
        
        $config['counter'] = (boolean) $this->owner->LightGalleryCounter;
        
        // Define Download Options:
        
        $config['download'] = (boolean) $this->owner->LightGalleryDownload;
        
        // Answer Config Array:
        
        return $config;
    }
    
    /**
     * Answers an array of animation options for a dropdown field.
     *
     * @return array
     */
    public function getLightGalleryAnimationOptions()
    {
        return array(
            'lg-slide' => _t('LightGalleryConfig.SLIDE', 'Slide'),
            'lg-fade' => _t('LightGalleryConfig.FADE', 'Fade'),
            'lg-zoom-in' => _t('LightGalleryConfig.ZOOMIN', 'Zoom In'),
            'lg-zoom-in-big' => _t('LightGalleryConfig.ZOOMINBIG', 'Zoom In Big'),
            'lg-zoom-out' => _t('LightGalleryConfig.ZOOMOUT', 'Zoom Out'),
            'lg-zoom-out-big' => _t('LightGalleryConfig.ZOOMOUTBIG', 'Zoom Out Big'),
            'lg-zoom-out-in' => _t('LightGalleryConfig.ZOOMOUTIN', 'Zoom Out In'),
            'lg-zoom-in-out' => _t('LightGalleryConfig.ZOOMINOUT', 'Zoom In Out'),
            'lg-soft-zoom' => _t('LightGalleryConfig.SOFTZOOM', 'Soft Zoom'),
            'lg-scale-up' => _t('LightGalleryConfig.SCALEUP', 'Scale Up'),
            'lg-slide-circular' => _t('LightGalleryConfig.SLIDECIRCULAR', 'Slide Circular'),
            'lg-slide-circular-vertical' => _t('LightGalleryConfig.SLIDECIRCULARVERTICAL', 'Slide Circular Vertical'),
            'lg-slide-vertical' => _t('LightGalleryConfig.SLIDEVERTICAL', 'Slide Vertical'),
            'lg-slide-vertical-growth' => _t('LightGalleryConfig.SLIDEVERTICALGROWTH', 'Slide Vertical Growth'),
            'lg-slide-skew-only' => _t('LightGalleryConfig.SLIDESKEWONLY', 'Slide Skew Only'),
            'lg-slide-skew-only-rev' => _t('LightGalleryConfig.SLIDESKEWONLYREV', 'Slide Skew Only Reversed'),
            'lg-slide-skew-only-y' => _t('LightGalleryConfig.SLIDESKEWONLYY', 'Slide Skew Only Y'),
            'lg-slide-skew-only-y-rev' => _t('LightGalleryConfig.SLIDESKEWONLYYREV', 'Slide Skew Only Y Reversed'),
            'lg-slide-skew' => _t('LightGalleryConfig.SLIDESKEW', 'Slide Skew'),
            'lg-slide-skew-rev' => _t('LightGalleryConfig.SLIDESKEWREV', 'Slide Skew Reversed'),
            'lg-slide-skew-cross' => _t('LightGalleryConfig.SLIDESKEWCROSS', 'Slide Skew X'),
            'lg-slide-skew-cross-rev' => _t('LightGalleryConfig.SLIDESKEWCROSSREV', 'Slide Skew X Reversed'),
            'lg-slide-skew-ver' => _t('LightGalleryConfig.SLIDESKEWVER', 'Slide Skew Vertical'),
            'lg-slide-skew-ver-rev' => _t('LightGalleryConfig.SLIDESKEWVERREV', 'Slide Skew Vertical Reversed'),
            'lg-slide-skew-ver-cross' => _t('LightGalleryConfig.SLIDESKEWVERCROSS', 'Slide Skew Vertical X'),
            'lg-slide-skew-ver-cross-rev' => _t('LightGalleryConfig.SLIDESKEWVERCROSSREV', 'Slide Skew Vertical X Rev'),
            'lg-lollipop' => _t('LightGalleryConfig.LOLLIPOP', 'Lollipop'),
            'lg-lollipop-rev' => _t('LightGalleryConfig.LOLLIPOPREV', 'Lollipop Reversed'),
            'lg-rotate' => _t('LightGalleryConfig.ROTATE', 'Rotate'),
            'lg-rotate-rev' => _t('LightGalleryConfig.ROTATEREV', 'Rotate Reversed'),
            'lg-tube' => _t('LightGalleryConfig.TUBE', 'Tube')
        );
    }
}
