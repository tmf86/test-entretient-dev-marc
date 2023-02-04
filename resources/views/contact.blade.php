@extends('layout.app')
@section('content')
    <div class="container my-5 bg-light shadow-lg border-2 border-light py-4">
        <div class="row">
            <div class="col">
                <div class="status"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h3 class="mb-3">Posez vos préoccupation ici et nous nous ferons le plasir de vous repondre</h3>
                <form id="contact-form" method="POST" action="{{route('send-message')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Votre nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Votre email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="form-label">L'Objet</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Votre message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <button  type="submit" class="btn btn-dark w-100 fw-bold">Envoyé</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if($msgSuccess)
            <div class="alert-info">{{$msgSuccess}}</div>
        @endif
    </div>
@endsection
