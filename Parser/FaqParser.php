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
     * @var QuestionCategoryParser
     */
    protected $questionParser;

    /**
     * FaqParser constructor
     *
     * @param ParserInterface $questionCategoryParser
     * @param ParserInterface $questionParser
     */
    public function __construct (ParserInterface $questionCategoryParser, ParserInterface $questionParser)
    {
        $this->questionCategoryParser = $questionCategoryParser;
        $this->questionParser = $questionParser;
    }

    /**
     * {@inheritDoc}
     */
    protected function populateObject ($object, array &$data)
    {
        $arrayMapQuestionCategory = array(); //table of id category <=> entity
        if(isset($data['questionCategories'])) {
            $questionCategories = $this->questionCategoryParser->parse($data['questionCategories'], true, 'array');
            foreach ($questionCategories as $questionCategory) {
                $object->addQuestionCategory($questionCategory);
                $arrayMapQuestionCategory[$questionCategory->getId()] = $questionCategory;
            }

            $this->questionParser->setCategories($arrayMapQuestionCategory);
            
            unset($data['questionCategories']);
        }
        if(isset($data['questions'])) {
            $questionCategories =$object->getQuestionCategories();
            $questions = $this->questionParser->parse($data['questions'], true, 'array');
            foreach ($questions as $question) {
                $listCategories = $question->getQuestionCategories();
                foreach ($listCategories as $category) {
                    $questionCategory = $arrayMapQuestionCategory[$category->getId()];
                    $question->removeQuestionCategory($category);
                    $question->addQuestionCategory($questionCategory);
                }
                $object->addQuestion($question);
            }
            
            unset($data['questions']);
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
