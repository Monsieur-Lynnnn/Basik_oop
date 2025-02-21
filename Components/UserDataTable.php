<?php

namespace Components;

use Models\User;

class UserDataTable
{
    public static function render(?array $columns = null): string
    {
        if (empty ($columns)) {
            $columns = User::getColumns();
        }

        $headers = self::getHeaderData($columns);
        $body = self::getBodyData($columns);

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

    protected static function getHeaderData(array $columns): string
    {
        $headers = '';

        foreach ($columns as $column) {
            $headers .= "<th>{$column}</th>";
        }

        return $headers;
    }

    protected static function getBodyData(array $columns): string
    {
        $body = '';

        $userModel = new User();
        $users = $userModel->query()->select($columns)->get();

        foreach ($users as $user) {
            $body .= '<tr>';

            foreach ($columns as $column) {
                $body .= "<td>{$user[$column]}</td>";
            }

            $body .= '</tr>';
        }

        return $body;
    }
}