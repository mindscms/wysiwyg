@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Post</div>

            <div class="card-body">

                <form action="{{ route('ckeditor_post') }}" method="post" id="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="post">Post</label>
                                <textarea name="post" id="ckeditor" cols="30" rows="10" class="form-control"></textarea>
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
    <script src="{{ asset('frontend/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.config.extraPlugins = 'embedbase';
        CKEDITOR.config.extraPlugins = 'embed';
        CKEDITOR.config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';
        CKEDITOR.config.language = 'ar';
        CKEDITOR.replace('ckeditor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    </script>

@endsection
