<?php
/**
 * Created by PhpStorm.
 * User: yg
 * Date: 7/17/17
 * Time: 5:59 PM
 */

namespace AppSkeleton\Entity;

/**
 * @Entity
 * @Table
 */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(length=140)
     */
    private $username;
}