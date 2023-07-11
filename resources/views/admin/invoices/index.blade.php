@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        المدفوعات
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <iframe id="iframe" src="" style="display:none;"></iframe>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"> المدفوعات ({{ $sum }}) </h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <form action="{{ route('invoices.index') }}" method="get" style="padding: 20px;">
                         @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>عرض من تاريخ</label>
                                    <input type="date" class="form-control" name="from" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-4">
                                    <label> الي تاريخ</label>
                                    <input type="date" class="form-control" name="to" value="{{ old('name') }}">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('invoices.index')}}"><span
                                            aria-hidden="true">&times;</span></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>اسم الطالب</th>
                                        <th>المجموعه</th>
                                        <th>نوع الدفع</th>
                                        <th>المبلغ</th>
                                        <th>تاريخ الدفع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($invoices as $index=>$invoice)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $invoice->student->name }}</td>
                                        <td>{{ $invoice->group->name }}</td>
                                        @if ($invoice->type == config('invoice.type.per_time'))
                                        <td>بالحصة</td>
                                        @else
                                        <td>شهري</td>
                                        @endif
                                        <td>{{ $invoice->price }}</td>
                                        <td>{{ $invoice->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $invoices->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function openmodle(url){
    document.getElementById("iframe").src=url;
  }
</script>
@endsection