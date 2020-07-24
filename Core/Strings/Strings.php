<?php
/**
 * File Name    : Strings.php
 * Author       : Steven O'Driscoll
 * Project      : gwb-original-artwork
 */

namespace Core\Strings;

/**
 * This is just a class that we can use to manipulate strings.
 *
 * Class Strings
 * @package Core\Strings
 */
class Strings
{
	public function __construct() {}

	/**
	 * The point here is just to convert the string to pascal case.
	 * (e.g. funWithStrings = FunWithStrings)
	 *
	 * @param $string
	 *
	 * @return mixed
	 */
	public static function convertToPascalCase($string)
	{
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}

	/**
	 * The point here is to make sure that it's camalcase.
	 * (e.g. fun-with-strings = funWithStrings)
	 * @param $string
	 *
	 * @return string
	 */
	public static function convertToCamelCase($string)
	{
		/*
		 * reusing the convertToPascalCase function, but making
		 * the first letter lower-case.
		 */
		return lcfirst(self::convertToPascalCase($string));
	}

    /**
     * So mainly here, we're taking everything in the url
     * that is a query string and making it something that
     * we can work with.
     * Since everything after the .com is a query string,
     * this is a pretty important function.
     *
     * @param $url
     *
     * @return string
     */
    public static function removeQueryStringVariables($url)
    {
        if ($url !== '')
        {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false)
            {
                $url = $parts[0];
            }
            else
            {
                $url = '';
            }
        }

        return $url;
    }

	public static function render($msg)
	{
		echo $msg;
	}
}