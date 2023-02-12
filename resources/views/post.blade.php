@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
@endsection

@section('title', 'Post')

@section('banner')
<h1 class="font-weight-bold">Man must explore, and this is exploration at it's greatest</h1>
<h4>Problems look mighty small from 150 miles up</h4>
@endsection

@section('content')
<!-- Content section 1 -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores deserunt accusantium porro quae architecto minus consectetur quo harum id blanditiis? Rerum optio obcaecati.</p>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, aperiam fugit reiciendis rem eos dicta amet illum eius accusamus veniam excepturi illo unde tenetur in odio veritatis. Quibusdam perferendis eaque tempora consequatur porro, assumenda eveniet repudiandae eum maiores magnam perspiciatis quasi quisquam placeat rem optio? Veritatis officiis quam non pariatur.</p>
<br>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium saepe exercitationem dolores in temporibus impedit id soluta fugit, consectetur et! Unde, quis consectetur. Nostrum alias dolorum perspiciatis?</p>
<br>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium saepe exercitationem dolores in temporibus impedit id soluta fugit, consectetur et! Unde, quis consectetur.</p>
<br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sed cupiditate ullam, suscipit beatae adipisci accusamus pariatur eaque atque omnis aperiam, laboriosam eveniet asperiores reiciendis veritatis hic possimus, eum dolorem non corrupti!</p>
<!-- Content section 2 -->
<h3>The final frontier</h3>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores deserunt accusantium porro quae architecto minus consectetur quo harum id blanditiis? Rerum optio obcaecati.</p>
<br>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium saepe exercitationem dolores in temporibus impedit id soluta fugit, consectetur et! Unde, quis consectetur. Nostrum alias dolorum perspiciatis?</p>
<br>
<p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, aperiam fugit reiciendis rem eos dicta amet illum eius accusamus veniam excepturi illo unde tenetur in odio veritatis. Quibusdam perferendis eaque tempora consequatur porro, assumenda eveniet repudiandae eum maiores magnam perspiciatis quasi quisquam placeat rem optio? Veritatis officiis quam non pariatur.</em></p>
<br>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium saepe exercitationem dolores in temporibus impedit id soluta fugit, consectetur et! Unde, quis consectetur.</p>
<br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sed cupiditate ullam, suscipit beatae adipisci accusamus pariatur eaque atque omnis aperiam, laboriosam eveniet asperiores reiciendis veritatis hic possimus, eum dolorem non corrupti!</p>
<br>
<!-- Content section 3 -->
<h3>Reaching for the stars</h3>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, aperiam fugit reiciendis rem eos dicta amet illum eius accusamus veniam excepturi illo unde tenetur in odio veritatis. Quibusdam perferendis eaque tempora consequatur porro, assumenda eveniet repudiandae eum maiores magnam perspiciatis quasi quisquam placeat rem optio? Veritatis officiis quam non pariatur.</p>
<br>
<figure class="text-center">
    <img src="{{ asset('images/blog-image.jpg') }}" alt="Astronaut in space" class="w-100">
    <figcaption><small><em>Lorem ipsum dolor sit amet consectetur adipisicing elit.s</small></em></figcaption>
</figure>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium saepe exercitationem dolores in temporibus impedit id soluta fugit, consectetur et! Unde, quis consectetur.</p>
<br>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi sed cupiditate ullam, suscipit beatae adipisci accusamus pariatur eaque atque omnis aperiam, laboriosam eveniet asperiores reiciendis veritatis hic possimus, eum dolorem non corrupti!</p>
@endsection