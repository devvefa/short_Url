<?php

namespace App\Form;

use App\Entity\Setting;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3 mr-3'
                ]
            ])
            ->add('keywords', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('description', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('company', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('address', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('phone', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('fax', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('email', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('smtpserver', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('smtpemail', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('smtppassword', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('smtpport', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('facebook', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('instagram', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])
            ->add('twitter', TextType::class, [
                'row_attr' => [
                    'class' => 'col-xs-3 mr-3'
                ]
            ])

            ->add('aboutus', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))
            ->add('contact', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))

            ->add('reference', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                    //...
                ),
            ))
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'True' => 'True',
                    'False' => 'False'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Setting::class,
        ]);
    }
}
