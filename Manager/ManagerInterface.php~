<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */

interface ManagerInterface
{
    /**
     * Find all the object for the given parameters
     *
     * @param array $parameters An array of parameters used to filter results
     * @return array
     */
    public function findAll (array $parameters = array());

    /**
     * Find an object by his id
     *
     * @param int $id Object identifier
     * @return mixed
     */
    public function findOneById ($id);

    /**
     * Find the first object corresponding to the parameters
     *
     * @param array $parameters An array of parameters used to filter results
     * @return mixed
     */
    public function findOneBy (array $parameters);

    /**
     * Return the URL of the api for a collection of object
     *
     * @return string
     */
    public function getApiURL ();

    /**
     * Return the URL of the api for an object
     *
     * @return string
     */
    public function getObjectApiURL ();

    /**
     * Return the api response format
     *
     * @return string
     */
    public function getApiFormat ();
}
