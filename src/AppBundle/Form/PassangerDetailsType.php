<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PassangerDetailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('passengerDetailUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('passengerUuid', EntityType::class,[
                    'class'=>'AppBundle:Passengers',
                    'choice_label'=> function ($passenger){
                        return $passenger->getFirstName().' '. $passenger->getLastName();
                    } ])
                ->add('planeUuid', EntityType::class,[
                    'class'=>'AppBundle:Planes',
                    'choice_label'=> function ($planes){
                        return $planes->getCompany().' '. $planes->getPlaneType();
                    } ])
                ->add('planeSeatUuid', EntityType::class,[
                    'class'=>'AppBundle:PlaneSeats',
                    'choice_label'=> function ($planeSeats){
                        return $planeSeats->getPlaneSeatName();
                    } ])
                ->add('class', ChoiceType::class, [
                    'choices'  => [
                        'Bussines' => false,
                        'First Class' => true,
                    ],
                    'choice_label' => function ($choice, $key, $value) {
                        if (true === $choice) {
                        }
                        return strtoupper($key);
                    },
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PassangerDetails'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_passangerdetails';
    }


}
