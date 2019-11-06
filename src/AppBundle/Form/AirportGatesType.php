<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AirportGatesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('airportGateUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('airportUuid', EntityType::class,[
                    'class'=>'AppBundle:Airports',
                    'choice_label'=> function ($airports){
                        return $airports->getAirportName();
                    }  ])
                ->add('airportGateNo');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AirportGates'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_airportgates';
    }


}
