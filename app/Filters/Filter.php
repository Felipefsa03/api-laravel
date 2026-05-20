<?php

namespace App\Filters;

use DeepCopy\Exception\PropertyException;
use Exception;
use Illuminate\Http\Request;

abstract class Filter
{
    protected array $allowedOperetorsFields = [];


    protected array $transalateOperetorsFields = [
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
        'eq' => '=',
        'ne' => '!=',
        'in' => 'in'
    ];

    public function filter (Request $request){
        $where = [];
        $whereIn = [];

        if(empty($this->allowedOperetorsFields)){
            throw new PropertyException("Property allowedOperetorsFields is empty");
        }

        foreach($this->allowedOperetorsFields as $param => $operators){
            $queryOperator = $request->query($param);
            
            if($queryOperator){
                // var_dump($queryOperator);
                foreach($queryOperator as $operator => $value){
                    if(!in_array($operator, $operators)){
                        throw new Exception("{$param} does not have {$operator} operator");

                    }


                    if(str_contains($value, '[')){
                        $whereIn[] = [
                            $param,
                            explode(',',str_replace(['[', ']'],['',''], $value)),
                            $value
                        ];
                    }else{
                        $where[]= [
                            $param,
                            $this->transalateOperetorsFields[$operator],
                            $value
                        ];
                    }              
                }
            }
        }

        if(empty($where) && empty($whereIn)){
            return [];
        }

        return [
            'where' => $where,
            'whereIn' => $whereIn
        ];

    }
}