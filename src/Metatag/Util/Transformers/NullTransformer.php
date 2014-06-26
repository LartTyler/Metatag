<?php
	namespace Metatag\Util\Transformers;

	use \UnsupportedOperationException;

	use Metatag\Util\Transformer;

	class NullTransformer implements Transformer {
		public function canConvert($val) {
			return $val === 'null';
		}

		public function canRevert($val) {
			return $val === null;
		}

		public function convert($val) {
			if (strtolower($val) === 'null')
				return null;

			throw new UnsupportedOperationException(sprintf('Cannot convert "%s" to null!', $val));
		}

		public function revert($val) {
			if ($val === null)
				return 'null';

			throw new UnsupportedOperationException(sprintf('Cannot revert "%s" to a string!', $val));
		}
	}
?>