<?php
/**
 * Created by PhpStorm.
 * User: fran
 * Date: 19/02/15
 * Time: 16:33
 */

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InscriptionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('author')
            ->add('keyword')
            ->add('abstract')
            ->add('path')
            ->add('topics', 'entity', array('class'=>'AppBundle:Topic','property'=>'name',
                'multiple'  => true,
                'expanded'=>true,
            ));
////            ->add('save', 'submit', array('label' => 'Submit'));

}
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Article'
        ));
    }
    public function getName()
    {
        return 'article';
    }

}