<?hh // strict
/*
 *  Copyright (c) 2004-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace HH\Lib\Regex;

use namespace HH\Lib\Str;

final class Exception extends \Exception {
  public function __construct<T>(Pattern<T> $pattern): void {
    static $errors = dict[
      \PREG_INTERNAL_ERROR => 'Internal error',
      \PREG_BACKTRACK_LIMIT_ERROR => 'Backtrack limit error',
      \PREG_RECURSION_LIMIT_ERROR => 'Recursion limit error',
      \PREG_BAD_UTF8_ERROR => 'Bad UTF8 error',
      \PREG_BAD_UTF8_OFFSET_ERROR => 'Bad UTF8 offset error',
    ];
    parent::__construct(
      Str\format(
        "%s: %s",
        /* HH_IGNORE_ERROR[2049] __PHPStdLib */
        /* HH_IGNORE_ERROR[4107] __PHPStdLib */
        idx($errors, \preg_last_error(), 'Invalid pattern'),
        /* HH_FIXME[4110] Until we have a to_string() function */
        $pattern,
      ),
    );
  }
}
