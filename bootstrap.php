<?php
	/**
	 * Plugin Name: Metatag
	 * Description: Allows metadata to be defined in pages / posts and then used in template files
	 * Author: Tyler Lartonoix / Daybreak Studios
	 * Version: 1.0.0
	 */

	$loader = require 'vendor/autoload.php';
	$loader->addPsr4('Metatag\\', __DIR__ . '/src/Metatag');

	use Metatag\Plugin\MetatagPlugin;

	MetatagPlugin::init();
?>