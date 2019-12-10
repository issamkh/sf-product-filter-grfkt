<?php
/**
 * Created by PhpStorm.
 * User: issam
 */

namespace App\Data;


use App\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

class SearchData
{


    /**
     * @var int
     *
     */
    public $page = 1;

    /**
     * @var string
     */
    public $q = '';

    /**
     * @var Category[]
     */
    public $categories = [];

    /**
     * @var null|integer
     * @Assert\GreaterThan(propertyPath="min")
     */
    public $max;

    /**
     * @var null|integer
     * @Assert\LessThan(propertyPath="max")
     */
    public $min;


    /**
     * @var boolean
     */
    public $promo = false;


}