<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqManager extends AbstractManager
{
    /**
     * Find a faq by its customerId
     *
     * @param int $id Object identifier
     * @return mixed
     */
    public function findOneByCustomerId ($customerId)
    {
        $data = $this->faqApi->get(sprintf($this->getObjectApiURL(), $customerId), array());

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
}
