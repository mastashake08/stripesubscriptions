@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <table class="table table-striped">
  <tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Email</th>
  </tr>
  @foreach($accounts as $account)
    <tr>
      <td>{{$account->name}}</td>
      <td>{{$account->phone}}</td>
      <td>{{$account->email}}</td>
    </tr>
  @endforeach

</table>


                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Account</div>

                <div class="panel-body">
                    <form method="post" action="{{url('/subscription')}}">
                      <input class="form-control" name="name" placeholder="name">
                      <input class="form-control" name="phone" type="tel" placeholder="phone">
                      <input class="form-control" name="email" type="email" placeholder="email">
                      <input class="form-control" name="card_number" type="tel" placeholder="card number">
                      <input class="form-control" name="card_month" type="tel" placeholder="card month">
                      <input class="form-control" name="card_year" type="tel" placeholder="card year">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <select name="plan">
                        @foreach($plans as $plan)
                        <option value="{{$plan->id}}">{{$plan->name}} - {{money_format(" $%i", floatval(str_replace(',','',$plan->amount/100)))}}</option>
                        @endforeach
                      </select>
                      <br>
                      <button type="submit" class="btn btn-sm btn-success">Add Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
