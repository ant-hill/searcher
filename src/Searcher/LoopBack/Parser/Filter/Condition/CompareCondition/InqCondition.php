<?php
/**
 * Created by IntelliJ IDEA.
 * User: unit
 * Date: 15.04.15
 * Time: 18:30
 */

namespace Searcher\LoopBack\Parser\Filter\Condition\CompareCondition;


use Searcher\ArrayUtils;
use Searcher\LoopBack\Parser\Filter\Condition\Exception\InvalidConditionException;
use Searcher\LoopBack\Parser\Filter\FilterCondition;

class InqCondition extends AbstractCondition
{
    public function getOperator()
    {
        return FilterCondition::CONDITION_IN;
    }

    public function build()
    {
        $values = $this->getValue();
        if (!is_array($values)) {
            $values = array($values);
            $this->setValue($values);
        }

        if (!ArrayUtils::isList($values)) {
            throw new InvalidConditionException('values must be an array without hash keys');
        }

        if (empty($values)) {
            throw new InvalidConditionException("values is empty");
        }

        return $this;
    }
}