<?php
namespace RsLogger\formatter;

use RsLogger\MessageInterface;

interface FormatterInterface{
    function format(MessageInterface $message);
}

