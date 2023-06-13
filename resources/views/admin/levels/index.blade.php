@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        المستويــات
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
        <x-slot:link>
            {{ route('levels.create') }}
            </x-slot>
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
                            <h4 class="card-title">المستويــات</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>اسم المستوي</th>
                                        <th style="min-width: 100px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($levels as $index=>$level)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $level->name }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action" style="display: flex;">
                                                <x-dashboard.a-edit href="{{ route('levels.edit', $level->id) }}">
                                                </x-dashboard.a-edit>&nbsp;
                                                <form action="{{ route('levels.destroy', $level->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $levels->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection