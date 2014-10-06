<?php

namespace Forms\FormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Forms\QuestionBundle\Form\TextQType;
use Forms\QuestionBundle\Form\QcmQType;
use Forms\FilterBundle\Form\FormTimeType;

class FormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('category', 'entity', array('class' => 'FormsFilterBundle:FormCategory', 'property' => 'category'))
            ->add('length', new FormTimeType(), array('required' => false))
            ->add('textq', 'collection', array('type' => new TextQType(), 'by_reference' => false, 'allow_add' => true, 'allow_delete' => true, 'label' => false))
            ->add('qcmq', 'collection', array('type' => new QcmQType(), 'by_reference' => false, 'allow_add' => true, 'allow_delete' => true, 'label' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forms\FormBundle\Entity\Form'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forms_formbundle_form';
    }
}
