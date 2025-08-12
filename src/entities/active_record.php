<?php

namespace BD;

interface ActiveRecord
{

    public function save(): \mysqli_result|bool;
    public function delete(): \mysqli_result|bool;
    public static function find($id): Object;
    public static function findall(): array;
}
