<?php
    if (!function_exists('format_money')) {
        function format_money($amount, $decimals = 2)
        {
            $formatted = number_format(abs($amount), $decimals);
            return $amount < 0 ? "({$formatted})" : $formatted;
        }
    }
    