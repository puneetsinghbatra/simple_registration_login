@extends('layouts.site') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                           <img src="{{asset('storage/avtars/'.$user_info->profile_picture)}}" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <a href="{{route('profile')}}" class="btn btn-info">View Profile</a>
                        </div>
                        <?php 
                            //print_r(Request::$user_info->));
                        ?>
                    </div><!--.row -->
                </div>

                <div class="card-body">
                      <form method="POST" action="{{ route('updateprofile') }}" enctype='multipart/form-data'>
                        @csrf
                         <div class="form-group row">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file ifield {{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" name="profile_picture" id="profile_picture">
                                @if ($errors->has('profile_picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" value="{{$user_info->first_name}}">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name" value="{{ $user_info->last_name }}">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" name="address"  rows="3">{{ $user_info->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6 {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" {{ $user_info->gender == 'male' ? 'checked' : ''}}>
                                  <label class="form-check-label" for="gender-male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" {{ $user_info->gender == 'female' ? 'checked' : ''}}>
                                  <label class="form-check-label" for="gender-female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="gender-other" value="other" {{ $user_info->gender == 'other' ? 'checked' : ''}}>
                                  <label class="form-check-label" for="gender-other">Other</label>
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-3">
                                        <select id="day_of_birth" name="day_of_birth" class="form-control ifield {{ $errors->has('day_of_birth') ? ' is-invalid' : '' }}">
                                        @foreach (range(1, 31) as $m)
                                            <option value="{{$m}}" {{ $user_info->day_of_birth == $m ? 'selected' : ''}}>{{$m}}</option>
                                        @endforeach;
                                        </select>
                                        @if ($errors->has('day_of_birth'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('day_of_birth') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-5">
                                        <select id="month_of_birth" name="month_of_birth" class="form-control ifield {{ $errors->has('month_of_birth') ? ' is-invalid' : '' }}">
                                        @foreach (range(1, 12) as $m)
                                            <option value="{{$m}}" {{ $user_info->month_of_birth == $m ? 'selected' : ''}}>{{date('F', mktime(0, 0, 0, $m, 1))}}</option>
                                        @endforeach;
                                        </select>
                                        @if ($errors->has('month_of_birth'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('month_of_birth') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                            <select id="year_of_birth" name="year_of_birth" class="form-control ifield {{ $errors->has('year_of_birth') ? ' is-invalid' : '' }}">
                                            @foreach (range(1989, date("Y")) as $m)
                                                <option value="{{$m}}" {{ $user_info->year_of_birth == $m ? 'selected' : ''}}>{{$m}}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('year_of_birth'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first(year_of_birth) }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hobbies" class="col-md-4 col-form-label text-md-right">{{ __('Hobbies') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="hobbies-reading" name="hobbies[]" value="reading" @if(is_array($user_info->hobbies))) @if(in_array('reading', $user_info->hobbies))) checked @endif @endif>
                                  <label class="form-check-label" for="hobbies-reading">Reading</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="hobbies-painting" name="hobbies[]" value="painting" @if(is_array($user_info->hobbies))) @if(in_array('painting', $user_info->hobbies))) checked @endif @endif>
                                  <label class="form-check-label" for="hobbies-painting">Painting</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="hobbies-dancing" name="hobbies[]" value="dancing" @if(is_array($user_info->hobbies))) @if(in_array('dancing', $user_info->hobbies))) checked @endif @endif>
                                  <label class="form-check-label" for="hobbies-dancing">Dancing</label>
                                </div>
                                @if ($errors->has('hobbies'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('hobbies') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
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