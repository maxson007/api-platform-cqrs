<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 12/12/2018
 * Time: 22:07
 */

namespace App\Domain\CommandHandler\Customer;

use App\Domain\Command\Customer\DeleteCustomerCommand;

interface DeleteCustomerCommandHandlerInterface
{
    public function __invoke(DeleteCustomerCommand $deleteCustomerCommand);

}