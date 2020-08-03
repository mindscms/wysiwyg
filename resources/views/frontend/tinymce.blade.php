@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>

            <div class="card-body">

                <form action="{{ route('tinymce_post') }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="post">Post</label>
                                <textarea name="post" id="post" cols="30" rows="10" class="form-control tinymce"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" name="save" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('frontend/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('frontend/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script>
        $(function () {
            $('textarea.tinymce').tinymce({

                @if(config('app.locale') == 'ar')
                    language: 'ar',
                    directionality: 'rtl',
                @endif
                height: 200,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | print preview',

                file_picker_callback (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                    let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                    tinymce.activeEditor.windowManager.openUrl({
                        url : '/file-manager/tinymce5',
                        title : 'Laravel File manager',
                        width : x * 0.8,
                        height : y * 0.8,
                        onMessage: (api, message) => {
                            callback(message.content, { text: message.text })
                        }
                    })
                }
            });
        });
    </script>

@endsection
