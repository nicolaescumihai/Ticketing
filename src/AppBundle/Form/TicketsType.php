<?php

namespace AppBundle\Form;
use AppBundle\Entity\Uuid;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('ticketUuid', HiddenType::class, ['data'=>Uuid::gen_uuid()])
                ->add('ticketType', ChoiceType::class, [
                    'choices'  => [
                        'One Way' => false,
                        'Return' => true,
                    ],
                    'choice_label' => function ($choice, $key, $value) {
                        if (true === $choice) {
                        }
                        return strtoupper($key);
                    },
                ])
                ->add('ticketStatus', ChoiceType::class, [
                    'choices'  => [
                        'Active' => false,
                        'Canceled' => true,
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
            'data_class' => 'AppBundle\Entity\Tickets'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tickets';
    }


}
