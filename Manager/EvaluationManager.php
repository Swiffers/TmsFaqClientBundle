<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

use Tms\Bundle\FaqClientBundle\Model\Evaluation;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class EvaluationManager extends AbstractManager
{
    /**
     * Insert an Evaluation
     *
     * @param Evaluation $evaluation
     * @return boolean
     */
    public function save (Evaluation $evaluation)
    {
        $data = $this->faqApi->post($this->getApiURL(), $evaluation->toArray() );

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getApiURL ()
    {
        return '/evaluations.json';
    }
}
