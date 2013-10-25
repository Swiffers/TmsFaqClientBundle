<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 * @author Benjamin TARDY <benjamin.tardy@tessi.fr>
 */
class FaqManager extends AbstractManager
{
    /**
     * Find the FAQ for a given customerId
     * 
     * @param  string $customerId Customer identifier
     * @param  array  $criteria   Filter criteria
     * @return Faq
     */
    public function findOneByCustomerId ($customerId, array $criteria = array())
    {
        $data = $this->faqApi->get(sprintf($this->getCustomerApiURL(), $customerId), $criteria);

        return $this->parser->parse($data, false, $this->getApiFormat());
    }

    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/faqs.json';
    }

    /**
     * {@inheritDoc}
     */
    public function getObjectApiURL ()
    {
        return '/faqs/%s.json';
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomerApiURL ()
    {
        return '/faqs/customers/%s.json';
    }
}
