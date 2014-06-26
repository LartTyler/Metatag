<?php
	namespace Metatag\Util\Transformers;

	use \UnsupportedOperationException;

	use Metatag\Util\Transformer;

	class BooleanTransformer implements Transformer {
		public function canConvert($val) {
			$val = strtolower($val);

			return $val === 'true' || $val === 'false';
		}

		public function canRevert($val) {
			return is_bool($val);
		}

		public function convert($val) {
			$value = strtolower($val);

			if ($value === 'true')
				return true;
			else if ($value === 'false')
				return false;

			throw new UnsupportedOperationException(sprintf('Cannot convert "%s" to a boolean value!', $val));
		}

		public function revert($val) {
			if ($val === true)
				return 'true';
			else if ($val === false)
				return 'false';

			throw new UnsupportedOperationException(sprintf('Cannot revert "%s" to a string!', $val));
		}
	}
?>