<?php
    if (!function_exists('format_money')) {
        function format_money($amount, $decimals = 2)
        {
            $formatted = number_format(abs($amount), $decimals);
            return $amount < 0 ? "({$formatted})" : $formatted;
        }
    }
    function calculatePayroll(array $data, int $ip_month, int $ip_year): array
    {
        // Extract variables from input
        $reg_hours = $data['reg_hours'] ?? 0.0;
        $othour = $data['othour'] ?? 0.0;
        $extra_ot = $data['extra_ot'] ?? 0;
        $present = $data['present'] ?? 0;
        $weekend = $data['weekend'] ?? 0;
        $absent = $data['absent'] ?? 0;
        $leaves = $data['leaves'] ?? 0;
        $holiday = $data['holiday'] ?? 0;
        $late = $data['late'] ?? 0;
        $basic_salary = $data['basic_salary'] ?? 0;
        $gross_salary = $data['gross_salary'] ?? 0;
        $medical = $data['medical'] ?? 0;
        $conveyance = $data['conveyance'] ?? 0;
        $food_allow = $data['food_allow'] ?? 0;
        $allowance = $data['allowance'] ?? 0;
        $ta = $data['ta'] ?? 0;
        $ot_amount = $data['ot_amount'] ?? 0;
        $ot_payment = $data['ot_payment'] ?? 0;
        $attendance_bonus = $data['attendance_bonus'] ?? 0;
        $phone_bill = $data['phone_bill'] ?? 0;
        $transport_allowance = $data['transport_allowance'] ?? 0;
        $absent_deduction = $data['absent_deduction'] ?? 0;
        $advance_deduction = $data['advance_deduction'] ?? 0;
        $incometax = $data['incometax'] ?? 0;
        $lwp = $data['lwp'] ?? 0;
        $lwp_deduct = $data['lwp_deduct'] ?? 0;
        $empcode = $data['empcode'] ?? '';
        $date_of_join = $data['date_of_join'] ?? now();

        $month_days = \Carbon\Carbon::create($ip_year, $ip_month)->daysInMonth;

        $per_day_salary = $gross_salary / $month_days;
        $vstart_date = \Carbon\Carbon::createFromFormat('m/d/Y', str_pad($ip_month, 2, '0', STR_PAD_LEFT) . '/01/' . $ip_year);

        $absent_deduction = ceil($absent * ($basic_salary / $month_days));
        $lwp_deduct = ceil($lwp * ($basic_salary / 30));
        $other_deduction = $data['other_deduction'] ?? 0;
        $other_deduction += $lwp_deduct;

        $v_late_full = 0;
        if ($late > 3) {
            $v_late_reminder = $late % 3;
            $v_late_full = $late - $v_late_reminder;
        }

        if ($absent > 0 || $late > 0 || $leaves > 0) {
            $attendance_bonus = 0;
        }

        $ot_rate = $data['ot_rate'] ?? 0;
        $ot_amount = $othour * $ot_rate;
        $total_ot = $ot_amount + $ot_payment;

        $month_name = \Carbon\Carbon::createFromDate($ip_year, $ip_month, 1)->format('F, Y');
        $total_payable_days = $month_days - $absent;

        $per_day_mobile_bill = $phone_bill / $month_days;
        $per_day_transport_bill = $transport_allowance / $month_days;
        $per_day_ta_bill = $ta / $month_days;

        if (\Carbon\Carbon::parse($date_of_join)->gt($vstart_date)) {
            $eligible_days = $month_days - \Carbon\Carbon::parse($date_of_join)->diffInDays($vstart_date);
        } elseif ($empcode == '300051') {
            $eligible_days = 20;
        } else {
            $eligible_days = $month_days;
        }

        $total_payable_days = $eligible_days - $absent;
        $eligible_gross = ceil($per_day_salary * $eligible_days);
        $mobile_bill_deduct = ceil($per_day_mobile_bill * $eligible_days);
        $phone_bill = ceil($per_day_mobile_bill * $eligible_days);
        $transport_allowance = ceil($per_day_transport_bill * $eligible_days);
        $ta = ceil($per_day_ta_bill * $eligible_days);

        $total_earnings = $eligible_gross + $allowance + $ot_amount + $ot_payment + $ta;
        $total_deductions = $absent_deduction + $advance_deduction + $incometax + $other_deduction;
        $net_payable_amount = round($total_earnings - $total_deductions);

        return [
            'empcode' => $empcode,
            'month' => $month_name,
            'eligible_days' => $eligible_days,
            'eligible_gross' => $eligible_gross,
            'ot_amount' => $ot_amount,
            'ot_payment' => $ot_payment,
            'total_ot' => $total_ot,
            'total_earnings' => $total_earnings,
            'total_deductions' => $total_deductions,
            'net_payable_amount' => $net_payable_amount,
            'attendance_bonus' => $attendance_bonus,
            'absent_deduction' => $absent_deduction,
            'lwp_deduct' => $lwp_deduct,
        ];
    }