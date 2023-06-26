@extends('layouts.app', ['activePage' => 'all-users', 'titlePage' => ('all users')])

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 mb-6">
                <div class="text">
                    {{-- @foreach ($users as $user) --}}
                    {{-- <h3>Welcome <b>{{$user->name}}</b> </h3> --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <br>


                <div class="container-fluid">
                    <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title "><a href="{{ URL::previous() }}"> <i  class="fas fa-arrow-alt-circle-left"></i> </a>{{__('balanceedit.edit')}}</h4>
                      </div>


                        <div class="card-body table-responsive-md">
                            <div class="container py-3 h-100">
                              <div class="row justify-content-center align-items-center h-100">
                                <div class="col-12 col-lg-10 col-xl-10">
                                  <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                      <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"><strong>{{$user->name}}</strong> {{__('balanceedit.leaves')}}:</h3>
                                    <form class="form-card" action="{{ route('admin.users.balanceupdate',$user) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($user->contract == "International")
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-1">{{__('showuser.homeleave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="homeleave" value="{{$balance12}}" name="homeleave" placeholder="">

                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-1">{{__('showuser.r&r')}}:</label>
                                                <input class="form-control form-outline" type="text" id="rr" value="{{$balance11}}" name="rr" placeholder="" >
                                            </div>
                                        </div>
                                        @endif
                                        @if ($user->contract == "National")
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-1">{{__('showuser.annualLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="annualLeave" value="{{$balance1}}" name="annualLeave" placeholder="">

                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                <label class="form-control-label px-1">{{__('showuser.sickLeaveSC')}}:</label>
                                                <input class="form-control form-outline" type="text" id="sickLeaveSC" value="{{$balance2}}" name="sickLeaveSC" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                 <label class="form-control-label px-1">{{__('showuser.sickLeaveDC')}}:</label>
                                                  <input class="form-control form-outline" type="text" id="sickLeaveDC" value="{{$balance3}}" name="sickLeaveDC" placeholder="" >
                                                 </div>
                                            <div class="form-group col-sm-6 flex-column d-flex">
                                                 <label class="form-control-label px-1">{{__('showuser.marriageLeave')}}:</label>
                                                 <input class="form-control form-outline" type="text" id="marriageLeave" value="{{$balance5}}" name="marriageLeave" placeholder="" >
                                                 </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.compassionateSecondDegree')}}:</label>
                                                <input class="form-control form-outline " type="text" id="compassionateSecondDegree" value="{{$balance7}}" name="compassionateSecondDegree" placeholder="" >

                                            </div>
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.unpaidLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="unpaidLeave"  value="{{$balance15}}" name="unpaidLeave" placeholder="" >

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.maternityLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="maternityLeave" value="{{$balance8}}" name="maternityLeave" placeholder="" >

                                            </div>
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.paternityLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="paternityLeave"  value="{{$balance9}}" name="paternityLeave" placeholder="" >

                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.PilgrimageLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="PilgrimageLeave" value="{{$balance10}}" name="PilgrimageLeave" placeholder="" >

                                            </div>
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('showuser.compansetion')}}:</label>
                                                <input class="form-control form-outline " type="text" id="compansetion"  value="{{$balance18}}" name="compansetion" placeholder="" >

                                            </div>
                                        </div>
                                        <!-- <div class="row justify-content-between text-left">
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('balanceedit.welfareLeave')}}:</label>
                                                <input class="form-control form-outline " type="text" id="welfare_leave" value="{{$balance18}}" name="welfare_leave" placeholder="" >

                                            </div>
                                            <div class="form-group  col-sm-6 flex-column d-flex">
                                                <label class="form-control-label  px-1">{{__('balanceedit.compansetion')}}:</label>
                                                <input class="form-control form-outline " type="text" id="compansention"  value="{{$balance18}}" name="compansention" placeholder="" >

                                            </div>
                                        </div> -->
                                 

                                        @endif
                                           

                                        {{-- MUST ADD requirepd for radio check --}}
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="form-group col-sm-3"> <button type="submit" class="btn bg-gradient-primary btn-block">{{__('balanceedit.update')}}</button> </div>
                                            <div class="form-group col-sm-3"> <a class="btn btn-outline-danger" href="{{route('admin.users.index')}}" >{{__('balanceedit.cancel')}}</a> </div>
                                        </div>
                                    </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>








    </div>
  </div>
@endsection
