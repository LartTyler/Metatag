<?php
	namespace Metatag\Plugin;

	use gravitas\pluginbase\PluginBase;

	use Metatag\Util\Transformer;
	use Metatag\Util\Transformers\BooleanTransformer;
	use Metatag\Util\Transformers\NullTransformer;
	use Metatag\Util\Transformers\SerialDataTransformer;

	class MetatagPlugin extends PluginBase {
		private static $instance = null;

		private $transformers = array();
		private $metadata = array();

		private function __construct() {}

		public function onShortcode($attrs) {
			if (is_array($attrs) && isset($attrs['name']))
				$this->metaSet($attrs['name'], isset($attrs['value']) ? $attrs['value'] : true);

			return '';
		}

		public function metaContainsKey($key) {
			return array_key_exists($key, $this->metadata);
		}

		public function metaGet($key, $def = null) {
			if ($this->metaContainsKey($key))
				return $this->metadata[$key];

			return $def;
		}

		public function metaGetAll() {
			return $this->metadata;
		}

		private function metaSet($key, $value) {
			$this->metadata[$key] = $this->metaTransform($value);
		}

		private function metaTransform($value) {
			foreach ($this->transformers as $transformer)
				if ($transformer->canConvert($value))
					return $transformer->convert($value);

			return $value;
		}

		public function addTransformer(Transformer $transformer, $name = null) {
			if ($name === null)
				$name = get_class($transformer);

			$this->transformers[$name] = $transformer;

			return $this;
		}

		public function removeTransformer($name) {
			if (array_key_exists($name, $this->transformers))
				unset($this->transformers[$name]);

			return $this;
		}

		public function clearTransformers() {
			$this->transformers = array();

			return $this;
		}

		public static function init() {
			add_shortcode('meta', array(self::getInstance(), 'onShortcode'));

			self::getInstance()
				->addTransformer(new BooleanTransformer())
				->addTransformer(new NullTransformer())
				->addTransformer(new SerialDataTransformer());

			do_action('metatag.init-transformers', self::getInstance());
		}

		public static function getInstance() {
			if (self::$instance === null)
				self::$instance = new MetatagPlugin();

			return self::$instance;
		}
	}
?>