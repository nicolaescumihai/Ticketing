<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketDetailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ticketDetailUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('ticketUuid', EntityType::class,[
                    'class'=>'AppBundle:Tickets',
                    'choice_label'=> function ($tickets){
                        return $tickets->getTicketStatus();
                    } ])
                ->add('fromAirportUuid', EntityType::class,[
                    'class'=>'AppBundle:Airports',
                    'choice_label'=> function ($airports){
                        return $airports->getAirportName().' '. $airports->getAirportLocation();
                    } ])
                ->add('toAirportUuid', EntityType::class,[
                    'class'=>'AppBundle:Airports',
                    'choice_label'=> function ($airports){
                        return $airports->getAirportName().' '. $airports->getAirportLocation();
                    } ])
                ->add('passangerDetailUuid', EntityType::class,[
                    'class'=>'AppBundle:Passengers',
                    'choice_label'=> function ($passenger){
                        return $passenger->getFirstName().' '. $passenger->getLastName();
                    } ])
                ->add('boardingDate')
                ->add('boardingTime')
                ->add('airportGateUuid', EntityType::class,[
                    'class'=>'AppBundle:AirportGates',
                    'choice_label'=> function ($airportGates){
                        return $airportGates->getAirportGateNo();
                    } ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TicketDetails'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ticketdetails';
    }


}
