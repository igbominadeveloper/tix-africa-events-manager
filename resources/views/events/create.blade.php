@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>

                @if($errors->any())
                 {{ $errors }}
                @endif

                <div class="card-body">
                    <form method="POST" action="/events">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">
                                    {{ old('description')}}
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="freemium" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="freemium" name="freemium" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="freemium">Free</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="freemium-2" name="freemium" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="freemium-2">Paid</label>
                                  </div>

                                @error('freemium')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activeDate" class="col-md-4 col-form-label text-md-right">{{ __('Active Date') }}</label>

                            <div class="col-md-6">
                            <input id="activeDate" type="date" class="form-control" name="activeDate" required autocomplete="activeDate" value="{{old('activeDate')}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
