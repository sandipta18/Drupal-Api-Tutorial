<?php

/**
 * @file
 * Lists available colors and color schemes for the Bones theme.
 */

 /* http://www.apaddedcell.com/how-add-color-module-support-your-drupal-theme */
 /* https://medium.codekoalas.com/integrating-the-color-module-into-your-drupal-8-theme-5e9b32db690d */

$info = [
  // Available colors and color labels used in theme.
  'fields' => [
    'header' => t('Header background'),
    'bg' => t('Main page background'),
    'sidebar' => t('Sidebar background'),
    'footer' => t('Footer background'),
    'text' => t('Text color'),
    'headertext' => t('Header text color'),
    'link' => t('Link color'),
    'buttonbg' => t('Button background color'),
    'buttontext' => t('Button text color'),
  ],
  // Pre-defined color schemes.
  'schemes' => [
    'default' => [
      'title' => t('Defaut Bones light theme'),
      'colors' => [
          'header' => '#ffffff',
          'bg' => '#fdfdfd',
          'sidebar' => '#f8faff',
          'footer' => '#efefef',
          'text' => '#000000',
          'headertext' => '#0f50de',
          'link' => '#0947ce',
          'buttonbg' => '#0748d6',
          'buttontext' => '#f3f3f3',
      ],
    ],
    'dark' => [
      'title' => t('Default Bones dark theme'),
      'colors' => [
          'header' => '#181818',
          'bg' => '#000000',
          'sidebar' => '#131313',
          'footer' => '#272727',
          'text' => '#f3f3f3',
          'headertext' => '#0f50de',
          'link' => '#457fff',
          'buttonbg' => '#004aed',
          'buttontext' => '#ffffff',
      ],
    ],
  ],

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => [
    'css/color.css',
  ],

  // Files to copy.
  'copy' => [
    'logo.svg',
  ],

  // Gradient definitions.
  'gradients' => [
    [
      // (x, y, width, height).
      'dimension' => [0, 0, 0, 0],
      // Direction of gradient ('vertical' or 'horizontal').
      'direction' => 'vertical',
      // Keys of colors to use for the gradient.
      'colors' => ['top', 'bottom'],
    ],
  ],

  // Preview files.
  'preview_library' => 'bones_theme/color.preview',
  'preview_css' => 'color/preview.css',
  'preview_js' => 'color/preview.js',
  'preview_html' => 'color/preview.html',

  // Attachments.
  '#attached' => [
    'drupalSettings' => [
      'color' => [
        // Put the logo path into JavaScript for the live preview.
        'logo' => theme_get_setting('logo.url', 'bones_theme'),
      ],
    ],
  ],
];

$info['css'] = ['/css/color.css'];
