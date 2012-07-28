<?php

namespace M2c\AlmacenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;


class CajaFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('secciones', 'entity', array(
            //'multiple' => true,
            'empty_value' => 'Choose an option',
            'required' => false,
            'class' => 'M2c\\AlmacenBundle\\Entity\\Seccion',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.nombre', 'ASC');
            },
        ));

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
/*        $resolver->setDefaults(array(
            'data_class' => 'M2c\AlmacenBundle\Entity\Seccion'
        ));
*/
    }

    public function getName()
    {
        return 'm2c_almacenbundle_cajafiltertype';
    }
}
