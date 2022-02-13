@extends('backend.layouts.app')

@push('css')

@endpush

@section('currentPage',__('message.add_attribute'))

@section('current_tab',__('message.add_attribute'))

@section('content')
<style>

    .entry:not(:first-of-type)
    {
        margin-top: 10px;
    }

    .icon
    {
        font-size: 12px;
    }
</style>
<div class="container">
    <div class="form-group">

    <div class="form-group">
        <input id="attribute_name" class="form-control-lg col-sm-10 control-label"  placeholder="Özellik İsmi"/>
        <button type="button" id="checkAttributeSlug" class="btn btn-warning btn-lg mb-2">@lang('message.check')</button>
    </div>
        <hr>

        <p><b id="attributeInfo-text">@lang('message.before_attribute_add_info')</b></p>
        <div class="col-sm-12 col-12 d-none attributeValueSection">
            <div class="dynamic-wrap">
                <form id="storeAttributesForm" action="{{route('attribute.store')}}" method="POST">
                    @csrf

                    <input id="attributeFormValue" name="name" type="hidden" required >

                    <div class="entry input-group">
                        <input    class="form-control names" name="values[]" type="text" placeholder="{{__('message.attribute_name')}} " required/>

                        <span class ="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="icon fa fa-plus-circle"></span>
                            </button>
                        </span>
                    </div>


                </form>
                <button id="storeAttributesButton" type="submit" class=" btn btn-success btn-lg">@lang('message.save')</button>


                <br>
            </div>
        </div>
    </div>

</div>


    @push('js')
<script>
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $('#checkAttributeSlug').on('click',function (){
        var attributeName=$('#attribute_name').val(),
        attributeInput = $('#attribute_name');
        $.ajax({
             url: "{{route('is.attribute.slug.exists')}}",
            type:"POST",
            data:{
                attributeName:attributeName,
                _token: _token
            },
            success:function(response){
                 if (response != 1){
                     if (!attributeInput.val()){
                         $('#attributeInfo-text').removeClass('d-none').html('@lang('message.attribute_name_not_empty')').addClass('text-danger')
                         return false
                     }else{
                         $('#attributeInfo-text').addClass('d-none');
                         $('.attributeValueSection').removeClass('d-none')
                         attributeInput.prop('disabled', true)
                         $('#attributeFormValue').val(attributeInput.val());
                     }
                 }else{
                     $('#attributeInfo-text').html('@lang('message.attribute_name_exists')').addClass('text-danger')
                 }
            },
            error: function(error) {
                console.log(error);
            }
        });





    });

    $(function() {
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();


            var isAttributeValueExists=false,
                currentInputValue=$(this).parents('.entry').find('input').val(),
                currentInput=$(this).parents('.entry').find('input');

            if (!currentInput.val()) {
                $('#attributeInfo-text').removeClass('d-none').html('@lang('message.attribute_value_not_empty')').addClass('text-danger')
                return false;

            }
                $.ajax({
                url: "{{route('is.attribute.value.exists')}}",
                type:"POST",
                data:{
                        attributeValue:currentInputValue,
                     _token: _token
                },
                success:function(response){

                    if(response == 1) {
                        isAttributeValueExists=true;

                    }
                    if (!isAttributeValueExists){

                        var dynaForm = $('.dynamic-wrap form:first'),
                            currentEntry = $('.btn-add').parents('.entry:first'),
                            newEntry = $(currentEntry.clone()).appendTo(dynaForm);


                        newEntry.find('input').val('');
                        dynaForm.find('.entry:not(:last) .btn-add')
                            .removeClass('btn-add').addClass('btn-remove')
                            .removeClass('btn-success').addClass('btn-danger')
                            .html('<span class="icon fa fa-minus"></span>');
                            currentInput.prop('readonly', true);
                            currentInput.prop('required',true)
                            $('#attributeInfo-text').addClass('d-none');

                    }else {

                        $('#attributeInfo-text').removeClass('d-none').html(currentInputValue +' ' + '@lang('message.attribute_value_exists')').addClass('text-danger')

                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }).on('click', '.btn-remove', function(e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });

    });


    $('#storeAttributesButton').on('click',function (){
        var dynaForm = $('.dynamic-wrap form:first');
        var lastVal =dynaForm.find('.entry:last input').val();
        var isAttributeValueExists=false;
        if(!lastVal){
            $('#attributeInfo-text').removeClass('d-none').html('@lang('message.last_attribute_value_can_not_empty')').addClass('text-danger')
            return false
        }else{
            $.ajax({
                url: "{{route('is.attribute.value.exists')}}",
                type: "POST",
                data: {
                    attributeValue: lastVal,
                    _token: _token
                },
                success: function (response) {

                    if (response == 1) {
                        isAttributeValueExists = true;

                    }

                    if (!isAttributeValueExists) {
                        $('#storeAttributesForm').submit();
                    } else {
                        $('#attributeInfo-text').removeClass('d-none').html(lastVal +' ' + '@lang('message.attribute_value_exists')').addClass('text-danger')
                        return false
                    }
                }
            });

        }

    });
</script>
    @endpush
@endsection
