@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        المجموعه ({{ $group->name }})
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
        <x-slot:link>
            {{ route('create_group_students', $group->id) }}
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
                            <h4 class="card-title">الطلاب</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>رقم الطالب</th>
                                        <th>اسم الطالب</th>
                                        <th>الهاتف</th>
                                        <th>المجموعه</th>
                                        <th>المستوي</th>
                                        <th>المادة</th>
                                        <th style="min-width: 100px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index=>$student)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $student->barcode }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->group->name }}</td>
                                        <td>{{ $student->group->level->name }}</td>
                                        <td>{{ $student->group->course->name }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action"
                                                style="display: flex;">
                                                <x-dashboard.a-edit href="{{ route('students.edit', $student->id) }}">
                                                </x-dashboard.a-edit>&nbsp;
                                                <form action="{{ route('students.destroy', $student->id) }}"
                                                    method="POST">
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
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection