<?php
namespace RsLogger\formatter;

use RsLogger\MessageInterface;

interface StringFormatterInterface extends FormatterInterface{
    function format(MessageInterface $message):string;
}
