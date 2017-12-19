<?php

namespace AppBundle\Twig;

class ClassnameTwigExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'classname' => new \Twig_SimpleFunction('classname', array($this, 'getClass'))
        );
    }

    public function getName()
    {
        return 'classname_twig_extension';
    }

    public function getClass($object)
    {
        return (new \ReflectionClass($object))->getShortName();
    }
}