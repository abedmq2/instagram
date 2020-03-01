@extends('admin.layouts.app')

@section('content')

    <div class="col-12">
        <div class="kt-portlet">
            <div class="kt-portlet__body">

                <div class="">
                    <form action="" class="row kt-margin-b-20">
                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <select required name="id" class="form-control m-input"
                                    id="id">
                                <option value="">اختر الحساب</option>
                                @foreach($accounts as $account)
                                    <option value="{{$account->id}}" {{request('id')==$account->id?"selected":""}}>
                                        {{$account->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                            <button class="btn btn-primary btn-brand--icon" type="submit">
                        <span>
                            <i class="la la-search"></i>
                            <span>بحث</span>
                        </span>
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <form action="{{route('admin.images')}}" id="kt_search" class="row col-12" method="post">
        @csrf
        <div class="col-md-12 sticky-bar">
            <div class="kt-portlet">
                <div class="kt-portlet__head">

                    <div class="kt-portlet__head-toolbar">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-right"></i>
                            <span class="kt-hidden-mobile">رجوع</span>
                        </a>

                        <div class="btn-group mr-1">
                            <button type="submit" class="btn btn-brand">
                                <i class="la la-check"></i>
                                <span class="kt-hidden-mobile">نشر</span>
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-12">

            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                        <h3 class="kt-portlet__head-title">
                            {{$title}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <input type="checkbox" name="" id="all"> الكل
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet__body">


                    <form action="{{url()->current()}}" method="post">
                        <input type="hidden" name="id" value="{{$account->id}}">
                        <div class="row">
                            @foreach($medias as $media)
                                @if(!in_array($media->getId(),$images_id))
                                    <div
                                        class="col-3 medias-item {{in_array($media->getId(),$images_id)?"disabled":""}}"
                                        style="height: 300px;overflow: hidden;margin-bottom: 20px">
                                        <label for="image-{{$media->getId()}}" style="width: 100%">
                                            <img src="{{$media->getImageThumbnailUrl()}}" width="100%" alt="">
                                            <input type="checkbox"
                                                   class="{{in_array($media->getId(),$images_id)?"":"medias-input"}}"
                                                   value="{{$media->getId()}}"
                                                   name="medias[]" style="display: none;"
                                                   {{in_array($media->getId(),$images_id)?"disabled":""}}
                                                   id="image-{{$media->getId()}}">
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </form>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <style>
            .selected {

                box-shadow: 0px 0px 6px red;
            }

            .disabled {

                box-shadow: 0px 0px 6px green;
            }
        </style>

        @endsection

        @push('scripts')
            <script>
                $('.medias-input').change(function () {
                    let parent = $(this).closest('.medias-item');
                    if ($(this).is(':checked')) {
                        parent.addClass('selected');
                    } else {
                        parent.removeClass('selected');
                    }
                });

                $('#all').change(function () {
                    $('.medias-input').attr('checked', $(this).is(':checked')).change();
                })
            </script>
    @endpush



