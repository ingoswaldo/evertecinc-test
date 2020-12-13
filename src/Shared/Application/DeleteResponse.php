<?php
declare(strict_types=1);

namespace Src\Shared\Application;


abstract class DeleteResponse
{

    private $success;

    public function __construct(bool $success = false)
    {
        $this->success = $success;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'success' => $this->success
        ];
    }
}