<?php
	namespace Metatag;

	use Metatag\Plugin\MetatagPlugin;

	/**
	 * Provides a (very) thin wrapper to meta value specific methods of the MetatagPlugin class.
	 */
	class Metatag {
		public static function get($key, $def = null, $includeGetGlobal = true) {
			$inst = MetatagPlugin::getInstance();

			if ($inst->metaContainsKey($key))
				return MetatagPlugin::getInstance()->metaGet($key);

			if ($includeGetGlobal && array_key_exists($key, $_GET))
				return $_GET[$key];

			return $def;
		}

		public static function has($key) {
			return MetatagPlugin::getInstance()->metaHas($key);
		}

		public static function getAll() {
			return MetatagPlugin::getInstance()->metaGetAll();
		}
	}
?>