<?php

namespace Shiroyuki\DB\Traits;

trait HasTableName
{
    protected string $table;

    protected array $columns = [];

    /**
     * Mengatur nama Tabel secara otomatis.
     *
     * @return void
     */
    protected function setAutomaticTableName(): void
    {
        $this->table = strtolower((new \ReflectionClass($this))->getShortName());
    }

    /**
     * Mengambil nama Tabel.
     *
     * @return string
     */
    public function getTableName(): string
    {
        return $this->table;
    }

    /**
     * Mengambil nama kolom yang ada pada Tabel.
     *
     * @return array
     */
    public static function getColumns(): array
    {
        return (new static())->columns;
    }
}