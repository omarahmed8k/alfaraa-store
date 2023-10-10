@extends('frontlayouts.layouts')
@section('css')
<style>
    .images-editor {
        margin: 50px auto;
    }

    .images-editor label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .images-editor .image-thumbnails {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .images-editor .image-thumbnails {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .images-editor .image-thumbnails .thumbnail-container {
        position: relative;
        width: 100%;
        height: auto;
        cursor: pointer;
    }

    .images-editor .image-thumbnails .thumbnail {
        width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 5px;
        filter: grayscale(100%);
    }

    .images-editor .image-thumbnails .thumbnail.selected {
        border: 1px solid #000;
        outline: 2px solid #000;
        filter: grayscale(0%);
    }

    .images-editor .editor-options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .images-editor .editor-options {
            grid-template-columns: repeat(1, 1fr);
        }
    }

    .images-editor .editor-options div {
        width: 100%;
    }

    .images-editor .editor-options label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .images-editor .editor-options input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
        height: 40px;
    }

    .images-editor .editor-preview {
        width: 100%;
        height: auto;
    }

    .images-editor .editor-preview img {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        width: 100%;
        height: 400px;
        object-fit: contain;
    }

    .images-editor a {
        background-color: #000;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        display: block;
        text-align: center;
        margin: 20px auto;
        width: 100%;
    }
</style>
@endsection

@section('content')
<div class="offcanvas-overlay"></div>
<div class="breadcrumb-section">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                    <h3 class="breadcrumb-title"> @lang('main.card') </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="images-editor">
        <label for="imageThumbnails">
            @lang('main.choose_image')
        </label>
        <div id="imageThumbnails" class="image-thumbnails">
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/1.png')}}" alt="Image 1">
            </div>
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/2.jpg')}}" alt="Image 2">
            </div>
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/3.jpg')}}" alt="Image 3">
            </div>
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/4.png')}}" alt="Image 4">
            </div>
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/5.jpg')}}" alt="Image 4">
            </div>
            <div id="imageContainer" class="thumbnail-container">
                <img class="thumbnail" src="{{asset('assetsfront/images/editor/6.png')}}" alt="Image 4">
            </div>
        </div>
        <div class="editor-options">
            <div>
                <label for="nameInput" style="display: none;">
                    @lang('main.name')
                </label>
                <input type="text" id="nameInput" placeholder="@lang('main.name')" style="display: none;">
            </div>
            <div>
                <label for="fontColorInput" style="display: none;">
                    @lang('main.fontColor')
                </label>
                <input type="color" id="fontColorInput" value="#FFFFFF" style="display: none;">
            </div>
        </div>
        <div class="editor-preview">
            <img id="outputImage" src="{{asset('assetsfront/images/logo/logo-light.png')}}" alt="Generated Image" style="display: none;">
        </div>
        <a id="downloadLink" style="display: none;" download="generated-image.jpg">
            @lang('main.download')
        </a>
    </div>
</div>
@endsection