<?php

namespace AppBundle\Twig;

class DemoExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('strrev', [$this, 'strrevFilter']),
        ];
    }

    public function strrevFilter($in)
    {
        return sprintf('%s - %s', $in, strrev($in));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'demo_extension';
    }
}
