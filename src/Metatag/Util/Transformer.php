<?php
	namespace Metatag\Util;

	interface Transformer {
		/**
		 * Checks if the given value can be converted from a string.
		 *
		 * @param  string $val the value to check
		 * @return boolean      true if the value can be converted, false otherwise
		 */
		public function canConvert($val);

		/**
		 * Checks if the given value can be reverted to a string.
		 *
		 * @param  mixed $val the value to check
		 * @return boolean      true if the value can be reverted, false otherwise
		 */
		public function canRevert($val);

		/**
		 * Converts a string to it's represented data type.
		 *
		 * @param  string $val the string to convert
		 * @return mixed      the converted value
		 */
		public function convert($val);

		/**
		 * Transforms a value (one supported by this transformer) to a string.
		 *
		 * @param  mixed $val the value to stringify
		 * @return string      the reverted value
		 */
		public function revert($val);
	}
?>