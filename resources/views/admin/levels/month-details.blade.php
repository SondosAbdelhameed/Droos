@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
    تفاصيل الشهر 
    </x-slot>
    {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">بيانات الشهر</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <td>الشهر</td>
                                        <th>السعر</th>
                                        <th>تاريخ البدء</th>
                                        <th>تاريخ النهاية</th>
                                        {{-- <th style="min-width: 100px">الإعدادات</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $month->start_date->format('M') }}</td>
                                        <td>{{ $month->price }}</td>
                                        <td>{{ $month->start_date->format('Y-m-d') }}</td>
                                        <td>{{ $month->end_date->format('Y-m-d') }}</td>
                                        {{-- <td>
                                            <div class="flex align-items-center list-user-action"
                                                style="display: flex;">
                                                <x-dashboard.a-edit href="{{ route('levels.edit', $month->id) }}">
                                                </x-dashboard.a-edit>&nbsp;
                                            </div>
                                        </td> --}}
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection