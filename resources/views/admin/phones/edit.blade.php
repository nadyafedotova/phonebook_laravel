@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') @lang('admin_phone.phoneBook') @endslot
            @slot('active') @lang('admin_phone.dashboard') @endslot
            @slot('parent') @lang('admin_phone.contactList') @endslot
        @endcomponent
        <hr>
        <form class="form-horizontal" action="{{route('admin.phone.update', $phone)}}" method="POST">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            @include('admin.phones.partials.form')
        </form>

    </div>
@endsection
