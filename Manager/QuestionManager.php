<?php
namespace Tms\Bundle\FaqClientBundle\Manager;

use Tms\Bundle\FaqClientBundle\Model\Question;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class QuestionManager extends AbstractManager
{
    /**
     * Search a question
     *
     * @param string query
     * @return mixed
     */
    public function search ($query)
    {
        $data = $this->faqApi->get(sprintf($this->getObjectApiURL(), $query), array())->getContent();

        return $this->parser->parse($data, false, $this->getApiFormat());
    }


    /**
     * {@inheritDoc}
     */
    public function getObjectApiURL ()
    {
        return '/questions/search/%s.json';
    }
}
