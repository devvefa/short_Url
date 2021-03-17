<?php

namespace App\Form;

use App\Entity\Url;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType ;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrlType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('urlHash', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('is_active', ChoiceType::class, [
                'choices' => [
                    'Hayır' => false,
                    'Evet' => true,],
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('user_id', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('click_count', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('is_public', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group '
                ]
            ])
            ->add('expired_at',DateTimeType::class, array(
                'required' => true,
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker',

                    'html5' => false,
                ],
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Url::class,
        ]);
    }
}
