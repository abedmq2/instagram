@extends('admin.layouts.app')

@section('content')

    <div class="col-12">
        <div class="kt-portlet">

            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3>
                        {{$title??''}}
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <style>
                    .hidden {
                        display: none;
                    }
                </style>
                <div class="m-portlet  m-portlet--tabs">

                    <form class="m-form" method="post" action="{{ route('admin.settings.update') }}"
                          enctype="multipart/form-data">

                        {{ csrf_field() }}


                        <div class="m-portlet__head">

                            <div class="m-portlet__head-tools">

                                <ul class="nav nav-tabs m-tabs-line m-tabs-line--info m-tabs-line--2x"
                                    role="tablist">


                                    @foreach(\App\Setting::getTabs($type??null) as $key=> $tab)
                                        <li class="nav-item m-tabs__item">

                                            <a class="nav-link m-tabs__link {{$loop->iteration==1?'active':''}}"
                                               href="#{{$key}}"
                                               data-toggle="tab">{{$tab}}</a>

                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>


                        <div class="tab-content">

                            @foreach(\App\Setting::getTabs($type??'general')  as $key=> $tab)



                                <div class="tab-pane {{$loop->iteration==1?'active':''}}" id="{{$key}}">

                                    <div class="m-portlet__body">
                                        <div class="m-form__section m-form__section--first">
                                            <div class="row">
                                                @foreach(\App\Setting::getParam($key)  as $input )
                                                    @if($input[1]!=='tags'&&$input[1]!=='textarea'&&$input[1]!=='svg'&&$input[1]!=='image'&&$input[1]!=='btn')
                                                        <div class="form-group m-form__group col-12 {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}}</label>
                                                            <input type="{{$input[1]}}" name="{{$input[0]}}"
                                                                   class="form-control m-input {{$input[4]??''}}"
                                                                   id="{{$input[0]}}" value="{{$input[2]}}"
                                                                   {{$input[5]??''}}
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="{{__('ادخل')}} {{$input[3]}}">
                                                        </div>
                                                    @elseif($input[1]=='btn')
                                                        <div class="form-group m-form__group col-12  {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}} {{__('text')}}
                                                                :</label>
                                                            <input type="text" name="{{$input[0]}}_text"
                                                                   class="form-control m-input {{$input[4]??''}}"
                                                                   id="{{$input[0]}}"
                                                                   value="{{settings($input[2]."_text")}}"
                                                                   {{$input[5]??''}}
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="{{__('ادخل')}} {{$input[3]}} {{__('text')}}">


                                                        </div>
                                                        <div class="form-group m-form__group col-12 {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}} {{__('url')}}
                                                                :</label>
                                                            <input type="url" name="{{$input[0]}}_url"
                                                                   class="form-control m-input {{$input[4]??''}}"
                                                                   id="{{$input[0]}}"
                                                                   value="{{settings($input[2]."_url")}}"
                                                                   {{$input[5]??''}}
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="{{__('ادخل')}} {{$input[3]}} {{__('url')}}">


                                                        </div>
                                                        <hr>
                                                    @elseif($input[1]=='textarea')
                                                        <div class="form-group m-form__group col-12 {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}}:</label>
                                                            <textarea name="{{$input[0]}}"
                                                                      class="form-control m-input {{$input[4]??''}}"
                                                                      id="{{$input[0]}}" rows="8"
                                                                      aria-describedby="emailHelp" {{$input[5]??''}}
                                                                      placeholder="{{__('ادخل')}} {{$input[3]}}">{{$input[2]}}</textarea>

                                                        </div>
                                                    @elseif($input[1]=='image')

                                                        <div class="form-group m-form__group {{$input[6]??''}} {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}}</label>
                                                            <input type="file" name="{{$input[0]}}"
                                                                   class="form-control m-input {{$input[4]??''}}"
                                                                   id="{{$input[0]}}" {{$input[5]??''}}
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="{{$input[3]}}">

                                                            <img class="blah"
                                                                 alt="{{$input[0]}}" src="{{$input[2]}}"
                                                                 style="max-height: 150px;width: 100%">
                                                        </div>
                                                    @elseif($input[1]=='tags')
                                                        <div class="form-group m-form__group col-12  {{$errors->any($input[0])?"has-danger":''}}">
                                                            <label for="{{$input[0]}}">{{$input[3]}}</label>
                                                            <input type="{{$input[1]}}" name="{{$input[0]}}"
                                                                   class="form-control m-input tags {{$input[4]??''}}"
                                                                   id="{{$input[0]}}" value="{{$input[2]}}"
                                                                   {{$input[5]??''}}
                                                                   aria-describedby="emailHelp"
                                                                   placeholder="{{__('ادخل')}} {{$input[3]}}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>


                                        </div>
                                    </div>

                                </div>

                            @endforeach

                            <div class="m-portlet__foot m-portlet__foot--fit">

                                <div class="m-form__actions m-form__actions">


                                    <button type="submit"
                                            class="btn btn-primary">{{__('حفظ الإعدادات')}}
                                    </button>


                                </div>

                            </div>


                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>




@endsection


@push('scripts')

    <link rel="stylesheet" href="panel/plugins/tagsinput/tagsinput.css">
    <script rel="stylesheet" src="panel/plugins/tagsinput/tagsinput.js"></script>
    <script>

        $('.tags').tagsinput();


        $("[type='file']").change(function () {
            readURL(this, $(this));
        });

        function readURL(input, obj) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    obj.parent().find('.blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.m-form').validate();
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxrnwTyDI68in8hdLFZC-3EHx1E_GhdhU"></script>
    <script>
        var map;
        var marker;
        center = {lat: {{settings('lat')??-34.447694}}, lng: {{settings('lng')??150.449380}}};
        {{--        center = {lat: {{$maintenance->lat??24.482971}}, lng: {{$maintenance->lng??54.582466}}};--}}

        console.log(center);
        $('#lat').val(center.lat);
        $('#lng').val(center.lng);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 8
            });
            marker = new google.maps.Marker({position: center, map: map});


            map.addListener('click', function (e) {
                // 3 seconds after the center of the map has changed, pan back to the
                // marker.
                placeMarkerAndPanTo(e.latLng, map);

            });
        }


        function placeMarkerAndPanTo(latLng, map) {
            marker.setMap(null);

            $('#lat').val(latLng.lat());
            $('#lng').val(latLng.lng());
            marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
            map.panTo(latLng);
        }

        $('#mapLink').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            initMap();
            $('#map').css('height', '500px');

        });


    </script>


@endpush
