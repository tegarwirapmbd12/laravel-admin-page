<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\TestingThree;
use Illuminate\Database\Eloquent\Collection;

class TestingThreeRepository
{
    public function all(): Collection
    {
        return TestingThree::all();
    }

    public function find(int|string $uuid): TestingThree
    {
        return TestingThree::findOrFail($uuid);
    }

    public function create(array $data): TestingThree
    {
        return TestingThree::create($data);
    }

    public function update(int|string $uuid, array $data): TestingThree
    {
        $item = $this->find($uuid);
        $item->update($data);

        return $item;
    }

    public function delete(int|string $uuid): bool
    {
        return (bool) $this->find($uuid)->delete();
    }
}