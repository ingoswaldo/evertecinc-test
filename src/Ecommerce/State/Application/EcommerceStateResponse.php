<?php
declare(strict_types = 1);

namespace Src\Ecommerce\State\Application;


use Src\Ecommerce\Country\Domain\EcommerceCountryId;
use Src\Shared\Application\Response;

class EcommerceStateResponse extends Response
{

    /**
     * @var EcommerceCountryId
     */
    private $countryId;

    /**
     * @var string
     */
    private $name;

    /**
     * EcommerceStateResponse constructor.
     * @param  int     $id
     * @param  int     $countryId
     * @param  string  $name
     * @param  string  $created_at
     * @param  string  $updated_at
     */
    public function __construct(int $id, int $countryId, string $name, string $created_at, string $updated_at)
    {
        parent::__construct($id, $created_at, $updated_at);

        $this->countryId = new EcommerceCountryId($countryId);
        $this->name = $name;
    }

    public function toArray(): array
    {
        return [
            'id'         => $this->getId(),
            'country_id' => $this->getCountryId()->getValue(),
            'name'       => $this->getName(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt()
        ];
    }

    public static function fromArray(array $data): Response
    {
        return new self(
            $data[ 'id' ],
            $data[ 'country_id' ],
            $data[ 'name' ],
            $data[ 'created_at' ],
            $data[ 'updated_at' ],
        );
    }

    /**
     * @return EcommerceCountryId
     */
    public function getCountryId(): EcommerceCountryId
    {
        return $this->countryId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}