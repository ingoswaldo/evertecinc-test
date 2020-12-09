<?php


namespace Tests\Ecommerce\Order\Infrastructure;


use App\Models\Order;
use Src\Ecommerce\Order\Domain\EcommerceOrderEntity;
use Src\Ecommerce\Order\Infrastructure\EcommerceEloquentOrderRepository;
use Tests\Ecommerce\Order\Domain\EcommerceOrderIdMother;
use Tests\Ecommerce\Order\Domain\EcommerceOrderMother;
use Tests\Shared\Infrastructure\InfrastructureTestCase;

class EcommerceEloquentOrderRepositoryTest extends InfrastructureTestCase
{

    /**
     * @test
     */
    public function it_should_save_a_valid_order()
    {
        $order = EcommerceOrderMother::random();

        $this->createOrder($order);
        $this->assertDatabaseHas('orders', ['customer_email' => $order->getCustomerEmail()]);
    }

    /**
     * @test
     */
    public function it_should_find_an_order()
    {
        $expected = $this->createOrder(EcommerceOrderMother::random());
        $order = $this->repository()->find(EcommerceOrderIdMother::create($expected[ 'id' ]));

        $this->assertEquals($expected[ 'customer_email' ], $order[ 'customer_email' ]);
    }

    /**
     * @test
     */
    public function it_should_update_an_order()
    {
        $customer = $this->createOrder(EcommerceOrderMother::random());
        $expected = EcommerceOrderMother::random();

        $response = $this->repository()->update(
            EcommerceOrderIdMother::create($customer[ 'id' ]),
            $expected
        );

        $this->assertEquals($expected->getCustomerEmail(), $response[ 'customer_email' ]);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function it_should_delete_an_order()
    {
        $order = $this->createOrder(EcommerceOrderMother::random());

        $this->repository()->delete(EcommerceOrderIdMother::create($order[ 'id' ]));
        $this->assertSoftDeleted('orders', ['id' => $order[ 'id' ]]);
    }

    /**
     * @return EcommerceEloquentOrderRepository
     */
    protected function repository(): EcommerceEloquentOrderRepository
    {
        return new EcommerceEloquentOrderRepository(new Order());
    }

    /**
     * @param  EcommerceOrderEntity  $orderEntity
     * @return array
     */
    private function createOrder(EcommerceOrderEntity $orderEntity): array
    {
        return $this->repository()->save($orderEntity);
    }
}