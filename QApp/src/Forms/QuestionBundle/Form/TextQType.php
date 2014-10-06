<?php

namespace Forms\QuestionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Forms\AnswerBundle\Form\TextAType;

class TextQType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', 'entity', array('class' => 'FormsFilterBundle:QuestionCategory', 'property' => 'category', 'empty_value' => '(Facultatif)', 'required' => false))
            ->add('question', 'textarea')
            ->add('textA', new TextAType(), array('label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\QuestionBundle\Entity\TextQ'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_questionbundle_textq';
    }
}
