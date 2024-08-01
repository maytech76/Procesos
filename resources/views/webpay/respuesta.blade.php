@extends('layouts.frontend')

@section('content')
    
<div class="col-md-12 d-flex justify-content-center">    
    <div class="card w-50">
        <div class="card-header gray-400">
            <legend class="card-title text-center">Repuesta de Webpay</legend>
        </div>
        <div class="card-body">

            <ul>
                <li class="fw-bold">Vci: <span class="fw-normal">{{$datos->vci}}</span></li>
                <li class="fw-bold">Monto: <span class="fw-normal">{{$datos->amount}}</span></li>
                <li class="fw-bold">Estado: <span class="fw-normal">{{$datos->status}}</span></li>
                <li class="fw-bold">buy_order: <span class="fw-normal">{{$datos->buy_order}}</span></li>
                <li class="fw-bold">session_id: <span class="fw-normal">{{$datos->session_id}}</span></li>
                <li class="fw-bold">Numero de Tarjeta: <span class="fw-normal">{{$datos->card_detail->card_number}}</span></li>
                <li class="fw-bold">Fecha de Transacción: <span class="fw-normal">{{$datos->transaction_date}}</span></li>
                <li class="fw-bold">Codigo de Autorización: <span class="fw-normal">{{$datos->authorization_code}}</span></li>
                <li class="fw-bold">Tipo de Pago: <span class="fw-normal">{{$datos->payment_type_code}}</span></li>
               
            </ul> 


     </div>
  </div>
</div>


@endsection
