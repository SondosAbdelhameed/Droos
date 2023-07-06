@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        المجموعــات
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
        <x-slot:link>
            {{ route('groups.create') }}
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
                            <h4 class="card-title">المجموعــات</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>اسم المجموعه</th>
                                        <th>المستوي</th>
                                        <th>المادة</th>
                                        <th style="min-width: 100px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($groups as $index=>$group)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->level->name }}</td>
                                        <td>{{ $group->course->name }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action" style="display: flex;">
                                                <x-dashboard.a-edit href="{{ route('groups.edit', $group->id) }}">
                                                </x-dashboard.a-edit>&nbsp;
                                                {{-- <form action="{{ route('groups.destroy', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                                </form>&nbsp; --}}
                                                <x-dashboard.a-show href="{{ route('groups.show', $group->id) }}" title="عرض الطلاب الخاصة بالمجموعة" >
                                                </x-dashboard.a-show>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection