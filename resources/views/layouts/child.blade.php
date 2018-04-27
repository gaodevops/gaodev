@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>这将追加到主布局的侧边栏。</p>
@endsection

@section('content')
    <p>这是主体内容。</p>
@endsection