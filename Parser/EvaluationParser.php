<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class EvaluationParser extends AbstractParser
{
    /**
     * {@inheritDoc}
     */
    public function getClassName ()
    {
        return 'Tms\Bundle\FaqClientBundle\Model\Evaluation';
    }
}
