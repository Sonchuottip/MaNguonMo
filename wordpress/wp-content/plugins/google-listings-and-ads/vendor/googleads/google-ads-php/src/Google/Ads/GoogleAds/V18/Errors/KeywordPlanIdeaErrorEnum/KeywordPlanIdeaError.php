<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/errors/keyword_plan_idea_error.proto

namespace Google\Ads\GoogleAds\V18\Errors\KeywordPlanIdeaErrorEnum;

use UnexpectedValueException;

/**
 * Enum describing possible errors from KeywordPlanIdeaService.
 *
 * Protobuf type <code>google.ads.googleads.v18.errors.KeywordPlanIdeaErrorEnum.KeywordPlanIdeaError</code>
 */
class KeywordPlanIdeaError
{
    /**
     * Enum unspecified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * The received error code is not known in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Error when crawling the input URL.
     *
     * Generated from protobuf enum <code>URL_CRAWL_ERROR = 2;</code>
     */
    const URL_CRAWL_ERROR = 2;
    /**
     * The input has an invalid value.
     *
     * Generated from protobuf enum <code>INVALID_VALUE = 3;</code>
     */
    const INVALID_VALUE = 3;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::URL_CRAWL_ERROR => 'URL_CRAWL_ERROR',
        self::INVALID_VALUE => 'INVALID_VALUE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeywordPlanIdeaError::class, \Google\Ads\GoogleAds\V18\Errors\KeywordPlanIdeaErrorEnum_KeywordPlanIdeaError::class);

