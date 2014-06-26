<?php
	namespace Metatag;

	use Metatag\Plugin\MetatagPlugin;

	/**
	 * Provides a (very) thin wrapper to meta value specific methods of the MetatagPlugin class.
	 */
	class Metatag {
		public static function get($key, $def = null) {
			return MetatagPlugin::getInstance()->metaGet($key, $def);
		}

		public static function has($key) {
			return MetatagPlugin::getInstance()->metaHas($key);
		}

		public static function getAll() {
			return MetatagPlugin::getInstance()->metaGetAll();
		}
	}
?>