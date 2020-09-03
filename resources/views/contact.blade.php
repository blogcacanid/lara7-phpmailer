@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header"><i class="fa fa-envelope"></i>&nbsp;Contact Us</div>
            <div class="card-body" style="font-style: Calibri;font-size:12px">
                @if(Session::has('status'))
                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                @endif
                <form action="{{ url('contact') }}" method="post">
                    @method('POST') 
                    @csrf
                    <div class="form-group">
                        <label for="to">To</label>
                        <input class="form-control" type="email" name="to" placeholder="Enter Email Penerima" />
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input class="form-control" type="text" name="subject" placeholder="Enter Judul Email" />
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="" placeholder="Enter Isi Pesan" cols="30" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success col-sm-5"><i class="fa fa-send"></i>&nbsp;KIRIM EMAIL</button>
                    </div>
                <form>
            <div>
        <div>
    <div>
</div>
@endsection