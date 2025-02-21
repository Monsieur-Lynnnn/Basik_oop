<?php

namespace Shiroyuki\Components;

use Shiroyuki\DB\Model;

abstract class DataTable
{
    /**
     * Sebuah instance dari model yang akan digunakan untuk mengambil data.
     *
     * @var Model
     */
    protected Model $modelInstance;

    /**
     * Mengembalikan data dalam bentuk HTML.
     *
     * @param  array|null $columns
     * @return string
     */
    public static function render(?array $columns = null): string
    {
        // Membuat instance dari class yang memanggil method ini, dikarenakan
        // adanya perbedaan metode pemasangan property untuk class static dan
        // class instance.
        $instance = new static();
        $modelInstance = $instance->modelInstance;

        // Jika tidak ada kolom yang diberikan, maka kita akan menggunakan
        // seluruh kolom yang ada pada model.
        if (empty ($columns)) {
            $columns = $modelInstance::getColumns();
        }

        // Mengambil data header dan body dari model.
        $headers = self::getHeaderData($columns);
        $body = self::getBodyData($modelInstance, $columns);

        return <<<HTML
            <table class="table">
                <thead>
                    <tr>
                        {$headers}
                    </tr>
                </thead>
                <tbody>
                    {$body}
                </tbody>
            </table>
        HTML;
    }

    /**
     * Mengambil data header dari model.
     *
     * @param  array $columns
     */
    protected static function getHeaderData(array $columns): string
    {
        $headers = '';

        foreach ($columns as $column) {
            $headers .= "<th>{$column}</th>";
        }

        return $headers;
    }

    /**
     * Mengambil data body dari model.
     *
     * @param  Model $instance
     * @param  array $columns
     * @return string
     */
    protected static function getBodyData(Model $instance, array $columns): string
    {
        $body = '';

        $data = $instance
            ->query()
            ->select($columns)
            ->get();

        foreach ($data as $datum) {
            $body .= '<tr>';

            foreach ($columns as $column) {
                $body .= "<td>{$datum[$column]}</td>";
            }

            $body .= '</tr>';
        }

        return $body;
    }
}