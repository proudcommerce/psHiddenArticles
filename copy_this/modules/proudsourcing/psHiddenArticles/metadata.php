<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * @copyright (c) Proud Sourcing GmbH | 2015
 * @link www.proudcommerce.com
 * @package psHiddenArticles
 * @version 1.0.0
**/


/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'psHiddenArticles',
    'title'        => 'psHiddenArticles',
    'description'  => array(
        'de' => 'Erm&ouml;glicht das Verstecken von Artikeln in Artikel&uuml;bersichten',
        'en' => 'Hide articles in article lists.',
    ),
    'thumbnail'    => 'logo-ps.jpg',
    'version'      => '1.0.0',
    'author'       => 'Proud Sourcing GmbH',
    'url'          => 'http://www.proudcommerce.com/',
    'email'        => 'support@proudcommerce.com',
	'extend'       => array(
        'oxarticle'     => 'proudsourcing/psHiddenArticles/application/models/pshiddenarticles_oxarticle',
	),
    'files' => array(
        'pshiddenarticles_setup'  => 'proudsourcing/psHiddenArticles/core/pshiddenarticles_setup.php',
        'pshiddenarticles_cron'   => 'proudsourcing/psHiddenArticles/application/controllers/pshiddenarticles_cron.php'
    ),
    'templates' => array(
    ),
    'blocks' => array(
        array(
            'template' => 'article_main.tpl',
            'block'    => 'admin_article_main_form',
            'file'     => "/application/views/admin/blocks/admin_article_main_form.tpl"
        ),
    ),
    'events' => array(
        'onActivate' => 'pshiddenarticles_setup::onActivate',
    ),
);
