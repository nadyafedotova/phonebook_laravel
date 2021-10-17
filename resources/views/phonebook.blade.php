@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="total">
                    <span>@lang('phonebook.total')
                        <span id="amountNumbers" style="font-weight:700;">{{$amount_numbers}}</span>
                    </span>
                </p>

                <form id="searchForm" name="searchForm" method="POST">
                    <p class="search-table">@lang('phonebook.search')</p>
                    <div class="form-phone">
                        <input type="text" name="contactPhone" id="contactPhone"
                               placeholder="@lang('phonebook.searchPhone')" onkeyup="search(this.id);"/>
                        <input type="text" name="contactLastName" id="contactLastName"
                               placeholder="@lang('phonebook.searchLastName')" onkeyup="search(this.id);"/>
                        {{ csrf_field() }}
                    </div>
                </form>

                <table class="table table-striped">
                    <thead>
                    <th>@lang('phonebook.phone')</th>
                    <th>@lang('phonebook.contactLastName')</th>
                    </thead>
                    <tbody id="contactListTbody">
                    @forelse($phones as $phone)
                        <tr>
                            <td>{{$phone->phone}}</td>
                            <td>{{$phone->last_name}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center"><h2>@lang('phonebook.empty')</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $phones->links() }}
        </div>
    </div>

@endsection

