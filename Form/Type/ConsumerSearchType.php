<?php
namespace Tms\Bundle\FaqClientBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
* @author Benjamin TARDY <benjamin.tardy@tessi.fr>
*/
class ConsumerSearchType extends AbstractType
{
    /**
     * form name
     * 
     * @var string
     */
    protected $name;

    /**
     * ConsumerSearchType contructor
     * 
     * @param int $responseId Response id
     */
    public function __construct($responseId) {
        $this->setName($responseId);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
            'data_class'      => 'Tms\Bundle\FaqClientBundle\Model\ConsumerSearch',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answerFound', 'choice', array(
                'choices'  => array( 0, 1 ),
                'expanded' => true,
                'required' => true,
            ))
            ->add('consumerId', 'hidden')
            ->add('responseId', 'hidden', array(
                'required' => true,
            ))
            ->add('searchQuery', 'hidden')
            ->add('save', 'submit');
    }

    public function getParent()
    {
        return "form";
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set form name with and unique identifier
     * 
     * @param int $id unique identifier
     */
    protected function setName($id)
    {
        $this->name = sprintf('faq_consumer_search_%d', $id);
    }
}