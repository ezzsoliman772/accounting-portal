<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        // KPI totals
        $totals = [
            'invoiced'    => 71300,
            'collected'   => 51750,
            'outstanding' => 19550,
        ];

        $payments = [
            (object) ['id' => 'pay_001', 'date' => '20 Jul 2026', 'client' => 'Ahmed Hassan', 'service_name' => 'Personal / Corporate Tax Support 2025', 'service_id' => 'svc_011', 'amount' => 2000, 'method' => 'Cash', 'attachment' => null, 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_002', 'date' => '18 Jul 2026', 'client' => 'Alexandria Textiles SAE', 'service_name' => 'Quarterly VAT Filing — Q3 2026', 'service_id' => 'svc_007', 'amount' => 2500, 'method' => 'Cheque', 'attachment' => null, 'created_by' => 'Karim Nabil'],
            (object) ['id' => 'pay_003', 'date' => '05 Jul 2026', 'client' => 'Nile Trading Co.', 'service_name' => 'Payroll Compliance Review', 'service_id' => 'svc_005', 'amount' => 1750, 'method' => 'Bank Transfer', 'attachment' => null, 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_004', 'date' => '20 Jun 2026', 'client' => 'Cairo Medical Center', 'service_name' => 'Commercial Registry Renewal 2026', 'service_id' => 'svc_009', 'amount' => 2000, 'method' => 'Bank Transfer', 'attachment' => null, 'created_by' => 'Karim Nabil'],
            (object) ['id' => 'pay_005', 'date' => '05 Jun 2026', 'client' => 'Nile Trading Co.', 'service_name' => 'Annual Financial Statement Preparation', 'service_id' => 'svc_002', 'amount' => 6000, 'method' => 'Cash', 'attachment' => 'cash_receipt_june.jpg', 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_006', 'date' => '04 May 2026', 'client' => 'Ahmed Hassan', 'service_name' => 'Commercial Registry Renewal — Express', 'service_id' => 'svc_015', 'amount' => 2000, 'method' => 'InstaPay', 'attachment' => null, 'created_by' => 'Nour El-Masry'],
            (object) ['id' => 'pay_007', 'date' => '20 Apr 2026', 'client' => 'Nile Trading Co.', 'service_name' => 'Quarterly VAT Filing — Q2 2026', 'service_id' => 'svc_001', 'amount' => 4500, 'method' => 'InstaPay', 'attachment' => 'instapay_nile_apr.png', 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_008', 'date' => '22 Mar 2026', 'client' => 'Cairo Medical Center', 'service_name' => 'Annual Financial Statements 2025', 'service_id' => 'svc_010', 'amount' => 7500, 'method' => 'Cash', 'attachment' => null, 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_009', 'date' => '15 Mar 2026', 'client' => 'Nile Trading Co.', 'service_name' => 'Corporate Tax Return 2025', 'service_id' => 'svc_004', 'amount' => 8000, 'method' => 'Bank Transfer', 'attachment' => null, 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_010', 'date' => '10 Feb 2026', 'client' => 'Cairo Medical Center', 'service_name' => 'Annual Financial Statements 2025', 'service_id' => 'svc_010', 'amount' => 7500, 'method' => 'Bank Transfer', 'attachment' => null, 'created_by' => 'Reda Ragab'],
            (object) ['id' => 'pay_011', 'date' => '12 Jan 2026', 'client' => 'Cairo Medical Center', 'service_name' => 'Payroll Compliance Review — Jan 2026', 'service_id' => 'svc_014', 'amount' => 3500, 'method' => 'Bank Transfer', 'attachment' => null, 'created_by' => 'Youssef Adel'],
            (object) ['id' => 'pay_012', 'date' => '08 Jan 2026', 'client' => 'Alexandria Textiles SAE', 'service_name' => 'Quarterly VAT Filing — Q1 2026', 'service_id' => 'svc_013', 'amount' => 4500, 'method' => 'InstaPay', 'attachment' => null, 'created_by' => 'Youssef Adel'],
        ];

        return view('payments.index', compact('totals', 'payments'));
    }
}
