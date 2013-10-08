<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
interface ParserInterface
{
    /**
     * Parse an object from mixed sources
     *
     * @param mixed $data Object data
     * @param boolean $allowMultiple Parse the first object only or all the object in the array
     * @param string $format Format of the data (json, array, ...)
     * @return mixed
     */
    public function parse ($data, $allowMultiple = false, $format = 'json');

    /**
     * Check if data is an single object ok a collection of object
     *
     * @param mixed $data Object Data
     * @return boolean
     */
    public function isArray ($data);

    /**
     * Create an instance of the parsed object.
     *
     * @param array $data Associative array representing the object
     * @return boolean
     */
    public function createObject (array $data);

    /**
     * get the class name of the parsed object
     *
     * @return string
     */
    public function getClassName ();
}
