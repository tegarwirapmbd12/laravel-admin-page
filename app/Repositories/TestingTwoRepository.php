<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\TestingTwo;
use Illuminate\Database\Eloquent\Collection;

class TestingTwoRepository
{
    public function all(): Collection
    {
        return TestingTwo::all();
    }

    public function find(int|string $id): TestingTwo
    {
        return TestingTwo::findOrFail($id);
    }

    public function create(array $data): TestingTwo
    {
        return TestingTwo::create($data);
    }

    public function update(int|string $id, array $data): TestingTwo
    {
        $item = $this->find($id);
        $item->update($data);

        return $item;
    }

    public function delete(int|string $id): bool
    {
        return (bool) $this->find($id)->delete();
    }
}