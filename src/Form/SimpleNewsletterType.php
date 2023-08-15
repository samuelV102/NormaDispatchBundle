<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Form;

use NormaUy\Bundle\NormaDispatchBundle\Entity\Subscriber;
use NormaUy\Bundle\NormaDispatchBundle\EventListener\SubscriberListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SimpleNewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('primaryEmail', EmailType::class, [
                'required' => true,
                'label' => 'E-mail',
            ]);

        $builder->addEventSubscriber(new SubscriberListener());
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscriber::class,
        ]);
    }
}
