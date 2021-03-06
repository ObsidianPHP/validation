<?php
/**
 * Validation
 * Copyright 2020-2021 ObsidianPHP, All Rights Reserved
 *
 * Website: https://github.com/ObsidianPHP/validation
 * License: https://github.com/ObsidianPHP/validation/blob/master/LICENSE
 */

namespace Obsidian\Validation\Rules;

use Obsidian\Validation\RuleInterface;
use Obsidian\Validation\Validator;

/**
 * Name: `digits`
 *
 * This rule ensures a specific field is a numeric value (string) with the specified length. Usage: `digits:LENGTH`
 */
class Digits implements RuleInterface {
    /**
     * {@inheritdoc}
     * @return bool|string|array
     */
    function validate($value, string $key, array $fields, $options, bool $exists, Validator $validator) {
        if(!$exists) {
            return false;
        }
        
        if(!\is_numeric($value) || \mb_strlen(((string) $value)) !== ((int) $options)) {
            return array('formvalidator_make_digits', array('{0}' => $options));
        }
        
        return true;
    }
}
