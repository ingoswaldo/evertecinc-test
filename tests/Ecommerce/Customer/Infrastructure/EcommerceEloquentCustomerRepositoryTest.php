<?php


namespace Tests\Ecommerce\Customer\Infrastructure;


use App\Models\User;
use Src\Ecommerce\Customer\Domain\EcommerceCustomerEntity;
use Src\Ecommerce\Customer\Infrastructure\EcommerceEloquentCustomerRepository;
use Tests\Ecommerce\Customer\Domain\EcommerceCustomerIdMother;
use Tests\Ecommerce\Customer\Domain\EcommerceCustomerMother;
use Tests\Shared\Infrastructure\InfrastructureTestCase;

class EcommerceEloquentCustomerRepositoryTest extends InfrastructureTestCase
{

    /**
     * @test
     */
    public function it_should_save_a_valid_customer()
    {
        $customer = EcommerceCustomerMother::random();

        $this->createCustomer($customer);
        $this->assertDatabaseHas('users', ['email' => $customer->getEmail()]);
    }

    /**
     * @test
     */
    public function it_should_find_a_customer()
    {
        $expected = $this->createCustomer(EcommerceCustomerMother::random());
        $customer = $this->repository()->find(EcommerceCustomerIdMother::create($expected[ 'id' ]));

        $this->assertEquals($expected[ 'email' ], $customer[ 'email' ]);
    }

    /**
     * @test
     */
    public function it_should_update_a_customer()
    {
        $customer = $this->createCustomer(EcommerceCustomerMother::random());
        $expected = EcommerceCustomerMother::random();

        $response = $this->repository()->update(
            EcommerceCustomerIdMother::create($customer[ 'id' ]),
            $expected
        );

        $this->assertEquals($expected->getEmail(), $response[ 'email' ]);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function it_should_delete_a_customer()
    {
        $customer = $this->createCustomer(EcommerceCustomerMother::random());

        $this->repository()->delete(EcommerceCustomerIdMother::create($customer[ 'id' ]));
        $this->assertSoftDeleted('users', ['id' => $customer[ 'id' ]]);
    }

    /**
     * @return EcommerceEloquentCustomerRepository
     */
    protected function repository(): EcommerceEloquentCustomerRepository
    {
        return new EcommerceEloquentCustomerRepository(new User());
    }

    /**
     * @param  EcommerceCustomerEntity  $customerEntity
     * @return array
     */
    private function createCustomer(EcommerceCustomerEntity $customerEntity): array
    {
        return $this->repository()->save($customerEntity);
    }
}