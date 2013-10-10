<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

use Tms\Bundle\FaqClientBundle\Model\ConsumerSearch;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class ConsumerSearchManager extends AbstractManager
{
    /**
     * Insert a ConsumerSearch
     *
     * @param ConsumerSearch $consumerSearch
     * @return boolean
     */
    public function save (ConsumerSearch $consumerSearch)
    {
        $data = $this->faqApi->post($this->getApiURL(), $consumerSearch->toArray() );

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/consumerSearchs.json';
    }
}
