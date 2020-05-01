@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" onc action="{{ route('contact.create') }}" >
                        @csrf
                        <button type="submit" class="btn btn-primary" >
                        新規登録
                        </button>
                    </form>

                    <form method="GET" action="{{ route('contact.index') }}" class="form-inline my-2 my-lg-0">

                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="名前を検索" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">氏名</th>
                                <th scope="col">タイトル</th>
                                <th scope="col">作成日</th>
                                <th scope="col">詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->your_name}}</td>
                                <td>{{$contact->title}}</td>
                                <td>{{$contact->created_at}}</td>
                            <td><a href="{{ route('contact.show', ['id' => $contact->id]) }}">確認</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection