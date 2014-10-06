<?php

namespace Forms\FilterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionCategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questionDomain', 'entity', array('class' => 'FormsFilterBundle:QuestionDomain', 'empty_value' => 'Choose a domain for Questions category', 'required' => false, 'property' => 'domain'))
            ->add('category')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\FilterBundle\Entity\QuestionCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_filterbundle_questioncategory';
    }
}
