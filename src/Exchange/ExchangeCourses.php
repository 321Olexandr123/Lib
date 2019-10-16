<?php


namespace Exchange;


use Exchange\State\Concrete\Course;
use Exchange\State\Concrete\Purchase;
use Exchange\State\Concrete\Selling;
use Exchange\State\State;
use Exchange\Utils\ExchangeObjectInterface;

class ExchangeCourses extends Courses
{

    public static function selling()
    {
        $instance = new self();
        $instance->setState(new Selling($instance));
        return $instance;
    }

    public static function purchase()
    {
        $instance = new self();
        $instance->setState(new Purchase($instance));
        return $instance;
    }

    public static function course()
    {
        $instance = new self();
        $instance->setState(new Course($instance));
        return $instance;
    }

    public function execute(ExchangeObjectInterface $in, ExchangeObjectInterface $out)
    {
        return $this->getState()->handle($in, $out);
    }
}