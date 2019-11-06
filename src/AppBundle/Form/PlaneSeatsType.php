<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlaneSeatsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('planeSeatUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('planeUuid', EntityType::class,[
                    'class'=>'AppBundle:Planes',
                    'choice_label'=> function ($planes){
                        return $planes->getCompany().' '. $planes->getPlaneType();
                    } ])
                ->add('planeSeatName')
                ->add('planeSeatStatus', ChoiceType::class, [
                    'choices'  => [
                        'Rented' => false,
                        'Available' => true,
                    ],
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PlaneSeats'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_planeseats';
    }


}
