<?php
namespace Tms\Bundle\FaqClientBundle\Parser;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqParser extends AbstractParser
{
    /**
     * @var QuestionCategoryParser
     */
    protected $questionCategoryParser;

    /**
     * FaqParser constructor
     *
     * @param ParserInterface $questionCategoryParser
     */
    public function __construct (ParserInterface $questionCategoryParser)
    {
        $this->questionCategoryParser = $questionCategoryParser;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        if(isset($data['questionCategories'])) {
            $questionCategories = $this->questionCategoryParser->parse($data['questionCategories'], true, 'array');
            foreach ($questionCategories as $questionCategory) {
                $object->addQuestionCategory($questionCategory);
                //$questionCategory->SetFaq($object);
            }
            unset($data['questionCategories']);
        }

        return $object;
    }

    /**
     * {@inheritDoc}
     */
    public function getClassName ()
    {
        return 'Tms\Bundle\FaqClientBundle\Model\Faq';
    }
}
