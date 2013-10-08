<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class EvaluationManager extends AbstractManager
{
    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/evaluations.json';
    }
}
