@extends('layouts.app')

@section('title', 'Catalog · Fathalla & Co.')

@section('content')

                 @php
                    $catalogItems = [
                        [
                            'id'                 => 'cat_001',
                            'name'               => 'Quarterly VAT Filing',
                            'arabic_name'        => 'تقديم ضريبة القيمة المضافة ربع السنوية',
                            'category'           => 'Tax Filing',
                            'category_key'       => 'tax_filing',
                            'category_ar'        => 'تقييم الضرائب',
                            'cost'               => 4500,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'Sales invoices, Purchase invoices, Bank statement',
                            'arabic_documents'   => '',
                        ],
                        [
                            'id'                 => 'cat_002',
                            'name'               => 'Annual Financial Statement Preparation',
                            'arabic_name'        => 'إعداد القوائم المالية السنوية',
                            'category'           => 'Financial Reporting',
                            'category_key'       => 'financial_reporting',
                            'category_ar'        => 'التقارير المالية',
                            'cost'               => 12000,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'Trial balance, Asset register, Prior year statements',
                            'arabic_documents'   => '',
                        ],
                        [
                            'id'                 => 'cat_003',
                            'name'               => 'Commercial Registry Renewal',
                            'arabic_name'        => 'تجديد السجل التجاري',
                            'category'           => 'Compliance',
                            'category_key'       => 'compliance',
                            'category_ar'        => 'الامتثال',
                            'cost'               => 2000,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'Current CR copy, Lease contract',
                            'arabic_documents'   => '',
                        ],
                        [
                            'id'                 => 'cat_004',
                            'name'               => 'Corporate Tax Return',
                            'arabic_name'        => 'الإقرار الضريبي للشركات',
                            'category'           => 'Tax Filing',
                            'category_key'       => 'tax_filing',
                            'category_ar'        => 'تقييم الضرائب',
                            'cost'               => 8000,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'Audited financials',
                            'arabic_documents'   => '',
                        ],
                        [
                            'id'                 => 'cat_005',
                            'name'               => 'Payroll Compliance Review',
                            'arabic_name'        => 'مراجعة امتثال كشوف المرتبات',
                            'category'           => 'Compliance',
                            'category_key'       => 'compliance',
                            'category_ar'        => 'الامتثال',
                            'cost'               => 3500,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'Employee contracts, Payroll register',
                            'arabic_documents'   => '',
                        ],
                        [
                            'id'                 => 'cat_006',
                            'name'               => 'Business License Application',
                            'arabic_name'        => 'طلب رخصة تجارية',
                            'category'           => 'Compliance',
                            'category_key'       => 'compliance',
                            'category_ar'        => 'الامتثال',
                            'cost'               => 1500,
                            'description'        => '',
                            'arabic_description' => '',
                            'documents'          => 'ID copy, Lease agreement',
                            'arabic_documents'   => '',
                        ],
                    ];
                @endphp


<div class="space-y-6"
     x-data="catalogPage"
     x-cloak>

    {{-- Page Header --}}
    <div class="flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Catalog</h1>
        <button x-on:click="openCreate()"
                type="button"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
            New catalog item
        </button>
    </div>

    {{-- Table Partial --}}
    @include('catalog._table', ['catalogItems' => $catalogItems])

    {{-- Modal Partial --}}
    @include('catalog._modal')

</div>

@endsection

