<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqManager extends AbstractManager
{
    /**
     * Find a Faq by its id
     *
     * @param integer $id
     * @return Faq
     */
    public function findOneById($id)
    {
        return $this->findOneBy(array("id" => $id));
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
