<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 12/12/2018
 * Time: 22:05
 */

namespace App\Domain\Command\Customer;


class DeleteCustomerCommand
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

}