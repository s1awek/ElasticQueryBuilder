<?php
/**
 * Copyright (c) 2013, PHPFluent.
 */
namespace PHPFluent\ElasticQueryBuilder;

/**
 * A json builder
 *
 * @author Kinn Coelho Julião <kinncj@gmail.com>
 */
class Query
{
    /**
     * Create nested objects and set its value
     *
     * @param string $field The attribute
     * @param mixed  $value The value
     *
     * @return Query $this->$field;
     */
    public function __call($field, $value)
    {
        $data = new self;
        if (count($value) > 0) {
            $data = $value[0];
        }

        if ( ! isset($this->$field)) {
            $this->$field = $data;
        }

        return $this->$field;
    }

    /**
     * Serialize to JSON
     *
     * @return string $this
     */
    public function __toString()
    {
        return json_encode($this);
    }
}
