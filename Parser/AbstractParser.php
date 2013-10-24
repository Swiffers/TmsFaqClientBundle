<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

use Tms\Bundle\FaqClientBundle\Exception\FaqApiException;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
abstract class AbstractParser implements ParserInterface
{
    /**
     * {@inheritDoc}
     */
    public function parse($data, $allowMultiple = false, $format = 'json')
    {
        $objects = array();

        // First step : Convert data in an associative array
        switch ($format) {
            case 'json':
                $data = $this->decodeJSON($data);
                break;
        }
        
        // Next step : Parse data
        if ($this->isArray($data)) {
            foreach ($data as $object) {
                $objects[] = $this->createObject($object);
            }
        } else {
            $objects[] = $this->createObject($data);
        }

        // Last step : Return the parsed object
        return $allowMultiple ? $objects : (count($objects) ? $objects[0]: null);
    }



    /**
     * Convert an json string in an associative array
     * 
     * @param  string $data Object data
     * @return array
     */
    protected function decodeJSON($data)
    {
        var_dump($data);
        if (! ($data = json_decode(html_entity_decode($data, ENT_QUOTES), true))) {
            throw new FaqApiException('decode');
        }
        
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function isArray($data)
    {
        if (is_array($data)) {
            $isArray = true;

            // If a key isn't an integer => it's not an array
            foreach ($data as $key => $value) {
                if (! preg_match('#^[0-9]*$#', $key)) {
                    $isArray = false;
                    break;
                }
            }

            return $isArray;
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function createObject(array $data)
    {
        $className = $this->getClassName();
        $object    = new $className();

        $object = $this->populateObject($object, $data);
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($object, $method)) {
                $object->$method($value);
            }
        }

        return $object;
    }

    /**
     * Method used to populate special fields of the object like Collections or instances of other class.
     * /!\ Unset the fields you have already set
     * 
     * @param  mixed $object Instance of the parsed object
     * @param  array $data   Associative array representing the object
     */
    protected function populateObject($object, array &$data)
    {
        return $object;
    }

    /**
     * Convert an UTC date string in DateTime object
     * 
     * @param  string   $date UTC date string
     * @return DateTime
     */
    protected function convertUTCToDateTime($date)
    {
        $regex = '/^(([0-9]{4})-([0][0-9]|[1][0-2])-([0-2][0-9]|[3][0-1]))T(([0-1][0-9]|[2][0-3]):([0-5][0-9]):([0-5][0-9]))\+(([0-1][0-9]|[2][0-3]):([0-5][0-9]))$/';

        if (preg_match($regex, $date)) {
            return new \DateTime($date);
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function getClassName()
    {
        return '\StdClass';
    }
}

