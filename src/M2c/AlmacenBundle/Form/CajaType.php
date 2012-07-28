<?php

namespace M2c\AlmacenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('referencia')
            ->add('base')
            ->add('ancho')
            ->add('alto')
            ->add('categoria')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'M2c\AlmacenBundle\Entity\Caja'
        ));
    }

    public function getName()
    {
        return 'm2c_almacenbundle_cajatype';
    }
}
