@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('admin.users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                                       
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                      
                    </div>
                    <div class="card-body">
                       

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                         


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">Name :: {{ __( auth()->user()->name) }}</label>

                                  
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"> Email :: {{ __(auth()->user()->email) }}</label>

                                  
                                </div>

                              
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"> No.courses :: {{ __(count(auth()->user()->courses)) }}</label>

                                  
                                </div>

                            

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"> Level :: {{ __(auth()->user()->level) }}</label>

                                  
                                </div>


                               


                        
                                               </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
    