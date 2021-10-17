@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') @lang('admin_phone.phoneBook') @endslot
            @slot('active') @lang('admin_phone.dashboard') @endslot
            @slot('parent') @lang('admin_phone.contactList') @endslot
        @endcomponent
        <hr>

        <div class="row">
            <div class="col-sm-12">
                <div>
                    <p class="total">
                        <span>@lang('admin_phone.totalNumbers')
                            <span id="amountNumbers" style="font-weight:700;">{{$amount_numbers}}</span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-button">
            <a href="{{route('admin.phone.create')}}" class="btn btn-primary position-button">@lang('admin_phone.addContact')</a>
        </div>

        <form id="searchForm" name="searchForm" method="POST">
            <p class="search-table">@lang('admin_phone.search')</p>
            <div class="form-phone">
                <input type="text" name="contactPhone" id="contactPhone" placeholder="@lang('admin_phone.searchPhone')"
                       onkeyup="search2(this.id);"/>
                <input type="text" name="contactLastName" id="contactLastName" placeholder="@lang('admin_phone.searchLastName')"
                       onkeyup="search2(this.id);"/>
                {{ csrf_field() }}
            </div>
        </form>

        <table class="table table-striped m-auto table-width-admin">
            <thead>
            <th>@lang('admin_phone.phone')</th>
            <th>@lang('admin_phone.contactLastName')</th>
            <th>@lang('admin_phone.action')</th>
            </thead>
            <tbody id="contactListTbody">
            @forelse($phones as $phone)
                <tr class="contactLine">
                    <td class="tdNumber align-middle">{{$phone->phone}}</td>
                    <td class="tdName align-middle">{{$phone->last_name}}</td>
                    <td class="tdAction float-right">
                        <form onsubmit="if (confirm('Are You Sure to delete this?')){ return true } else { return false }"
                              action="{{route('admin.phone.destroy', $phone)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">

                            {{ csrf_field() }}

                            <a class="btn btn-primary m-2" href="{{route('admin.phone.edit', $phone)}}"><i
                                        class="fa fa-edit"> @lang('admin_phone.edit')</i></a>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash-o"> @lang('admin_phone.delete')</i>
                            </button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>@lang('admin_phone.empty')</h2></td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
        </div>
    </div>
@endsection
