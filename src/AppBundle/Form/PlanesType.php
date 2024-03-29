<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('planeUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('company')
                ->add('planeType')
                ->add('planeNo');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Planes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_planes';
    }


}
