<?php
/**
 * Created by PhpStorm.
 * User: danie
 * Date: 12/12/2018
 * Time: 22:09
 */

namespace App\Infrastructure\CommandHandler\Orm\Customer;
use App\Domain\Command\Customer\DeleteCustomerCommand;
use App\Domain\CommandHandler\Customer\DeleteCustomerCommandHandlerInterface;
use App\Infrastructure\Exception\Customer\CustomerNotFoundException;
use App\Infrastructure\Orm\Repository\CustomerRepository;

class DeleteCustomerCommandHandler implements DeleteCustomerCommandHandlerInterface
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param DeleteCustomerCommand $deleteCustomerCommand
     *
     * @throws CustomerNotFoundException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function __invoke(DeleteCustomerCommand $deleteCustomerCommand)
    {
        $customer = $this->customerRepository->findOneBy(['id' => $deleteCustomerCommand->getId()]);

        if (!$customer) {
            throw new CustomerNotFoundException('Customer not found');
        }

        $this->customerRepository->remove($customer);
    }
}