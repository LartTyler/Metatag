<?php
	namespace Metatag\Util\Transformers;

	use \UnsupportedOperationException;

	use Metatag\Util\Transformer;

	class SerialDataTransformer implements Transformer {
		public function canConvert($val) {
			return is_serialized($val);
		}

		public function canRevert($val) {
			return true;
		}

		public function convert($val) {
			$converted = @unserialize($val);

			if ($val === 'b:0;' || $converted !== false)
				return $converted;

			throw new UnsupportedOperationException(sprintf('Could not unserialize "%s".', $val));
		}

		public function revert($val) {
			return serialize($val);
		}
	}
?>