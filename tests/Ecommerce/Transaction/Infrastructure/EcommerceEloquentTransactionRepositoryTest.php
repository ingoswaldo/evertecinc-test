<?php


namespace Tests\Ecommerce\Transaction\Infrastructure;


use App\Models\Transaction;
use Src\Ecommerce\Transaction\Domain\EcommerceTransactionEntity;
use Src\Ecommerce\Transaction\Infrastructure\EcommerceEloquentTransactionRepository;
use Tests\Ecommerce\Transaction\Domain\EcommerceTransactionIdMother;
use Tests\Ecommerce\Transaction\Domain\EcommerceTransactionMother;
use Tests\Shared\Infrastructure\InfrastructureTestCase;

class EcommerceEloquentTransactionRepositoryTest extends InfrastructureTestCase
{

    /**
     * @test
     */
    public function it_should_save_a_valid_transaction()
    {
        $transaction = EcommerceTransactionMother::random();

        $this->createTransaction($transaction);
        $this->assertDatabaseHas('transactions', ['total' => $transaction->getTotal()]);
    }

    /**
     * @test
     */
    public function it_should_find_a_transaction()
    {
        $expected = $this->createTransaction(EcommerceTransactionMother::random());
        $transaction = $this->repository()->find(EcommerceTransactionIdMother::create($expected[ 'id' ]));

        $this->assertEquals($expected[ 'total' ], $transaction[ 'total' ]);
    }

    /**
     * @test
     */
    public function it_should_update_a_transaction()
    {
        $transaction = $this->createTransaction(EcommerceTransactionMother::random());
        $expected = EcommerceTransactionMother::random();

        $response = $this->repository()->update(
            EcommerceTransactionIdMother::create($transaction[ 'id' ]),
            $expected
        );

        $this->assertEquals($expected->getTotal(), $response[ 'total' ]);
    }

    /**
     * @test
     * @throws \Exception
     */
    public function it_should_delete_a_transaction()
    {
        $transaction = $this->createTransaction(EcommerceTransactionMother::random());

        $this->repository()->delete(EcommerceTransactionIdMother::create($transaction[ 'id' ]));
        $this->assertSoftDeleted('transactions', ['id' => $transaction[ 'id' ]]);
    }

    /**
     * @return EcommerceEloquentTransactionRepository
     */
    protected function repository(): EcommerceEloquentTransactionRepository
    {
        return new EcommerceEloquentTransactionRepository(new Transaction());
    }

    /**
     * @param  EcommerceTransactionEntity  $orderEntity
     * @return array
     */
    private function createTransaction(EcommerceTransactionEntity $orderEntity): array
    {
        return $this->repository()->save($orderEntity);
    }
}